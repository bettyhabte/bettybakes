<?php include('partials/navbar.php'); ?>

    <!--main content goes here -->
    <div class = "content">
        <div class = "container">
             <!--the navbar goes here-->
             <h3> DASHBOARD</3><br><br>
             <?php
                //if login is set
                if(isset($_SESSION['login']))
                {
                    //display message when session is set
                    echo $_SESSION['login'];
                    UNSET($_SESSION['login']);
                }
            ?>

            <br><br> 
             <div class = "col text-center" >

             </div>
             <div class = "col text-center" >

             </div>
             <div class = "col text-center" >

             </div>
             <div class = "col text-center" >

             </div>

             <div class = "clearfix">
             </div>
    
        </div>
    </div>

<?php include('partials/footer.php'); ?>