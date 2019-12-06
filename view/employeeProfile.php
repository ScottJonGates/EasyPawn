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
            <p>Double Check Your Work, Remember Garbage in Garbage Out</p><br><br>
            <div id="userNav"><?php include 'nav.php'; ?></div>
        </header>
        <main>
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
                                       value="inspectItem">
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
