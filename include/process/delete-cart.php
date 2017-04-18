<?php
//session_start();
$cart=$_SESSION['cart'];
$id=$_GET['productid'];
if($id == 0)
{
 unset($_SESSION['cart']);
}
else
{
unset($_SESSION['cart'][$id]);
}
//echo "<script>window.location.replace(index.php?function=showCart);</script>";
header('location:index.php?function=showCart');
//exit();
?>