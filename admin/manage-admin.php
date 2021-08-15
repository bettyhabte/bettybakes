<?php include('partials/navbar.php'); ?>

    <!--main content goes here -->
    <div class = "content">
        <div class = "container">
             
             <h2> MANAGE ADMIN</h2><br><br>
             
             <br>

             <?php
                //if 
                if(isset($_SESSION['add']))
                {
                    //display message when session is set
                    echo $_SESSION['add'];
                    UNSET($_SESSION['add']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    UNSET($_SESSION['delete']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    UNSET($_SESSION['update']);
                }
                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    UNSET($_SESSION['user-not-found']);
                }
                if(isset($_SESSION['pwd-donot-match']))
                {
                    echo $_SESSION['pwd-donot-match'];
                    UNSET($_SESSION['pwd-donot-match']);
                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    UNSET($_SESSION['change-pwd']);
                }

             ?>
             <br/>
             <br/>
             <br/>

             

             <a href = "add-admin.php" class = "add-admin-btn"> ADD ADMIN </a>
             
             <br/>
             <br/>
             <br/>
            
             <table class = "admin-table">
                 <tr>
                     <th> SN </th>
                     <th> Full Name </th>
                     <th> Username </th>
                     <th> Actions </th>
                </tr>

                
                <?php
                    //sql query to get  from admin table
                    $sql = "SELECT * FROM admin";
                    //excute query 
                    $res = mysqli_query($conn, $sql);

                    if ($res ==TRUE)
                    {
                        //count rows 
                        $count = mysqli_num_rows($res);//funtion to get the number of rows in database
                        $sn = 1;
                        //check the number of rows
                        if($count > 0)
                        {
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                $id = $rows['id'];
                                $full_name = $rows['full_name'];
                                $username = $rows['username'];
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href = "<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class = "change-password-btn"> CHANGE PASSWORD </a>
                                            <a href = "<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class = "update-admin-btn"> UPDATE ADMIN </a>
                                            <a href = "<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class = "delete-admin-btn"> DELETE ADMIN</a>
                                        </td>
                                    </tr>  
                                <?php
                            }
                        }
                    }    
                ?>

             </table>
             
        </div>
    </div>

<?php include('partials/footer.php'); ?>