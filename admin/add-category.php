<?php include('partials/navbar.php'); ?>
<div class = "content">
        <div class = "container">
            <h2> ADD CATEGORY</h2><br><br>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//display the session message if set
                    UNSET($_SESSION['add']);//remove session message
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];//display the session message if set
                    UNSET($_SESSION['upload']);//remove session message
                }
            ?>
            <!--enctype allows to upload file-->
            <form action ="" method = "post" enctype = "multipart/form-data"> 
                <table class = "add-table">
                    <tr> 
                        <td>Title</td>
                        <td>
                            <input type = "text" name = "title" placeholder = "Category Title">
                        </td>
                        
                    </tr>
                    <tr>
                        <td> Select Image </td>
                        <td>
                            <input type ='file' name = "image" >
                        </td>
                    </tr>
                    <tr> 
                        <td>Featured:</td>
                        <td>
                            <input type = "radio" name = "featured" value = "Yes">Yes
                            <input type = "radio" name = "featured" value = "No">No
                        </td>  
                    </tr>
                    <tr> 
                        <td>Active</td>
                        <td>
                            <input type = "radio" name = "active" value = "Yes">Yes
                            <input type = "radio" name = "active" value = "No">No
                        </td>                           
                    </tr>
                    
                    

                    <tr> 
                        <td>
                            <input type = "submit" name = "submit" value = "ADD CATEGORY" class = "add-admin-btn" style ="padding: 5%;">
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
                    if(isset($_POST['featured']))
                    {
                        //get the value
                        $featured = $_POST['featured'];
                        
                    }
                    else
                    {
                        $featured = "No";
                    }
                    
                   
                    
                    if(isset($_POST['active']))
                    {
                        //get the value
                        $active = $_POST['active'];

                    }
                    else
                    {
                        $active= "No";
                    }
                    //check whether the image is selected or not
                    //will display all the data to be selected
                   //print_r($_FILES['image']);

                   //die();

                
                   if(isset($_FILES['image']['name']))
                   {
                       
                       //to upload image, image_name, source path, destination path are needed
                        $image_name = $_FILES['image']['name'];

                        // Auto rename our image
                        //get the extension of our image(jpg, png, gif, ets)
                        $ext = end(explode('.' , $image_name));
                        $image_name = "Food_category_".rand(000,999).'.'.$ext;//eg. Food_category_999.jpg
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/".$image_name;
                        
                        echo is_uploaded_file($source_path);

                        //upload image
                        $upload = move_uploaded_file($source_path, $destination_path);


                        //check if the image is uploaded
                        
                        if($upload == false)
                        {
                            printf("error: %s\n", mysqli_error($conn));
                            
                           $_SESSION['upload'] = "Failed to upload image";
                           header('location:'.SITEURL. 'admin/add-category.php');
                           //stop the process and does not upload the data without the image
                           
                           die();
                           
                        }
                       
                   }
                   
                   else
                   {
                       $image_name = "";
                   }
                   
                    
                    //create sql query to insert category to database
                    $sql = "INSERT INTO category SET 
                            title = '$title', 
                            image_name = '$image_name',
                            featured = '$featured',
                            active = '$active'
                            ";
                    
                   
                    //excute query
                    $res = mysqli_query($conn, $sql);
                    if($res == false)
                    {
                        printf("error: %s\n", mysqli_error($conn));
                    }
                   
                    //check query is excuted or not and data is added or not
                    
                    if($res == true)
                    {
                        echo "query excuted";
                        $_SESSION['add'] = 'Category Added Successfully';
                        //redirect to manage category page
                        header('location:'.SITEURL.'admin/manage-category.php');

                    }
                    
                    else
                    {
                        //failed to excute
                        
                        $_SESSION['add'] = 'Failed To Add Category';
                        //redirect to add category page
                        header('location:'.SITEURL. 'admin/add-category.php');
                    }
                    
                    
                }
                
            ?>
        </div>  

</div>

<?php include('partials/footer.php'); ?>

