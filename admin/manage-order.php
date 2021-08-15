<?php include('partials/navbar.php'); ?>

    <!--main content goes here -->
    <div class = "content">
        <div class = "container">
             
             <h2> MANAGE ORDER</h2><br><br>

             <br/>
             <?php
                if(isset($_SESSION['order-updated']))
                {
                    echo $_SESSION['order-updated'];
                    UNSET($_SESSION['order-updated']);
                }
             ?>
            
             <table class = "admin-table">
                 <tr>
                     <th> SN </th>
                     <th> Food </th>
                     <th> Price </th>
                     <th> Qty. </th>
                     <th> Total </th>
                     <th>Order_date </th>
                     <th> Status </th>
                     <th> Customer_name </th>
                     <th> Contact</th>
                     <th> Email </th>
                     <th> Adress </th>
                     <th> Actions </th>
                </tr>

                <?php
                    //get all the orders from database
                    //create sql query
                    $sql = "SELECT * FROM tbl_order ORDER BY id DESC";//displays the latest order first
                    //excute the query
                    $res = mysqli_query($conn, $sql);

                    //count the rows
                    $count = mysqli_num_rows($res);

                    if($count > 0)
                    {
                        //order available
                        $sn = 1;
                        while($row = mysqli_fetch_assoc($res))
                        {
                            //get the detail of the orders
                            $id = $row['id'];
                            $food = $row['food'];
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $total = $row['total'];
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];
                            $customer_contact =$row['customer_contact'];
                            $customer_email =$row['customer_email'];
                            $customer_address = $row['customer_address'];

                            ?>

                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $food; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $total; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td><?php echo $status; ?></td>
                                <td><?php echo $customer_name; ?></td>
                                <td><?php echo $customer_contact; ?></td>
                                <td><?php echo $customer_email; ?></td>
                                <td><?php echo $customer_address; ?></td>
                                <td>
                                    <a href = "<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class = "update-admin-btn"> UPDATE ORDER </a>
                                </td>
                            </tr>  
                            <?php

                        }
                    }
                    else
                    {

                        //order not available
                        echo "Order Not Available";
                    }
                ?>
            </table>
             
        </div>
    </div>

<?php include('partials/footer.php'); ?>