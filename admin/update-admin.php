<?php include('partials/navbar.php'); ?>

<div class = "content">
        <div class = "container">
            <h2> UPDATE ADMIN</h2><br><br>
           
            <?php 
                //get the id of admin needs to be updated
                $id = $_GET['id'];
                // create sql querey to update admiin
                $sql = "SELECT * FROM admin WHERE id =$id";
                
                //execute the query
                $res = mysqli_query($conn, $sql);
            

                //check whether the query is executed
                if($res ==TRUE)
                {
                    //check data is available or not
                    $count = mysqli_num_rows($res);//funtion to get the number of rows in database
                    
                    if($count == 1)
                    {
                        //get the detail
                        $row = mysqli_fetch_assoc($res);
                        

                        $full_name = $row['full_name'];
                        
                        $username = $row['username'];
                        
                    }
                    else
                    {
                        //header("location:".SITEURL.'admin/manage-admin.php');
                    }

                }
            ?>
            
            <form action ="" method = "POST" >
                <table class = "add-admin-table">
                    <tr>
                        <td> Full Name: </td>
                        <td>
                            <input type = "text" name ="full_name" value ="<?php echo $full_name; ?>">
                        </td> 
                    </tr>

                    <tr>
                        <td> Username </td>
                        <td>
                            <input type = "text" name = "username" value = "<?php echo $username; ?>">
                        </td>      
                    </tr>
                    <tr>
                        <td>
                            <input type = "hidden" name ="id" value = "<?php echo $id; ?>">
                            <input type = "submit" name = "submit" value = "UPDATE ADMIN" class = "add-admin-btn">
                        </td>
                    </tr>
                </table>
            </form>
            
        </div>
</div>

<?php
    //check if the button is clicked
    if(isset($_POST['submit']))
    {

        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        $sql = "UPDATE admin SET 
                full_name = '$full_name',
                username = '$username'
                WHERE id = '$id'
                 ";
                 
        $res = mysqli_query($conn, $sql);

        //check if query is excuted

        if($res == TRUE)
        {
            //query is excuted
            $_SESSION['update'] = 'Admin updated Successfully';
            //redirect page to manage admin
            header("location:".SITEURL. 'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['update'] = 'Failed to update admin';
             //redirect page to manage admin
             header("location:".SITEURL. 'admin/manage-admin.php');
        }
        
    }
?>

<?php include('partials/footer.php'); ?>