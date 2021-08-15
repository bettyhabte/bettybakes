<?php include('partials-front/navbar.php'); ?>

    <?php 
        //check whether cake id is set or not
        if(isset($_GET['cake_id']))
        {
            //get cake id
            $cake_id = $_GET['cake_id'];
            //get the details of the selected id
            $sql = "SELECT * FROM food where id = $cake_id";
            //excute the query

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            //check if there is data under the passed id 
            if($count == 1)
            {
                $row = mysqli_fetch_assoc($res);
                
                //we already get the id 
                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
                
            }
            else
            {
                //cake is not available so redirect
                header('location:'.SITEURL.'cakes.php');
            }
        }
        else
        {
            //redirect to homepage
            header('location:'.SITEURL.'cakes.php');
        }
    ?>

    <!-- the add cart field goes here-->
    <section class = "add-cart">
        <div class = "container">
            <div class = "add-cart-container">
                <div class = "add-cart-img">
                <?php
                    if($image_name == "")
                    {
                        //image not available
                        echo "Image not availabel";
                    }
                    else
                    {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name?>" alt="cake" class ="img-responsive image-resize" >;
                        <?php
                    }
                ?>
                    
                </div>
    
                <div class = "add-cart-description text-center">
                    <h2> <?php echo $title; ?></h2><br>
                    <p>  $<?php echo $price ?> </p>
    
                    <br>
                    <br>
                    <br>
    
                    <a href = "<?php echo SITEURL; ?>order.php?order_id=<?php echo $cake_id;?>" class = "order-now" style ="padding: 4%;"> Order Now </a>
                    
                </div>
    
                
            </div>
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