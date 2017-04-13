<?php
    if(!isset($_SESSION))
        session_start();
    if(!isset($_SESSION["success"]))
        header("location:login.php");   
    if($_SESSION["role"]!=1)
        echo "<script>alert('Sorry, This account cannot login to admin area !');window.location='login.php';</script>";
?>