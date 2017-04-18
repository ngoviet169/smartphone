<?php
   
    $total = 0;
    $state = 0;

    if(isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $k => $v) {
            if(isset($k)){
                $state = 1;
            }
            $item[] = $k;
        }
    }

    if($state != 1){
        echo "Ban khong co mon nao trong gio hang.<br>";
        echo "<a href=index.php>Continue Shopping</a>";
    }

    else{
    $str = implode(" ,", $item);

    $sql = "select * from product where prod_id in ($str) order by prod_id desc";

    $query = $db->query($sql);
    $sql1 = "select count(*) from product where prod_id in ($str) order by prod_id desc";

    $query1 = $db->query($sql1);
    $count = $query1->fetch(PDO::FETCH_COLUMN);
    // echo $count;
    //exit;
    echo '<form action="index.php?process=update-cart" method="post">';
    ?>
    <table border="1">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantyti</th>
                <th>Remove</th>
                <th>Total price</th>
            </tr>
    <?php
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
    {
?>
            <tr>
                <td><a href="index.php?function=detail&&id=<?php echo $row['prod_id']; ?>"><?php echo $row['prod_name']; ?></a></td>
                <?php
                    echo '<td> '.$row['description'].'</td>';
                    echo '<td> '.number_format($row['price'],3).'VND</td>';
                ?>
                <td align="left"> <input type=text name=qty[<?php echo $row['prod_id']; ?>] size=5 value=<?php echo $_SESSION['cart'][$row['prod_id']] ?>></td>
                <td><a href="index.php?process=delete-cart&&productid=<?php echo $row['prod_id']; ?>">Delete</a></td>
                <td align="left"> <?php echo number_format($_SESSION['cart'][$row['prod_id']]*$row['price'],3 ); ?>VND</td>
            </tr>

            <!--javascrip-->
            <script type="text/javascript">
                function back(){
                    window.location.replace('index.php');
                }

            </script>
            
<?php

        $total += $_SESSION['cart'][$row['prod_id']]*$row['price'];
    }

    echo "<tr><td colspan=5 align=center>Total</td><td align=center>".number_format($total,3)."VND</td></tr></table>";

    echo "<input type=submit name=submit value='Update' />";
    echo "<input type=button value='Continue Shopping' onclick=back()>";
    echo "</form";
}
?>
