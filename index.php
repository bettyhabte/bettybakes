<?php include('partials-front/navbar.php'); ?>
            <?php 
                if(isset($_SESSION['order']))//checking whether the session is set or not
                {
                    echo $_SESSION['order'];//display the session message if set
                    UNSET($_SESSION['order']);//remove session message
                }
            ?>  
   
    <br>
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