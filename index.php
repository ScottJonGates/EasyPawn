<!DOCTYPE html>

<?php
require_once('model/validate.php');
require_once('model/databaseCall.php');
require_once('model/user.php');
require_once('model/employee.php');
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
if (!isset($_SESSION['EmpModID'])) {
    $_SESSION['EmpModID'] = '';
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
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

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
        if (!($email)) {
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

    case 'insertEmployee':
        $fName = filter_input(INPUT_POST, 'fName');
        $lName = filter_input(INPUT_POST, 'lName');
        $uName = filter_input(INPUT_POST, 'uName');
        $password = filter_input(INPUT_POST, 'password');
        $phoneNumber = filter_input(INPUT_POST, 'phoneNumber');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $hireDate = filter_input(INPUT_POST, 'hireDate');
        $salary = filter_input(INPUT_POST, 'salary');
        $userID = filter_input(INPUT_POST, 'userID');

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
        } else if (!(DBuser::getUserByUserName($uName)->getUsername() == NULL) && $_SESSION['EmpModID'] === '') {
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
        if (!($email)) {
            $isError = true;
            $errorEmail = "Please enter an Email";
        }


        if ($isError) {
            $action = 'newEmployeePage';
            include 'view\newEmployee.php';
        } else {

            if (DBuser::isCurrentEmployee($uName)) {
                DBuser::updateEmployee($fName, $lName, $uName, $password, $phoneNumber, $email, $hireDate, $salary, $_SESSION['EmpModID']);
                $_SESSION['EmpModID'] = '';
            } else {
                DBuser::insertNewUser($fName, $lName, $uName, $password, $phoneNumber, $email);
                $user = DBuser::getUserByUserName($uName);

                DBuser::insertNewEmployee($user->getUserID(), $hireDate, $salary);
                $user = DBuser::getUserByUserName($uName);

                $_SESSION['EmpModID'] = '';
            }



            header('Location: index.php?action=newEmployeePage');
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
        $inquiryItems = DBitem::getAllCustInquiryItems();


        include 'view\employeeProfile.php';
        die();
        break;
    case 'adminProfile': /* go to admin profile page */
        $employees = DBuser::getEmployees();
        $current = $_SESSION['userID'];
        include 'view\adminProfile.php';
        die();
        break;
    case 'makeAdmin': /* go to admin profile page */
        $userID = filter_input(INPUT_POST, 'userID');
        $user = DBuser::getUserByID($userID);
        if ($user->getAdmin() == 20) {
            DBuser::AddAdminByUserID($userID);
        } else {
            DBuser::removeAdminByUserID($userID);
        }
        $employees = DBuser::getEmployees();
        $current = $_SESSION['userID'];
        include 'view\adminProfile.php';
        die();
        break;

    case 'newEmployeePage': /* go to admin profile page */
        $userID = filter_input(INPUT_POST, 'userID');
        if ($userID != null || $userID != '') {
            $emp = DBuser::getEmployeeByID($userID);
            $fName = $emp->getFName();
            $lName = $emp->getLName();
            $uName = $emp->getUsername();
            $uPass = DBuser::getUserPasswordByID($userID);
            $phoneNumber = $emp->getPhoneNumber();
            $email = $emp->getEmail();
            $hireDate = $emp->getHireDate();
            $salary = $emp->getSalary();
            $_SESSION['EmpModID'] = $userID;
        }
        include 'view\newEmployee.php';
        die();
        break;

    case 'customerListItem': /* go to admin profile page */
        $inquiryID = filter_input(INPUT_POST, 'inquiryID');
        $itemID = filter_input(INPUT_POST, 'itemID');
        if (isset($inquiryID)  || $inquiryID != '') {
            $item = DBitem::getCustInquiryByID($inquiryID);
            $itemName = $item->getItemName();
            $description = $item->getDescription();
            $amountWanted = $item->getAmountWanted();
            $pawnOrSell = $item->getPawnOrSell();
            $_SESSION['inquiryID'] = $inquiryID;
        }
        if (isset($itemID) || $itemID != '') {
            $item = DBitem::getItemPawnedByItemID($itemID);
            $itemName = $item->getItemName();
            $description = $item->getDescription();
            $amountWanted = $item->getLoanAmount();
            $pawnOrSell = 'pawn';
            DBitem::removePawnItemByItemID($itemID);
            DBitem::removeItemByItemID($itemID);
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

    case 'inspectItem':

        $inquiryID = filter_input(INPUT_POST, 'inquiryID');
        if ($inquiryID !== null || $inquiryID !== '') {
            $item = DBitem::getCustInquiryByID($inquiryID);
            $itemName = $item->getItemName();
            $description = $item->getDescription();
            $amountWanted = $item->getAmountWanted();
            $pawnOrSell = $item->getPawnOrSell();
            $_SESSION['inquiryID'] = $inquiryID;
        }

        include 'view\empInspectItemPage.php';
        die();
        break;

    case 'newCustItemApproved':
        $itemName = filter_input(INPUT_POST, 'itemName');
        $description = filter_input(INPUT_POST, 'description');
        $amountWanted = filter_input(INPUT_POST, 'amountWanted', FILTER_VALIDATE_FLOAT);
        $amountOwed = filter_input(INPUT_POST, 'amountOwed', FILTER_VALIDATE_FLOAT);
        $pawnOrSell = filter_input(INPUT_POST, 'pawnOrSell');
        $dateRecieved = filter_input(INPUT_POST, 'date');
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

        if ($amountOwed == "" || $amountOwed == NULL) {
            $error = true;
            $errorAmountOwed = "Please enter a number";
        } else if ($amountOwed <= $amountWanted) {
            $error = true;
            $errorAmountOwed = "Amount Owed must be more than Amount Given";
        }

        if ($dateRecieved == "" || $dateRecieved == NULL) {
            $error = true;
            $errorDate = "Please enter a date";
        }

        if ($error) {
            $action = 'empInspectItemPage';
            $_SESSION['admin'];

            include 'view\empInspectItemPage.php';
            die();
            break;
        }

        if ($pawnOrSell === 'sell') {
            DBitem::insertItem($itemName, $description);
            $item = DBitem::getNewItem();
            $itemID = $item->getItemID();
            DBitem::insertNewInventoryItem($itemID, $dateRecieved, $amountWanted, $amountOwed, $_SESSION['userID']);
        } else {
            DBitem::insertItem($itemName, $description);
            $item = DBitem::getNewItem();
            $itemID = $item->getItemID();
            $inquirItem = DBitem::getCustInquiryByID($_SESSION['inquiryID']);
            $customerID = $inquirItem->getCustomerID();
            DBitem::insertNewPawnItem($itemID, $customerID, $dateRecieved, $amountOwed, $_SESSION['userID']);
        }


        header('Location: index.php?action=removeItemFormInquiry');
        die();
        break;

    case 'removeItemFormInquiry':
        DBitem::removeInquiryItemByInquiryID($_SESSION['inquiryID']);
        header('Location: index.php?action=employeeProfile');
        $_SESSION['inquiryID'] = '';
        die();
        break;

    case 'inventoryItems':



        include 'view\inventoryItemsPage.php';
        die();
        break;
    case 'inspectInventory':



        include 'view\inventoryItemsPage.php';
        die();
        break;

    case 'pawnItems':
        $pawnedItems = DBitem::getItemPawned();


        include 'view\pawnItemsPage.php';
        die();
        break;
    case 'inspectPawn':
        $itemID = filter_input(INPUT_POST, 'itemID');
        $_SESSION['itemID'] = $itemID;
        $pawnItem = DBitem::getItemPawnedByItemID($itemID);
        
        $itemName = $pawnItem->getItemName();
        $description = $pawnItem->getDescription();
        $pawnID = $pawnItem->getPawnID();
        $dateRecieved = $pawnItem->getDateRecieved();
        $loanAmount = $pawnItem->getLoanAmount();
        $paymentRecieved = $pawnItem->getPaymentRecieved();
        $_SESSION['paymentRecieved'] = $paymentRecieved;
        $paidOff = $pawnItem->getPaidOff();
        $amountOwed = $loanAmount - $paymentRecieved;
        $_SESSION['amountOwed'] = $amountOwed;

        include 'view\inspectPawnPage.php';
        die();
        break;

    case 'makePayment':
        $payment = (int)filter_input(INPUT_POST, 'payment');
        $newPaymentRecieved = $_SESSION['paymentRecieved'] + $payment;
        DBitem::updatePaymentRecievedByItemID($_SESSION['itemID'], $newPaymentRecieved);
        $pawnItem = DBitem::getItemPawnedByItemID($_SESSION['itemID']);
        if((float)$pawnItem->getLoanAmount() == (float)$pawnItem->getPaymentRecieved()){
            DBitem::updatePaidOffByItemID($_SESSION['itemID']);
        }

        $_SESSION['itemID'] = '';
        $_SESSION['amountOwed'] = '';
        $_SESSION['paymentRecieved'] = '';
        header('Location: index.php?action=pawnItems');
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
