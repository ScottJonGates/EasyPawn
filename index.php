<!DOCTYPE html>

<?php
require_once('model/validate.php');
require_once('model/user.php');
require_once('model/databaseCall.php');
require_once('model/DBuser.php');
require_once('model/DBitem.php');
require_once('model/item.php');
require_once('model/pawnItems.php');
require_once('model/soldItems.php');
require_once('model/custInquiryItem.php');

session_start();
if (!isset($errorType)) {
    $errorType = 0;
}
if (!isset($_SESSION['uName'])) {
    $_SESSION['uName'] = '';
}
if (!isset($_SESSION['fName'])) {
    $_SESSION['fName'] = '';
}
if (!isset($_SESSION['lName'])) {
    $_SESSION['lName'] = '';
}
if (!isset($_SESSION['userID'])) {
    $_SESSION['userID'] = '';
}
if (!isset($_SESSION['admin'])) {
    $_SESSION['admin'] = '';
}
if (!isset($_SESSION['inquiryID'])) {
    $_SESSION['inquiryID'] = '';
}



$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'welcome';
    }
}

switch ($action) {
    case 'welcome':
        $_SESSION = array();
        session_destroy();


        include 'view\welcome.php';
        die();
        break;
    case 'getRegistered':
        $_SESSION = array();
        session_destroy();
        include 'view\getRegistered.php';
        die();
        break;
    case 'newUserCheck':
        $fName = filter_input(INPUT_POST, 'fName');
        $lName = filter_input(INPUT_POST, 'lName');
        $uName = filter_input(INPUT_POST, 'uName');
        $password = filter_input(INPUT_POST, 'password');
        $phoneNumber = filter_input(INPUT_POST, 'phoneNumber');
        $email = filter_input(INPUT_POST, 'email');

        $isError = FALSE;

        if (Validate::LengthToShort($fName, 1) || Validate::LengthTolong($fName, 51)) {
            $isError = true;
            $errorFName = "First name must between 2 and 50 characters";
        }
        if (Validate::LengthToShort($lName, 1) || Validate::LengthTolong($lName, 51)) {
            $isError = true;
            $errorLName = "Last name must between 2 and 50 characters";
        }
        if (Validate::LengthToShort($uName, 9) || Validate::LengthTolong($uName, 26)) { /* https://codereview.stackexchange.com/questions/55167/checking-empty-object */
            $isError = true;
            $errorUName = "User name must between 10 and 25 characters";
        } else if (!(DBuser::getUserByUserName($uName)->getUsername() == NULL)) {
            $isError = true;
            $errorUName = "Someone already has that User Name";
        }
        if (Validate::LengthToShort($password, 9) || Validate::LengthTolong($password, 26)) {
            $isError = true;
            $errorPass = "User name must between 10 and 25 characters";
        }
        if (!(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phoneNumber))) { //https://stackoverflow.com/questions/3090862/how-to-validate-phone-number-using-php
            $isError = true;
            $errorPhoneNumber = "Phone pattern '402-123-4567'";
        }
        if (Validate::LengthToShort($email, 9) || Validate::LengthTolong($email, 26)) {
            $isError = true;
            $errorEmail = "Please enter an Email";
        }


        if ($isError) {
            $action = 'getRegistered';
            include 'view\getRegistered.php';
        } else {
            DBuser::insertNewUser($fName, $lName, $uName, $password, $phoneNumber, $email);
            $user = DBuser::getUserByUserName($uName);
            $_SESSION['uName'] = $user->getUsername();
            $_SESSION['fName'] = $user->getFName();
            $_SESSION['lName'] = $user->getLName();
            $_SESSION['userID'] = $user->getUserID();
            $_SESSION['admin'] = $user->getAdmin();

            header('Location: index.php?action=publicProfile');
        }
        die();
        break;
    case 'checkLogin':
        $uName = filter_input(INPUT_POST, 'uName');
        $password = filter_input(INPUT_POST, 'password');
        $user = DBuser::getUserByUserName($uName);
        $storedPassword = DBuser::getUserPasswordByID($user->getUserID());

        if ($storedPassword === $password) {
            $_SESSION['uName'] = $user->getUsername();
            $_SESSION['fName'] = $user->getFName();
            $_SESSION['lName'] = $user->getLName();
            $_SESSION['userID'] = $user->getUserID();
            $_SESSION['admin'] = $user->getAdmin();
            if ($_SESSION['admin'] === '10') {
                header('Location: index.php?action=adminProfile');
            } else if ($_SESSION['admin'] === '20') {
                header('Location: index.php?action=employeeProfile');
            } else if ($_SESSION['admin'] === '30') {
                header('Location: index.php?action=publicProfile');
            }
        } else {
            $registerError = 'Incorrect User Name and Password combination';
            $action = 'welcome';
            include 'view\welcome.php';
        }
        die();
        break;
    case 'publicProfile': /* go to user profile page */
        $_SESSION['admin'];
        $displayName = $_SESSION['fName'] . " " . $_SESSION['lName'];
        $pawnedItems = DBitem::getItemsPawnedByCustomerID($_SESSION['userID']);
        $boughtItems = DBitem::getItemsBoughtByCustomerID($_SESSION['userID']);
        $inquiryItems = DBitem::getItemsInquiryByCustomerID($_SESSION['userID']);
        include 'view\publicProfile.php';
        die();
        break;
    case 'employeeProfile': /* go to employee profile page */


        include 'view\employeeProfile.php';
        die();
        break;
    case 'adminProfile': /* go to admin profile page */


        include 'view\adminProfile.php';
        die();
        break;
    
    case 'newEmployeePage': /* go to admin profile page */


        include 'view\newEmployee.php';
        die();
        break;

    case 'customerListItem': /* go to admin profile page */
        $inquiryID = filter_input(INPUT_POST, 'inquiryID');
        if ($inquiryID !== null || $inquiryID !== '') {
            $item = DBitem::getCustInquiryByID($inquiryID);
            $itemName = $item->getItemName();
            $description = $item->getDescription();
            $amountWanted = $item->getAmountWanted();
            $pawnOrSell = $item->getPawnOrSell();
            $_SESSION['inquiryID'] = $inquiryID;
        }

        $action = 'customerListItem';
        $_SESSION['admin'];
        include 'view\customerListItem.php';
        die();
        break;

    case 'newCustItemInsert': /* go to CustItemInsert page */
        $itemName = filter_input(INPUT_POST, 'itemName');
        $description = filter_input(INPUT_POST, 'description');
        $amountWanted = filter_input(INPUT_POST, 'amountWanted', FILTER_VALIDATE_FLOAT);
        $pawnOrSell = filter_input(INPUT_POST, 'pawnOrSell');
        $error = FALSE;

        if (Validate::LengthToShort($itemName, 1) || Validate::LengthTolong($itemName, 51)) {
            $error = true;
            $errorItemName = "Item Name must between 2 and 50 characters long";
        }

        if (Validate::LengthToShort($description, 1) || Validate::LengthTolong($description, 251)) {
            $error = true;
            $description = NULL;
            $errorDescription = "Description must between 2 and 250 characters long";
        }

        if ($amountWanted == "" || $amountWanted == NULL) {
            $error = true;
            $errorAmountWanted = "Please enter a number";
        }

        if ($error) {
            $action = 'customerListItem';
            $_SESSION['admin'];

            include 'view\customerListItem.php';
            die();
            break;
        }

        if ($_SESSION['inquiryID'] != null || $_SESSION['inquiryID'] != '') {
            DBitem::editCustInquiryByID($itemName, $description, $amountWanted, $pawnOrSell, $_SESSION['inquiryID']);
            $_SESSION['inquiryID'] = '';
        } else {
            DBitem::insertnewCustInquiry($itemName, $description, $amountWanted, $pawnOrSell, $_SESSION['userID']);
        }

        header('Location: index.php?action=publicProfile');
        die();
        break;














    case 'logout':
        $_SESSION = array();
        session_destroy();
        header('Location: index.php?action=welcome');
        die();
        break;
    default:
        $_SESSION = array();
        session_destroy();
        header('Location: index.php?action=welcome');
}
?>
