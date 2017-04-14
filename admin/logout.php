<?php
    if(!isset($_SESSION))
        session_start();
        unset($_SESSION["success"]);
        unset($_SESSION["user"]);
        echo "<script> window.location.replace('login.php') </script>";
?>