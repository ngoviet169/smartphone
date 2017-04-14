<?php
    if(!isset($_SESSION))
        session_start();
        session_destroy();
        unset($_SESSION["user"]);
        echo "<script> window.location.replace('index.php') </script>";

?>