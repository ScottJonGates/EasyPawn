<!DOCTYPE html>
<?php
//set default value of variables for initial page load
if (!isset($employeeName)) {
    $employeeName = '';
}
if (!isset($description)) {
    $description = '';
}
if (!isset($amountWanted)) {
    $amountWanted = '';
}
if (!isset($pawnOrSell)) {
    $pawnOrSell = '';
}





if (!isset($errorEmployeeName)) {
    $errorEmployeeName = '';
}
if (!isset($errorDescription)) {
    $errorDescription = '';
}
if (!isset($errorAmountWanted)) {
    $errorAmountWanted = '';
}
if (!isset($errorpawnOrSell)) {
    $errorpawnOrSell = '';
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
                <input type="hidden" name="action" value="newEmployeeInsert" />
                <table id='no_border'>
                    <tr>
                        <td class='lineRight'>Employee Name</td>
                        <td> <input type="text" name="employeeName" 
                                    value="<?php echo htmlspecialchars($employeeName); ?>"><br>
                                    <?php if (!empty($errorEmployeeName)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorEmployeeName); ?></span>
                            <?php } ?></td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td class='lineRight'>Description</td>
                        <td> <textarea name="description" class="form-control"  rows="3" cols="40"  maxlength="250"><?php echo htmlspecialchars($description); ?></textarea>
                            <?php if (!empty($errorDescription)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorDescription); ?></span>
                            <?php } ?></td>
                    </tr>

                   

                </table>

                <input type="submit" value="Insert Employee"><br>
            </form>
        </main> 
    </body>
</html>

