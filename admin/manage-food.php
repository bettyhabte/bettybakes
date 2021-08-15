<?php include('partials/navbar.php'); ?>

    <!--main content goes here -->
    <div class = "content">
        <div class = "container">
             
             <h2> MANAGE FOOD</h2><br><br>

             <?php
                if(isset($_SESSION['add-food']))
                {
                    echo $_SESSION['add-food'];//display the session message if set
                    UNSET($_SESSION['add-food']);//remove session message
                }
            ?>
             <br><br>
             <a href = "<?php echo SITEURL; ?>admin/add-food.php" class = "add-admin-btn"> ADD FOOD</a>

             <br/>
             <br/>
            <!--title = '$title', 
                            
                            price = $price,
                            image_name = '$image_name',
                            
                            featured = '$featured',
                            active = '$active'
            -->
        
             <table class = "admin-table">
                 <tr>
                     <th> SN </th>
                     <th> Title </th>
                     <th> Price</th>
                     <th> Image Name </th>
                     <th> featured </th>
                     <th> Active </th>
                     <th> Actions </th>
                </tr>
                <?php
                    $sql = "SELECT * FROM food";

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
                                $price = $rows['price'];
                                $image_name = $rows['image_name'];
                                $featured =  $rows['featured'];
                                $active = $rows['active'];
                                ?>

                                <tr> 
                                    <td> <?php echo $sn++ ?></td>
                                    <td><?php echo $title ?></td>
                                    <td><?php echo $price ?></td>
                                    <td> 
                                        <?php
                                            //checks if image is selected
                                            if($image_name!="")
                                            {
                                                ?>
                                                 <img src = "<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" width = "100px">   
                                                 <?php
                                            }
                                            else
                                            {
                                                echo "Image Not Added";
                                            }

                                        ?> 
                                    </td>
                                    <td><?php echo $featured ?> </td>
                                    <td><?php echo $active ?> </td>
                                    <td> 
                                        <a href = "<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class = "update-admin-btn"> UPDATE FOOD</a>
                                        <a href = "<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>" class = "delete-admin-btn"> DELETE FOOD</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colspan = '7'> No Food Added </td>
                            </tr>

                            <?php
                        }
                    }
                ?>
               
            </table>
             
        </div>
    </div>

<?php include('partials/footer.php'); ?>