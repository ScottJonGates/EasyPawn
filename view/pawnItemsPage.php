<!DOCTYPE html>
<?php
//set default value of variables for initial page load
if (!isset($itemName)) {
    $itemName = '';
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
            <p>Check and Modify Pawn Items</p><br><br>
            <div id="userNav"><?php include 'nav.php'; ?></div>           
        
        <meta charset="UTF-8">
        </header>
        <main>

            <h1>Items you have in Pawn</h1>

            <table>
                <tr>
                    <th>Item Name</th>
                    <th>Date Received</th>
                    <th>Loan Amount</th>
                    <th>Amount Owed</th>
                    <th>Paid Off</th>
                </tr>
                <?php foreach ($pawnedItems as $item) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item->getItemName()); ?></td>
                        <td><?php echo htmlspecialchars($item->getDateRecieved()); ?></td>
                        <td>$<?php echo htmlspecialchars($item->getLoanAmount()); ?></td>
                        <td>$<?php echo htmlspecialchars(($item->getLoanAmount() - $item->getPaymentRecieved())); ?></td>
                        <td><?php if ($item->getPaidOff() === TRUE) { ?>
                                Paid Off
                            <?php } else { ?>
                                No
                            <?php } ?>
                        </td>
                        <td>
                            <form action="index.php" method="post">
                                <input type="hidden" name="action"
                                       value="modifyPawn">
                                <input type="hidden" name="itemID"
                                       value="<?php echo htmlspecialchars($item->getItemID()); ?>">
                                <input type="submit" value="Inspect">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </main>
       


            
    </body>
   
</html>
