<?php include('partials/navbar.php'); ?>

<div class = "content">
        <div class = "container">
            <h2> ADD ADMIN</h2><br><br>
            <?php
                //if 
                if(isset($_SESSION['add']))//checking whether the session is set or not
                {
                    echo $_SESSION['add'];//display the session message if set
                    UNSET($_SESSION['add']);//remove session message
                }
             ?>
             <br>

                <form action ="" method = "post">
                    <table class = "add-table">
                        <tr> 
                            <td>Full Name</td>
                            <td><input type = "text" name = "full_name" placeholder = "Enter your name"></td>
                            
                        </tr>
                        <tr> 
                            <td>Username</td>
                            <td><input type = "text" name = "username" placeholder = "Your username"></td>
                            
                        </tr>
                        <tr> 
                            <td>Password</td>
                            <td><input type = "password" name = "password" placeholder = "Your name"></td>
                            
                        </tr>
                        
                        

                        <tr> 
                            <td>
                                <input type = "submit" name = "submit" value = "ADD ADMIN" class = "add-admin-btn" style ="padding: 5%;">
                            </td>
                                
                        </tr>
                        
                </form>
             
        </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
    //process the value from form and save it in database
    //check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //button is clicked
        //get the data from form
         $full_name = $_POST['full_name'];
         $username = $_POST['username'];
         $password = md5($_POST['password']);//password encrypted with mds

         //sql query to save the data into database
         //column name from the database table has to be same with the left variables
         $sql = "INSERT INTO admin SET 
                full_name = '$full_name', 
                username = '$username',
                password = '$password'
            ";
        
        //execute query and save data in database
         $res = mysqli_query($conn, $sql) or die(mysqli_error());

         //check whether the data is inserted into database
         if($res == TRUE)
         {
             //data inserted
             //create a session variable to display message
             $_SESSION['add'] = 'Admin Added Successfully';
             //redirect page to manage admin
             header("location:".SITEURL. 'admin/manage-admin.php');
         }
         else
         {
            //data is not inserted
            $_SESSION['add'] = 'Failed to add admin';
             //redirect page to manage admin
             header("location:".SITEURL. 'admin/add-admin.php');
         }
    }
    
?>


