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

                <label>First Name</label>
                <input type="text" name="fName" 
                       value="<?php echo htmlspecialchars($fName); ?>"><br>
                <?php if (!empty($errorFName)) { ?>
                    <span class="error"><?php echo htmlspecialchars($errorFName); ?></span>
                <?php } ?>
                <br>
                <label>Last Name</label>
                <input type="text" name="lName"
                       value="<?php echo htmlspecialchars($lName); ?>"><br>
                       <?php if (!empty($errorLName)) { ?>
                    <span class="error"><?php echo htmlspecialchars($errorLName); ?></span>
                <?php } ?>
                <br>
                

                <label>User Name</label>
                <input type="text" name="uName"
                       value="<?php echo htmlspecialchars($uName); ?>"><br>
                <?php if (!empty($errorUName)) { ?>
                    <span class="error"><?php echo htmlspecialchars($errorUName); ?></span>
                <?php } ?>
                <br>

                <label>Password</label>
                <input type="password" name="password"><br>
                 <?php if (!empty($errorPass)) { ?>
                    <span class="error"><?php echo htmlspecialchars($errorPass); ?></span>
                <?php } ?>
                <br><br><br>

                <label>&nbsp;</label>
                <input type="submit" value="Send"><br>
            </form>


        </main> 
    </body>
</html>
