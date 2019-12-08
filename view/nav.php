<!DOCTYPE html>
<?php if ($action === 'welcome') { ?>     
    <button class="button" onclick="location.href = 'index.php?action=getRegistered'" type="button" title="Sign Up"><!-- To register page  -->
        Register Page</button>

<?php } else if ($action === 'getRegistered') { ?> 

    <button class="button" onclick="location.href = 'index.php?action=welcome'" type="button" title="Welcome"><!--  To welcome page  -->
        Login Page</button>

<?php } else if ($action === 'publicProfile' || $action === 'customerListItem') { ?> 

    <button class="button" onclick="location.href = 'index.php?action=customerListItem'" type="button" title="Request an Item for Sale or Pawn"><!--  To welcome page  -->
        List an Item</button>

    <button class="button" onclick="location.href = 'index.php?action=publicProfile'" type="button" title="Profile Page"><!--  To welcome page  -->
        Profile Page</button>

    <button class="button" onclick="location.href = 'index.php?action=welcome'" type="button" title="Login in as a New User"><!--  To welcome page  -->
        Login Page as New User</button>

<?php } else if ($action === 'adminProfile' || $action === 'newEmployeePage') { ?> 

    <button class="button" onclick="location.href = 'index.php?action=newEmployeePage'" type="button" title="Enter a New Employee"><!--  To welcome page  -->
        Enter a New Employee</button>

    <button class="button" onclick="location.href = 'index.php?action=adminProfile'" type="button" title="To Admin Page"><!--  To welcome page  -->
        Back to Administration Page</button>

    <button class="button" onclick="location.href = 'index.php?action=welcome'" type="button" title="Login in as a New User"><!--  To welcome page  -->
        Login Page as New User</button>
<?php } else if ($action === 'employeeProfile' || $action === 'inspectItem') { ?>

    <button class="button" onclick="location.href = 'index.php?action=employeeProfile'" type="button" title="Employee Profile Page"><!--  To welcome page  -->
        Employee Profile Page</button>

    <button class="button" onclick="location.href = 'index.php?action=welcome'" type="button" title="Login in as a New User"><!--  To welcome page  -->
        Login Page as New User</button>

    <?php
} 

