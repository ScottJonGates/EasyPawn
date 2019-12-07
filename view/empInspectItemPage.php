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
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
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
                <input type="hidden" name="action" value="newCustItemApproved" />
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
                        <td class='lineRight'>Amount Wanted</td>
                        <td> <input type="text" name="amountWanted" 
                                    value="<?php echo htmlspecialchars($amountWanted); ?>"><br>
                                    <?php if (!empty($errorAmountWanted)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorAmountWanted); ?></span>
                            <?php } ?></td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td class='lineRight'>For</td>
                        <td> <input type="radio" name="pawnOrSell" value="pawn" 
                            <?php if ($pawnOrSell === '' || $pawnOrSell === 'pawn') { ?>checked
                            <?php } ?>> Pawn &nbsp;&nbsp;&nbsp;&nbsp;
                            
                            <input type="radio" name="pawnOrSell" value="sell" 
                                <?php if ($pawnOrSell === 'sell') { ?>checked
                            <?php } ?>> Sell
                            <br>
                            <?php if (!empty($errorPawnOrSale)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorpawnOrSell); ?></span>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="control-label">Pick a Date</label></td>
                        <td>
                            <div class='input-group date' id='datetimepicker'>
                            
                            <input type='text' name="date" class="form-control" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar">
                                </span>
                            </span>
                        </div>
                            
                        </td>
                        <td><?php if (!empty($errorDate)) { ?>
                                <span class="error"><?php echo htmlspecialchars($errorDate); ?></span>
                            <?php } ?></td>
                        
                    </tr>

                </table>

                <input type="submit" value="Approve This Item">
            </form><br>
            <form id="inputform" action="index.php" method="post">
                <input type="hidden" name="action" value="removeItemFormInquiry" />
                <input type="submit" value="Decline and Delete Item"><br>
            </form>
        </main>
       


            
    </body>
    <script type="text/javascript">
                $(function () {
                    $('#datetimepicker').datetimepicker({
                        viewMode: 'months',
                        format: 'YYYY-MM-DD'
                    });
                });
            </script>
            
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="main.css">
</html>
