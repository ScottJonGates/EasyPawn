<!DOCTYPE html>
<?php if ($action === 'welcome') { ?>     
    <button class="button" onclick="location.href = 'index.php?action=getRegistered'" type="button" title="Sign Up"><!-- To register page  -->
        Register Page</button>

<?php } else if ($action === 'getRegistered') { ?> 

    <button class="button" onclick="location.href = 'index.php?action=welcome'" type="button" title="Welcome"><!--  To welcome page  -->
        Login Page</button>

<?php
}