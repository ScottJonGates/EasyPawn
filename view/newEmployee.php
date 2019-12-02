<!DOCTYPE html>
<?php
//set default value of variables for initial page load
if (!isset($fName)) {
    $fName = '';
}
if (!isset($userID)) {
    $userID = '';
}
if (!isset($lName)) {
    $lName = '';
}
if (!isset($uName)) {
    $uName = '';
}
if (!isset($phoneNumber)) {
    $phoneNumber = '';
}
if (!isset($email)) {
    $email = '';
}
if (!isset($hireDate)) {
    $hireDate = '';
}
if (!isset($salary)) {
    $salary = '';
}
if (!isset($uPass)) {
    $uPass = '';
}


if (!isset($registerError)) {
    $registerError = '';
}
if (!isset($errorFName)) {
    $errorFName = '';
}
if (!isset($errorLName)) {
    $errorLName = '';
}
if (!isset($errorUName)) {
    $errorUName = '';
}
if (!isset($errorPass)) {
    $errorPass = '';
}
if (!isset($errorPhoneNumber)) {
    $errorPhoneNumber = '';
}
if (!isset($errorEmail)) {
    $errorEmail = '';
}
if (!isset($errorHireDate)) {
    $errorHireDate = '';
}
if (!isset($errorSalary)) {
    $errorSalary = '';
}
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Easy Pawn</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <header>
            <h1>Easy Pawn</h1><br>
            <p>New Employee entry </p><br><br>
            <div id="userNav"><?php include 'nav.php'; ?></div>
        </header>
        <main>
            
            <form id="inputform" action="index.php" method="post">
                <input type="hidden" name="action" value="insertEmployee" />
                <table id='no_border'>
                    <tr>
                        <td class='lineRight'>First Name</td>
                        <td> <input type="text" name="fName" 
                                    value="<?php echo htmlspecialchars($fName); ?>"><br>
                                    <?php if (!empty($errorFName)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorFName); ?></span>
                            <?php } ?></td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td class='lineRight'>Last Name</td>
                        <td> <input type="text" name="lName" 
                                    value="<?php echo htmlspecialchars($lName); ?>"><br>
                                    <?php if (!empty($errorLName)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorLName); ?></span>
                            <?php } ?></td>
                    </tr>
                    <tr>
                        <td class='lineRight'>User Name</td>
                        <td> <input type="text" name="uName" 
                                    value="<?php echo htmlspecialchars($uName); ?>"><br>
                                    <?php if (!empty($errorUName)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorUName); ?></span>
                            <?php } ?></td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td class='lineRight'>Password</td>
                        <td> <input type="text" name="password" 
                                    value="<?php echo htmlspecialchars($uPass); ?>"><br>
                                    <?php if (!empty($errorPass)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorPass); ?></span>
                            <?php } ?></td>
                    </tr>
                    <tr>
                        <td class='lineRight'>Phone Number</td>
                        <td> <input type="text" name="phoneNumber" 
                                    value="<?php echo htmlspecialchars($phoneNumber); ?>"><br>
                                    <?php if (!empty($errorPhoneNumber)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorPhoneNumber); ?></span>
                            <?php } ?></td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td class='lineRight'>E-mail</td>
                        <td> <input type="text" name="email" 
                                    value="<?php echo htmlspecialchars($email); ?>"><br>
                                    <?php if (!empty($errorEmail)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorEmail); ?></span>
                            <?php } ?></td>
                    </tr>
                    <tr>
                        <td class='lineRight'>Hire Date</td>
                        <td> <input type="text" name="hireDate" 
                                    value="<?php echo htmlspecialchars($hireDate); ?>"><br>
                                    <?php if (!empty($errorHireDate)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorHireDate); ?></span>
                            <?php } ?></td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td class='lineRight'>Salary</td>
                        <td> <input type="text" name="salary" 
                                    value="<?php echo htmlspecialchars($salary); ?>"><br>
                                    <?php if (!empty($errorSalary)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorSalary); ?></span>
                            <?php } ?></td>
                    </tr>
                </table>

                <input type="submit" value="Insert New Employee"><br>
            </form>
        </main> 
    </body>
</html>

