<?php
    $id = $_GET['id'];

    $quantyti = 0;

    if(isset($_SESSION['cart'][$id])){
        $quantyti = $_SESSION['cart'][$id] + 1;
    } else {
        $quantyti = 1;
    }

    $_SESSION['cart'][$id] = $quantyti;

    //echo $quantyti;
    //exit;
    echo "<script>window.location.replace('index.php?function=showCart')</script>";
?>