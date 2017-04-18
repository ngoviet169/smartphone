<?php
   
    $total = 0;
    $state = 0;

    if(isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $k => $v) {
            if(isset($k)){
                $state = 2;
            }
            $item[] = $k;
        }
    }

    if($state != 2){
        echo "Ban khong co mon nao trong gio hang.<br>";
        echo "<a href=index.php>Continue Shopping</a>";
    }

    else{
    $str = implode(" ,", $item);
    //$str2 = substr( $str, 2);
    //echo $str;
    //exit;
    $sql = "select * from product where prod_id in ($str) order by prod_id desc";

    $query = $db->query($sql);
    //var_dump($query);
    //exit;
    echo "<form action=index.php?function=updateCart method=post>";
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
                <td><?php echo $row['prod_name']; ?></td>
                <?php
                    echo '<td> '.$row['description'].'</td>';
                    echo '<td> '.number_format($row['price'],3).'VND</td>';
                ?>
                <td align="left"> <input type=text name=qty[<?php echo $row['prod_id']; ?>] size=5 value=<?php echo $_SESSION['cart'][$row['prod_id']] ?>></td>
                <td><a href="index.php?function=delCart&&productid=<?php echo $row['prod_id']; ?>">Delete</a></td>
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
