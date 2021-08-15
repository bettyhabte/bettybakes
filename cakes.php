<?php include('partials-front/navbar.php'); ?>

    <section class = "cakes">
        <div class = 'container'>

            <h2 class = "text-center"> CAKES </h2>

            <br><br><br>
            <?php
                //create sql to get the data from database
                $sql = "SELECT * FROM food where active = 'yes' AND featured = 'yes'";
                //excute the query
                $res = mysqli_query($conn, $sql);

                //count the rows 
                $count = mysqli_num_rows($res);
               
                if($count >0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name']
                        ?>
                        <a href ="<?php echo SITEURL; ?>add-cakes.php?cake_id=<?php echo $id; ?>">
                            <div  class = "cake-box " >
                                <div class = "cake-box-img">
                                <?php
                                    if($image_name=="")
                                    {
                                        //image not available
                                    }
                                    else
                                    {
                                        //image available
                                        ?>
                                        <img src ="<?php echo SITEURL; ?>images/food/<?php echo $image_name?>" alt = "CAKES" class = "img-responsive image-resize">
                                        <?php

                                    }
                                ?>   
                                </div>
                                <div class = "cake-box-description text-center">
                                    <h3><?php echo $title; ?> </h3>
                                    <p>$<?php echo $price; ?></p>
                                </div> 
                                
                            </div>
                        </a> 
                        <?php
                    }
                }
                else
                {
                    //no data on database
                    echo " No food added";
                }
            ?>
            
            
                
            <div class ="clearfix">
                
            </div>
            
        </div>
    </section>

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