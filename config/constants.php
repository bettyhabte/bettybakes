<?php

    //start the session

    session_start();

    //create constants to store repeating values
    define('SITEURL', 'http://localhost/bettybakes/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'bettybakes');
    // create connection
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    //database connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>