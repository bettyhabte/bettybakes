<?php include('partials-front/navbar.php'); ?>

    <!--the category goes here-->
    <section class = "categories">
        <div class = "container">
            <h2 class ="text-center category-header"> SHOP FOR CAKES, DESSERTS, AND PIES</h2>
            <?php 
                //get the catagory from database
                //create sql query do display catagories from database
                $sql = "SELECT * FROM category WHERE active = 'yes' AND featured = 'yes'";
                //excute the query
                $res = mysqli_query($conn, $sql);
                //count the rows to check whether category is available
                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    //categories available
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //get the values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        <a href = "<?php echo SITEURL; ?>cakes.php">
                            <div class = "category float-container">
                                <?php 
                                    // check if image is availabel
                                    if($image_name =="")
                                    {
                                        //image is not available
                                        echo "Image Not Available";
                                    }
                                    else
                                    {
                                            //image is available
                                        ?>
                                            <img src ="<?php echo SITEURL; ?>images/category/<?php echo $image_name?>" alt = "CAKES" class = "img-responsive image-resize">
                                        <?php
                                     }
                                ?>
                                <h3 class = "float-text text-white"><?php echo $title; ?></h3>
                            </div>
                        </a>
                        <?php
                    }
                }
                else
                {
                    //categories not available
                    echo "category not added";

                }

            ?>
           
            

            <div class ="clearfix">
                
            </div>
            
        </div>
        
    </section>

    <div class = "line">

    </div>
    <!--the description goes here-->
    <section class = "description">
        <div class = "container">
            <div class = "detail float-container">
               
                <img src="images/Four-tier-wedding.jpg" alt="cake" class ="img-responsive image-resize">
                <p class ="detail-text">This beautiful handmade four tier wedding cake is one of the most favorite cake of all the time. It is blush pink covered with beautiful blush flowers. This cake is made with passion and it is the perfect cake four your special day.  </p>
            </div>

            <div class = "detail float-container">
                <img src="images/Three-tier-wedding.jpg" alt="cake" class = "img-responsive image-resize">
                <p class = "detail-text">This beautiful handmade three tier floral wedding cake is one of the most favorite cake of all the time. It is blush pink covered with beautiful blush flowers and the grenery adds the boho effect. This cake is made with passion and it is the perfect cake four your special day.</p>
            </div>

            <div class ="clearfix">
                
            </div>
            
        </div>
        
    </section>

<?php include('partials-front/footer.php'); ?>