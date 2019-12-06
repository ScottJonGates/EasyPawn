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
            <p><?php echo htmlspecialchars($displayName); ?> here is your activity</p>
            <br>
            <div id="userNav"><?php include 'nav.php'; ?></div>
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
                        <td>$<?php if ($item->getPaidOff() === TRUE) { ?>
                                Paid Off
                            <?php } else { ?>
                                Payment Do
                            <?php } ?>
                        </td>
                        <td><form action="index.php" method="post">
                                <input type="hidden" name="action"
                                       value="modifyItem">
                                <input type="hidden" name="itemID"
                                       value="<?php echo htmlspecialchars($item->getItemID()); ?>">
                                <input type="submit" value="Make Payment">
                            </form></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
            <h1>Items you have Offered</h1>
            <table>
                <tr>
                    <th>Item Name</th>
                    <th>Pawn or Sell</th>
                    <th>Description</th>
                    <th>Amount Wanted</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($inquiryItems as $item) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item->getItemName()); ?></td>
                        <td><?php echo htmlspecialchars($item->getPawnOrSell()); ?></td>
                        <td><?php echo htmlspecialchars($item->getDescription()); ?></td>
                        <td><?php echo htmlspecialchars($item->getAmountWanted()); ?></td>
                        <td><form action="index.php" method="post">
                                <input type="hidden" name="action"
                                       value="customerListItem">
                                <input type="hidden" name="inquiryID"
                                       value="<?php echo htmlspecialchars($item->getInquiryID()); ?>">
                                <input type="submit" value="Edit">
                            </form></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </main>
    </body>
</html>
