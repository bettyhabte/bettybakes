
<?php

    include('../config/constants.php');
    
    //get the id of admin needs to be deleted
    $id = $_GET['id'];
    // create sql querey to delete admiin
    $sql = "DELETE FROM admin WHERE id = $id";
    //execute the query
    $res = mysqli_query($conn, $sql);

    //check if the query is executed

    if($res == true)
    {
        //query executed
        //create a session variable to display message
        $_SESSION['delete'] = 'Admin Deleted Successfully';
        //redirect page to manage admin
        header("location:".SITEURL. 'admin/manage-admin.php');
    }
    else
    {
        //
        $_SESSION['delete'] = 'Failed to delete admin';
         //redirect page to manage admin
         header("location:".SITEURL. 'admin/manage-admin.php');
    }
?> 
