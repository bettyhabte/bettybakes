<?php
    //access control
    if(!isset($_SESSION['user']))
    {
        //user is not logged in
        $_SESSION['no-login-message'] = 'Please Login To Access Admin';
        header("location:".SITEURL. 'admin/login.php');
    }
?>