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
            <p>Filling your Pawn Shop Administration Needs</p><br><br>
            <div id="userNav"><?php include 'nav.php'; ?></div>
        </header>
        <main>
            <h1>Items you have in Pawn</h1>

            <table>
                <tr>
                    <th>Employee Name</th>
                    <th>Date Hired</th>
                    <th>Pay</th>
                    <th>Phone Number</th>
                </tr>
                <?php foreach ($employees as $emp) : ?>  
                    <tr>
                        <td><?php echo htmlspecialchars($emp->getFName()); ?> &nbsp; <?php echo htmlspecialchars($emp->getLName()); ?></td>
                        <td><?php echo htmlspecialchars($emp->getHireDate()); ?></td>
                        <td>$<?php echo htmlspecialchars($emp->getSalary()); ?></td>
                        <td><?php echo htmlspecialchars($emp->getPhoneNumber()); ?></td>
                        <?php if ($current !== $emp->getUserID()) { ?>
                            <td><?php if ($emp->getAdmin() == 20) { ?>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="action"
                                               value="makeEmp">
                                        <input type="hidden" name="userID"
                                               value="<?php echo htmlspecialchars($emp->getUserID()); ?>">
                                        <input type="submit" value="Make Admin">
                                    </form>
                                <?php } else { ?>
                                    <form action="index.php" method="post">
                                        <input type="hidden" name="action"
                                               value="makeAdmin">
                                        <input type="hidden" name="userID"
                                               value="<?php echo htmlspecialchars($emp->getUserID()); ?>">
                                        <input type="submit" value="Make Employee">
                                    </form>
                                <?php } ?>
                            </td>
                            <td>
                                <form action="index.php" method="post">
                                    <input type="hidden" name="action"
                                           value="newEmployeePage">
                                    <input type="hidden" name="userID"
                                           value="<?php echo htmlspecialchars($emp->getUserID()); ?>">
                                    <input type="submit" value="Modify">
                                </form>
                            </td>
                        <?php } ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </main>
    </body>
</html>
