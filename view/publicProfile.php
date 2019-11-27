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
                    <th>Paid Off</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($pawnedItems as $item) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item->getItemName()); ?></td>
                        <td><?php echo htmlspecialchars($item->getDateRecieved()); ?></td>
                        <td>$<?php echo htmlspecialchars($item->getLoanAmount()); ?></td>
                        <td>$<?php if ($item->getPaidOff() === TRUE) { ?>
                                Paid Off
                            <?php } else { ?>
                                Payment Do
                            <?php } ?>
                        </td>
                        <td><form action="index.php" method="post">
                                <input type="hidden" name="action"
                                       value="modifyItem">
                                <input type="hidden" name="ItemID"
                                       value="<?php echo htmlspecialchars($item->getItemID()); ?>">
                                <input type="submit" value="Modify or Remove">
                            </form></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <h1>Items you have Bought</h1>

            <table>
                <tr>
                    <th>Item Name</th>
                    <th>Date Bought</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($boughtItems as $item) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item->getItemName()); ?></td>
                        <td><?php echo htmlspecialchars($item->getDateSold()); ?></td>
                        <td><form action="index.php" method="post">
                                <input type="hidden" name="action"
                                       value="resellItem">
                                <input type="hidden" name="itemID"
                                       value="<?php echo htmlspecialchars($item->getItemID()); ?>">
                                <input type="submit" value="Resell">
                            </form></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </main>
    </body>
</html>
