<?php include('partials-front/navbar.php'); ?>

    <!--the login form goes here-->

    <section class = "loginform">
        <div class = "container">
            <div class = "login-form text-center ">
                <h2 >Login</h2><br><br><br>
                <div class ="form-container">
                    <label for = "email">EMAIL</label><br><br>
                    <input type = "email" name = "email" required><br><br>
                </div>
                <div class ="form-container">
                    <label for ="psw">PASSWORD</label> <br><br> 
                    <input type = "password" name = "psw" required><br><br>
                </div>
                <div class ="form-container">
                    
                    <input type = "submit" name = "submit" value = "Login"><br><br>
                </div>

                <a href = "#" > Create Account</a>

            </div>

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