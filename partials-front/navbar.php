<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <title>bakery</title>

    <!--link the css file here-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!--the address goes here-->
    <section class = "address">
        <div class = "container">
            <p>Indianapolis IN: Monday - Sunday 10:00AM - 10:00PM</p>
        </div>
        
    </section>

    <!--the logo goes here -->
    <section class = "search-logo-login-cart">
        <div class = "container">
            <div class = "logo text-center">
                <p> BETTY BAKES</p>
            </div> 
            <div class = "search">
                <form action="">
                    <input type = "search" name = "search" placeholder="">
                    <input type = "submit" name = "submit" value = "Search" class = "btn">  
                </form>
               
            </div>
           
            <div class = "login-cart text-right">
                <ul>
                    <li class = "login ">
                        <a href = "login.html" >Login</a>
                    </li>
                    <li class = "cart">
                        <a href ="#" > Cart</a>
                    </li>
                </ul>
            </div>  
           
        </div>
        
    </section>

   
   
    <!--the navbar goes here-->
    <section class = "navbar">
        <div class = "container">
           <div class = "navigate">
                <ul>
                    <li> 
                        <a href = "<?php echo SITEURL; ?>"> HOME</a>
                    </li>
                    <li> 
                        <a href = "<?php echo SITEURL; ?>category.php"> THE BAKERY</a>
                    <li> 
                        <a href = "#"> RESERVATIONS </a>
                    </li>
                    <li> 
                        <a href = "#"> CONTACT US</a>
                    </li>
                </ul>
            </div>
        </div>
        
    </section>