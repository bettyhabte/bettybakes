<?php include('partials/navbar.php'); ?>

<div class = "content">
        <div class = "container">
            <h2> ADD FOOD</h2><br><br>

            <?php
                if(isset($_SESSION['add-food']))
                {
                    echo $_SESSION['add-food'];//display the session message if set
                    UNSET($_SESSION['add-food']);//remove session message
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];//display the session message if set
                    UNSET($_SESSION['upload']);//remove session message
                }
            ?>

            <br><br><br>
            <!--enctype allows to upload file-->
            <form action ="" method = "post" enctype = "multipart/form-data"> 
                <table class = "add-table">
                    <tr> 
                        <td class = "title">Title</td>
                        <td>
                            <input type = "text" name = "title" placeholder = "Category Title">
                        </td>
                        
                    </tr>
                    <tr>
                        <td> Description </tr>
                        <td>
                            <textarea name ="description" cols = "25" rows = "5" placeholder= "Description of the food."></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td> price </td>
                        <td>
                            <input type ='number' name = "price" >
                        </td>
                    </tr>
                    <tr>
                        <td> Select Image </td>
                        <td>
                            <input type ='file' name = "image" >
                        </td>
                    </tr>
                    <tr>
                        <td> Category </td>
                        <td>
                            <select name = "category">
                                <?php
                                    //create php code to display categories from database
                                    //create sql query to get all  active categories from databasse
                                    //only the active categories willbe displayed
                                    $sql = "SELECT * FROM category WHERE active ='yes'";
                                    $res = mysqli_query($conn, $sql);
                                    //check if query is excuted
                                    if($res ==true)
                                    {
                                        //count and check if data exist on database
                                        $count = mysqli_num_rows($res);
                                        echo $count;
                                        if($count > 0)
                                        {
                                            
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                //get the detailes of categories
                                                $id = $row['id'];
                                                $title =$row['title'];

                                                ?>

                                                <option value = "<?php echo $id ?>" > <?php echo $title; ?> </option>

                                                <?php

                                            }
                                        }
                                        else
                                        {
                                            ?> 
                                            <option value = "0"> No Category Found </option>
                                            <?php
                                        }
                                    
                                    }
                                ?>  
                            </select>
                        </td>
                    </tr>
                    <tr> 
                        <td>Featured:</td>
                        <td>
                            <input type = "radio" name = "featured" value= "Yes"> Yes
                            <input type = "radio" name = "featured" value = "No"> No
                        </td>  
                    </tr>
                    <tr> 
                        <td>Active:</td>
                        <td>
                            <input type = "radio" name = "active" value = "Yes"> Yes
                            <input type = "radio" name = "active" value = "No"> No
                        </td>                           
                    </tr>
                    
                    

                    <tr> 
                        <td colspan = "2">
                            <input type = "submit" name = "submit" value = "ADD FOOD" class = "add-admin-btn" style ="padding: 5%;">
                        </td>
                            
                    </tr>
                </table>
                            
            </form>  
            <?php
                //check if the submit button is clicked
                if(isset($_POST['submit']))
                {
                    
                    //get the values from form
                   $title = $_POST['title'];
                    
                    //for radio button, we need to check whether the buttons are clicked
                    $description = $_POST['description'];
                    $price = $_POST['price'];

                    //get the image
                    //check whether the image is selected or not
                    //will display all the data to be selected
                   //print_r($_FILES['image']);

                   //die();

                    if(isset($_FILES['image']['name']))
                   {
                       
                       //to upload image, image_name, source path, destination path are needed
                        $image_name = $_FILES['image']['name'];

                        //check whether the image is selected or not and upload image oonly if selected
                        if($image_name !="")
                        {
                            // Auto rename our image
                            //get the extension of our image(jpg, png, gif, ets)
                            
                            $ext = end(explode('.', $image_name));
                            
                            $image_name = "Food_Name_".rand(000,999).'.'.$ext;//eg. Food_Name_999.jpg
                           
                            //source path is the current location of the image
                            $source_path = $_FILES['image']['tmp_name'];

                            //destination path for the image to be upload
                            $destination_path = "../images/food/".$image_name;

                            //upload image
                        
                            $upload = move_uploaded_file($source_path, $destination_path);


                            //check if the image is uploaded
                            
                            if($upload == false)
                            {
                                $_SESSION['upload'] = "Failed to upload image";
                                header('location:'.SITEURL.'admin/add-food.php');
                                //stop the process and does not upload the data without the image
                                die();
                            }
                        }
                    }
                   
                   else
                   {
                       $image_name = "";
                   }


                    $category = $_POST['category'];
                   
                    if(isset($_POST['featured']))
                    {
                        //get the value
                        $featured = $_POST['featured'];
                        
                    }
                    else
                    {
                        //set default value
                        $featured = "No";
                    }
                    
                   
                    
                    if(isset($_POST['active']))
                    {
                        //get the value
                        $active = $_POST['active'];

                    }
                    else
                    {
                        //set default value
                        $active= "No";
                    }
                    
                
                   
                   
                    
                    //create sql query to insert category to database
                    $sql2 = "INSERT INTO food SET 
                            title = '$title', 
                            description = '$description',
                            price = $price,
                            image_name = '$image_name',
                            category_id = '$category',
                            featured = '$featured',
                            active = '$active'
                            ";
                    
                   echo $sql2;
                    //excute query
                    $res2 = mysqli_query($conn, $sql2);
                   
                    if($res2 == false)
                    {
                        printf("error: %s\n", mysqli_error($conn));
                    }
                   
                    //check query is excuted or not and data is added or not
                    
                    if($res2 == true)
                    {
                        
                        $_SESSION['add-food'] = 'Food Added Successfully';
                        //redirect to manage category page
                        header('location:'.SITEURL.'admin/manage-food.php');

                    }
                    
                    else
                    {
                        //failed to excute
                        
                        $_SESSION['add-food'] = 'Failed To Add food';
                        //redirect to add category page
                        header('location:'.SITEURL.'admin/add-food.php');
                    } 
                } 
             ?>
        </div>  
</div>
<?php include('partials/footer.php'); ?>