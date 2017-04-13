<?php
    include('connect.php');

    $sql = "select * from product where cate_id = 2";

   $recordset = $db->query($sql);

    while ($row = $recordset->fetch(PDO::FETCH_ASSOC))  {
                                                  
?>
    <div>
        <div style="float: left; padding: 13px; border: 1px solid #CCCCCC; margin: 12px; width: 180px;">
            <a href="#"><img src="image\product\sony\<?php echo $row['picture']; ?>" width= 150 height = 150/></a>
            <a href="#"><p style="text-align: center;"><?php echo $row['prod_name']; ?></p></a>
            <a href="#"><p style="text-align: center;"><?php echo $row['price']; ?>đ</p></a>
        </div>
    </div>
    
<?php
    }
?>