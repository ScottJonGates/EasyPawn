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
    <?php
} 

