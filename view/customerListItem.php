<!DOCTYPE html>
<?php
//set default value of variables for initial page load
if (!isset($itemName)) {
    $itemName = '';
}
if (!isset($$description)) {
    $description = '';
}
if (!isset($amountWanted)) {
    $amountWanted = '';
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
            <p>List an Item that you want us to consider for Sell or Pawn  </p><br><br>
            <div id="userNav"><?php include 'nav.php'; ?></div>
        </header>
        <main>
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
                    <td> <textarea name="description" class="form-control"  rows="3" cols="40"  maxlength="250"  
                                   value="<?php echo htmlspecialchars($description); ?>"></textarea>
                                   <?php if (!empty($errorDescription)) { ?>
                            <span class="error"><?php echo htmlspecialchars($errorDescription); ?></span>
                        <?php } ?></td>
                </tr>

                <tr>
                    <td class='lineRight'>Amount Wanted</td>
                    <td> <input type="text" name="amountWanted" 
                                value="<?php echo htmlspecialchars($amountWanted); ?>"><br>
                                <?php if (!empty($errorAmountWanted)) { ?>
                            <span class="error"><?php echo htmlspecialchars($errorAmountWanted); ?></span>
                        <?php } ?></td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td class='lineRight'>For</td>
                    <td> <input type="radio" name="pawnOrSale" value="pawn" checked> Pawn &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="pawnOrSale" value="sale"> Sale
                        <br>
                        <?php if (!empty($errorAmountWanted)) { ?>
                            <span class="error"><?php echo htmlspecialchars($errorAmountWanted); ?></span>
                        <?php } ?></td>

                </tr>

            </table>


        </main> 
    </body>
</html>
