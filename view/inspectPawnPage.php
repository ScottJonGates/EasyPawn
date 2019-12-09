<!DOCTYPE html>
<?php
//set default value of variables for initial page load
if (!isset($itemName)) {
    $itemName = '';
}
if (!isset($description)) {
    $description = '';
}
if (!isset($pawnID)) {
    $pawnID = '';
}
if (!isset($dateRecieved)) {
    $dateRecieved = '';
}
if (!isset($loanAmount)) {
    $loanAmount = '';
}
if (!isset($paymentRecieved)) {
    $paymentRecieved = '';
}
if (!isset($paidOff)) {
    $paidOff = '';
}
if (!isset($amountOwed)) {
    $amountOwed = '';
}

if (!isset($errorItemName)) {
    $errorItemName = '';
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

if (!isset($errorDate)) {
    $errorDate = '';
}
if (!isset($errorAmountOwed)) {
    $errorAmountOwed = '';
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
            <p>Check and Modify for Sell or Pawn</p><br><br>
            <div id="userNav"><?php include 'nav.php'; ?></div>           
        
        <meta charset="UTF-8">
        </header>
        <main>

            <form id="inputform" action="index.php" method="post">
                <input type="hidden" name="action" value="makePayment" />
                <table id='no_border'>
                    <tr>
                        <td class='lineRight'>Item Name</td>
                        <td> <input type="text" name="itemName" 
                                    value="<?php echo htmlspecialchars($itemName); ?>"><br>
                                    <?php if (!empty($errorItemName)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorItemName); ?></span>
                            <?php } ?></td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td class='lineRight'>Description</td>
                        <td> <textarea name="description" class="form-control"  rows="3" cols="40"  maxlength="250"><?php echo htmlspecialchars($description); ?></textarea>
                            <?php if (!empty($errorDescription)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorDescription); ?></span>
                            <?php } ?></td>
                    </tr>

                    <tr>
                        <td class='lineRight'>Loan Amount</td>
                        <td> <input type="text" name="amountWanted" 
                                    value="<?php echo htmlspecialchars($loanAmount); ?>"><br>
                                    <?php if (!empty($errorAmountWanted)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorAmountWanted); ?></span>
                            <?php } ?></td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td class='lineRight'>Amount Owed</td>
                        <td> <input type="text" name="amountOwed" 
                                    value="<?php echo htmlspecialchars($amountOwed); ?>"><br>
                                    <?php if (!empty($errorAmountOwed)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorAmountOwed); ?></span>
                            <?php } ?></td>
                    </tr>
                    <tr>
                       <td class='lineRight'>Make Payment</td>
                        <td> <input type="text" name="payment" 
                                    value="<?php echo htmlspecialchars($amountOwed); ?>"><br>
                                    <?php if (!empty($errorAmountOwed)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorAmountOwed); ?></span>
                            <?php } ?></td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        
                        
                    </tr>

                </table><br>

                <input type="submit" value="Make Payment">
            </form><br>
            
        </main>
       
    </body>

</html>
