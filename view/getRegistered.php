<?php
//set default value of variables for initial page load
if (!isset($fName)) {
    $fName = '';
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
if (!isset($registerError)) {
    $registerError = '';
}
?>


<!DOCTYPE html>
<!--
Comments here
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
            <p>Filling your Pawn Shop needs </p><br><br>
            <div id="userNav"><?php include 'nav.php'; ?></div>
        </header>
        <main>
            <h1>Register for Scott's Great Value Pawn Shop</h1>
            <p class="error"><?php echo htmlspecialchars($registerError) ?></p>
            <form id="inputform" action="index.php" method="post">
                <input type="hidden" name="action" value="newUserCheck" />
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
                                    value=""><br>
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
                </table>



                <br>

                <label>&nbsp;</label>
                <input type="submit" value="Register as a New User"><br>
            </form>


        </main> 
    </body>
</html>
