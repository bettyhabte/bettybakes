<?php include('partials-front/navbar.php'); ?>
    <?php
        //check whether cake is selected or not
        if(isset($_GET['order_id']))
        {
            $order_id = $_GET['order_id'];
          

            //create sql query to get the data from database of the selected id
            $sql = "SELECT * FROM food WHERE id = '$order_id' ";
            //excute the query
            $res = mysqli_query($conn, $sql);

            //count the rows
            $count = mysqli_num_rows($res);

            if($count == 1)
            {
                //data is available
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //data is not available so redirect 
                header('location:'.SITEURL.'add-cakes.php');
            }
        }
        else
        {
            //redirect to homepage
            header('location:'.SITEURL.'cakes.php');
        }
        
       
    ?>
        <br>
    <section>
        <div class  = "container">

            <?php
                 if(isset($_SESSION['order']))//checking whether the session is set or not
                 {
                     echo $_SESSION['order'];//display the session message if set
                     UNSET($_SESSION['order']);//remove session message
                 }
            ?>
            <form action ="" method = "post" class = "confirm-order text-center" >

                <div class = "order-img">
                    <div class = "order img">
                    <?php
                        //check if image is available
                        if($image_name =="")
                        {
                            //image not available
                            echo "Image not Available";
                        }
                        else
                        {
                            ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="cake" class ="img-responsive ">;
                            <?php
                        }
                    ?>
                        
                    </div>
                    <div class = "order order-description">
                        <h3> <?php echo $title; ?></h3>
                        <input type = "hidden" name = "title" value = "<?php echo $title; ?>">
                        <p> <?php echo $description; ?></p>
                        <h3>$<?php echo $price;?></h3>
                        <input type = "hidden" name = "price" value = "<?php echo $price; ?>">
                        <br>
                       
                        <div class = "order-quantity">
                            <label for = "qty"> Quantity</label>
                            <input type = "number" id = "qty" name = "qty">
                        </div>

                    </div>
                   
                    <div class ="clearfix"></div>
                </div>
                
            
                <div class = "order-confirmation">
                    
                    <h2> Contact Information</h2>
                    <br><br>
                    <div class ="form-container">
                        <label for = "full_name">Full Name</label><br><br>
                        <input type = "text" name = "full_name" required><br><br>
                    </div>
                    <div class ="form-container">
                        <label for = "phone_no">Phone Number</label><br><br>
                        <input type = "tel" name = "phone_no" required><br><br>
                    </div>
                    <div class ="form-container">
                        <label for = "email">Email</label><br><br>
                        <input type = "email" name = "email" required><br><br>
                    </div>
                    <div class ="form-container">
                        <label for ="address">Address</label> <br><br> 
                        <textarea name ="address"  placeholder= ""></textarea>
                        
                    </div>
                    <div class ="form-container">
                        
                        <input type = "submit" name = "submit" value = "Place Order" class = "order-btn"><br><br>
                    </div>
                    
                    <div class ="clearfix"></div>
                   
                </div>
                
            </form>
           <?php 
                //check if submit button is clicked
                if(isset($_POST['submit']))
                {
                    //get the values from the form
                     $food = $_POST['title'];
                     $price = $_POST['price'];
                     $qty = $_POST['qty'];
                     $total = $price * $qty;

                     $order_date = date('Y-m-d H:i:s');
                     $status = "ordered";//status could be ordered, delivered, on delivery, or cancelled

                     $customer_name = $_POST['full_name'];
                     $customer_contact= $_POST['phone_no'];
                     $customer_email = $_POST['email'];
                     $customer_address = $_POST['address'];

                    //save the order on database

                    $sql2 = "INSERT INTO tbl_order SET
                            food = '$food',
                            price = $price,
                            qty = $qty,
                            total = $total,
                            order_date = '$order_date',
                            status = '$status',
                            customer_name = '$customer_name',
                            customer_contact = '$customer_contact',
                            customer_email = '$customer_email',
                            customer_address = '$customer_address'
                            ";

                    //excute the query
                    $res2 = mysqli_query($conn,$sql2);
                    
                    //check if the query is excuted
                    if($res2 == true)
                    {
                        //query is excuted
                        $_SESSION['order'] = "Cake Ordered Successfully";
                        header('location:' .SITEURL);
                    }
                    else
                    {
                        //query is not excuted
                        printf("error: %s\n", mysqli_error($conn));
                        $_SESSION['order'] = " Failed to order";
                        header('location:' .SITEURL.'order.php');
                    }
                }
           ?>
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