<?php include('partials/navbar.php'); ?>

    <!--main content goes here -->
    <div class = "content">
        <div class = "container">
             
             <h2> MANAGE CATEGORY</h2><br><br>
             <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//display the session message if set
                    UNSET($_SESSION['add']);//remove session message
                }
            ?>
             <br><br>
             <a href = "<?php echo SITEURL; ?>admin/add-category.php" class = "add-admin-btn"> ADD CATEGORY</a>

             <br/>
             <br/>
            
             <table class ="admin-table">
                 <tr>
                    <th> SN </th>
                     <th> Title </th>
                     <th> Image Name </th>
                     <th> featured</th>
                     <th> Active </th>
                     <th> Actions </th>
                </tr>

                <?php
                    $sql = "SELECT * FROM category";

                    $res = mysqli_query($conn, $sql);
                    if ($res == true)
                    {
                        $count = mysqli_num_rows($res);
                        $sn = 1;
                        if($count > 0)
                        {
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                $title = $rows['title'];
                                $image_name = $rows['image_name'];
                                $featured =  $rows['featured'];
                                $active = $rows['active'];

                                ?>
                                <tr>
                                    <td> <?php echo $sn++ ?> </td>
                                    <td> <?php echo $title ?> </td>

                                    <td> 
                                        <?php
                                            //checks if image is selected
                                            if($image_name!="")
                                            {
                                                ?>
                                                 <img src = "<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" width = "100px">   
                                                 <?php
                                            }
                                            else
                                            {
                                                echo "Image Not Added";
                                            }

                                        ?> 
                                    </td>
                                    <td> <?php echo $featured ?></td>
                                    <td> <?php echo $active ?></td>
                                    
                                    <td> 
                                        <a href = "<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class = "update-admin-btn"> UPDATE CATEGORY</a>
                                        <a href = "<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>" class = "delete-admin-btn"> DELETE CATEGORY</a>
                                    </td>
                                </tr>
                            <?php
                            
                            }
                        }
                        else{
                            //we do not have data in database
                            ?>
                            <tr>
                                <td> No Category Added </td>
                            </tr>

                            <?php
                        }
                    }
                ?>
             </table> 
        </div>
    </div>

<?php include('partials/footer.php'); ?>