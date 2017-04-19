<?php

    $counter = 0;

    $sql = "SELECT count(*) FROM product ORDER BY created_at desc";

    $recordsetrow = $db->query($sql);

    $row = $recordsetrow->fetch(PDO::FETCH_COLUMN);

    $tongsodong = $row;

    $kichthuoctrang = 8;

    $tongsotrang = 1;

    if($tongsodong % $kichthuoctrang == 0) 

        $tongsotrang = $tongsodong / $kichthuoctrang;

    else

        $tongsotrang = (int)($tongsodong / $kichthuoctrang) + 1;

    //echo $row;
        
    $dongbatdau = 1;

    $tranghientai = 1;

    if((!isset($_GET['tranghientai'])) || ($_GET['tranghientai'] == '1')) { 
        $dongbatdau = 0;                                                     
        $tranghientai = 1;                                                 
        } else { 
            $dongbatdau = ($_GET['tranghientai'] - 1) * $kichthuoctrang;
            $tranghientai = $_GET['tranghientai'];
            }

    $sql1 = "select categories.cate_name, product.* from product inner join categories on product.cate_id = categories.id order by created_at desc limit {$dongbatdau}, {$kichthuoctrang}";

    $query1 = $db->query($sql1);

    while ($row = $query1->fetch(PDO::FETCH_ASSOC)) {

    
                                            
?>
    <div>
        <div style="float: left; padding: 20px; border: 1px solid #CCCCCC; margin: 6px;">
            <a href="index.php?function=detail&&id=<?php echo $row['prod_id']; ?>"><img src="admin\image\product\<?php echo $row['cate_name']; ?>\<?php echo $row['picture']; ?>" width= 150 height = 150/></a>
            <a href="index.php?function=detail&&id=<?php echo $row['prod_id']; ?>"><p style="text-align: center;"><?php echo $row['prod_name']; ?></p></a>
            <a href="index.php?function=detail&&id=<?php echo $row['prod_id']; ?>"><p style="text-align: center;"><?php echo $row['price']; ?>đ</p></a>
            <a href="index.php?process=add-cart&&id=<?php echo $row['prod_id']; ?>"><p style="text-align: center;">Add Cart</p>
        </div>
    </div>
    
<?php
    }
?>

<?php
    for($i = 1; $i <= $tongsotrang; $i++)
    {
        if($tranghientai == $i)
        {
            echo $i;
        }
        else
        {
?>
    <a href="index.php?tranghientai=<?php echo $i; ?>"><?php echo $i . " " ?></a>
   
<?php
        }
    }
?>


<form name="t1109h">
    <input type="hidden" name="tranghientai"/>
</form>
<script language="javascript">
    function chuyentrang(trang){
            t1109h.tranghientai.value = trang;
            t1109h.submit();
        }
</script>