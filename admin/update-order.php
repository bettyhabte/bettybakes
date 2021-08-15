<?php include('partials/navbar.php'); ?>
<div class = "content">
    <div class = "container">
        <h2> UPDATE ORDER</h2><br><br>

        <?php

        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            //get the detail of selected id
            $sql = "SELECT * FROM tbl_order WHERE id =$id";
                
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

                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact =$row['customer_contact'];
                    $customer_email =$row['customer_email'];
                    $customer_address = $row['customer_address'];
            
                    

                }
                else
                {
                    header("location:".SITEURL.'admin/manage-order.php');
                }
            }
        }
        else
        {
            //redirect to manage order page
            header('location:'.SITEURL.'manage-order.php');
        }
        ?>

        <form action ="" method = "post" >
            <table class = "add-admin-table">
                <tr>
                    <td>Food Name </td>
                    <td> 
                        <?php echo $food; ?>
                    </td>
                </tr>
                <tr>
                    <td> Price </td>
                    <td> 
                        $<?php echo $price; ?>
                    </td>
                </tr>
                
                <tr>
                    <td>Qty</td>
                    <td>
                        <input type = "number" name = "qty" value = "<?php echo $qty; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select  name = "status">
                            <option <?php if($status == "ordered"){echo "selected";} ?> value = "ordered"> ordered </option>
                            <option <?php if($status == "on delivery"){echo "selected";} ?>value = "on delivery"> on delivery </option>
                            <option <?php if($status == "delivered"){echo "selected";} ?>value = "delivered"> delivered </option>
                            <option <?php if($status == "cancelled"){echo "selected";} ?>value  = "cancelled"> cancelled </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td> Customer_name</td>
                    <td>
                        <input type = "text" name ="customer_name" value ="<?php echo $customer_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td> Customer_contact</td>
                    <td>
                        <input type = "tel" name ="customer_contact" value ="<?php echo $customer_contact; ?>">
                    </td>
                </tr>
                <tr>
                    <td> Customer_email</td>
                    <td>
                        <input type = "email" name ="customer_email" value ="<?php echo $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td> Customer_addres</td>
                    <td>
                        <textarea  name ="customer_address" cols ="30" rows = "5"><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan ="2">
                        <input type = "hidden" name = "id" value = "<?php echo $id; ?>"><!--pass the id in hidden form-->
                        <input type = "hidden" name = "price" value = "<?php echo $price; ?>"><!--pass the price in hidden form-->
                        <input type ="submit" name = "submit" value = "Update Order" class = "add-admin-btn" style ="padding: 5%;">
                    </td>
                </tr>
            </table>
        </form>

        <?php

            //check if submit button is clicked
            if(isset($_POST['submit']))
            {
                
                //get the values from form
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty;

                $status = $_POST['status'];
                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                //update the values
                //create sql query
                $sql2  = "UPDATE tbl_order SET
                            qty = $qty,
                            total = $total,
                            status = '$status',
                            customer_name = '$customer_name',
                            customer_contact = '$customer_contact',
                            customer_email = '$customer_email',
                            customer_address = '$customer_address'
                            WHERE id = '$id'
                            ";
                //excute query
                $res2 = mysqli_query($conn, $sql2);
                //check whether the query is excuted

                if($res2 == true)
                {
                    //query is excuted
                    $_SESSION['order-updated'] = "Order Updated Succesfully";
                    //redirect to manage order page
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
                else
                {
                    //query not excuted
                    $_SESSION['order-updated'] = "Failed To Update Order";
                    //redirect to update order page
                    header('location:'.SITEURL.'admin/update-order.php');
                }
            }
        ?>
    </div>
</div>
<?php include('partials/footer.php'); ?>