<?php
if (!isset($uName)) {
    $uName = '';
}
if (!isset($registerError)) {
    $registerError = '';
}
?>
<!DOCTYPE html>
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
            <p>Filling your Pawn Shop needs </p><br>
        </header>
        <main>
            <h1>Welcome to Scott's Great Value Pawn Shop</h1>
            <p>Please sign in or sign up to access all the Great Deals</p>
            <br>
            <h2>Please Sign In</h2>
            <p class="error"><?php echo htmlspecialchars($registerError) ?></p>
            <form id="inputform" action="index.php" method="post">
                <input type="hidden" name="action" value="checkLogin" />
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
                <br>
                <label>&nbsp;</label>
                <input type="submit" value="Sign In"><br><br>
                <div id="userNav"><?php include 'nav.php'; ?></div>
            </form>
            
            <?php
            // put your code here
            ?>

        </main>
    </body>


</html>