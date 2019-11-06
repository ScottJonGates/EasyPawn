<!DOCTYPE html>

<?php
require_once('model/validate.php');
require_once('model/user.php');
require_once('model/databaseCall.php');
require_once('model/DBuser.php');

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
            header('Location: index.php?action=profile');
        }
        die();
        break;
    
    
    
    
    default:
        $_SESSION = array();
        session_destroy();
        header('Location: index.php?action=welcome');
}
?>
