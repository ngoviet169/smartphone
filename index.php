<?php
    if(!isset($_SESSION))
        session_start();

    //connect to database
    include('include/connect.php');

    //content
    include('include/process-submit.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Website bán SmartPhone</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

</head>
<body>

    <?php

        

        //menu
        include('include/menu.php');

        //slide
        include('include/slide.php');
    ?>

    <div class="space20"></div>
    
    <?php
        //menu-left
        include('include/menu-left.php');

        //content
        include('include/content.php');
    ?>

     <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
</body>
</html>