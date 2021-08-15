<?php include('../config/constants.php'); ?>
<html>
    <head>
        <title> Login Page</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class ="login text-center">
            <h2> Login </h2>

            <br><br><br>

            <?php
                //if login is set
                if(isset($_SESSION['login']))
                {
                    //display message when session is set
                    echo $_SESSION['login'];
                    UNSET($_SESSION['login']);
                }
           
            
                //if login is set
                if(isset($_SESSION['no-login-message']))
                {
                    //display message when session is set
                    echo $_SESSION['no-login-message'];
                    UNSET($_SESSION['no-login-message']);
                }
            ?>
            <form action ="" method = "post">
                
                    <label for = "username">Username</label><br><br>
                    <input type = "text" name = "username" required><br><br>
                
                
                    <label for ="password">PASSWORD</label> <br><br> 
                    <input type = "password" name = "password" required><br><br>
               
                
                    
                    <input type = "submit" name = "submit" value = "Login" class  = "add-admin-btn"><br><br>
                
            </form>
        </div>
    </body>
    <footer>

    </footer>
</html>

<?php
    //check whether submit button is clicked
    if(isset($_POST['submit']))
    {
         $username = $_POST['username'];
         $password = md5($_POST['password']);
         
         //sql to check whether username and password
         $sql = "SELECT * FROM admin WHERE username ='$username' AND password = '$password'";

         //excute query
         $res = mysqli_query($conn, $sql);

         if($res ==TRUE)
         {
             //count for 
             $count = mysqli_num_rows($res);
             if($count == 1)
             {
                 $_SESSION['login'] = 'login successfuly';
                 $_SESSION['user'] = $username; //to check whether the user is logged in or not
                 //redirect to home page
                 header("location:".SITEURL. 'admin/');
             }
             else
             {
                $_SESSION['login'] = 'Failed to login';
                header("location:".SITEURL. 'admin/login.php');
             }
         }
    }
?>
