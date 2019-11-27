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

        if ($isError) {
            $action = 'getRegistered';
            include 'view\getRegistered.php';
        } else {
            DBuser::insertNewUser($fName, $lName, $uName, $password);
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
            if($_SESSION['admin'] === '10'){
                header('Location: index.php?action=adminProfile');
            }else if($_SESSION['admin'] === '20'){
                header('Location: index.php?action=employeeProfile');
            }else if($_SESSION['admin'] === '30'){
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
        include 'view\publicProfile.php';
        die();
        break;
    case 'employeeProfile': /* go to employee profile page */
        
        
        include 'view\employeeProfile.php';
        die();
        break;
    case 'adminProfile': /* go to admin profile page */
        
        
        include 'view\publicProfile.php';
        die();
        break;
    
    case 'customerListItem': /* go to admin profile page */
        
        
        include 'view\customerListItem.php';
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
