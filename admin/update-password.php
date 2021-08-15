<?php include('partials/navbar.php'); ?>

<div class = "content">
        <div class = "container">
            <h2> CHANGE PASSWORD</h2><br><br>
            <?php 
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                }
            ?>

            <form action ="" method = "POST" >
                <table class = "add-admin-table">
                    <tr>
                        <td> Current Password: </td>
                        <td>
                            <input type = "password" name ="current_password" placeholder = "current Password">
                        </td> 
                    </tr>

                    <tr>
                        <td> New Password </td>
                        <td>
                            <input type = "password" name = "new_password" placeholder = "New Password">
                        </td>      
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td>
                            <input type = "password" name = "confirm_password" placeholder = "confirm password">
                        </td>
                    </tr>
                    <tr>
                       
                        <td>
                            
                            <input type = "hidden" name ="id" value = "<?php echo $id; ?>"> 
                            <input type = "submit" name = "submit" value = "Change Password" class = "add-admin-btn">
                        </td>
                    </tr>
                    
                </table>
            </form>
            
        </div>
</div>

<?php
    if(isset($_POST['submit']))
    {
       
        //get data from form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        
        //sql query to check whether a user with the current id and password exists
        $sql = "SELECT * FROM admin WHERE id = $id AND password = '$current_password' ";
        $res = mysqli_query($conn, $sql);

        if ($res == TRUE)
        {
            $count = mysqli_num_rows($res);//function to get the number of rows in database
               echo $count;     
            if($count == 1)
            {
                //user exists password can be changed
                //get the detail
                //check the current password and confirm password are same
                if($new_password == $confirm_password)
                {

                   
                    //update password
                   $sql2 = "UPDATE admin SET 
                            password = '$new_password'
                            WHERE id = $id";

                    $res2 = mysqli_query($conn, $sql2);
                    if ($res2 == TRUE)
                    {
                        //query is excuted
                        $_SESSION['change-pwd'] = 'Password Changed Successfully';
                        //redirect page to manage admin
                        header("location:".SITEURL. 'admin/manage-admin.php');
                    }
                    else
                    {
                        //query is excuted
                        $_SESSION['change-pwd'] = 'Failed To Change Password';
                        //redirect page to manage admin
                        header("location:".SITEURL. 'admin/manage-admin.php');
                    }
                    
                }
                else
                {
                    //display error message
                    $_SESSION['pwd-donot-match']= 'password do not match';
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
                
            }
            else
            {
                //dispaly error message
                $_SESSION['user-not-found']= 'user not found';
                header("location:".SITEURL.'admin/manage-admin.php');
            }
        }

        
    }
?>

<?php include('partials/footer.php'); ?>

