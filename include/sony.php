<?php
    include('connect.php');

    $counter = 0;

    $sql = "select count(*) from product where cate_id = 2";

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

    $sql1 = "select * from product where cate_id = 2 limit {$dongbatdau}, {$kichthuoctrang}";

    $recordset = $db->query($sql1);

    //$chucnang = '';
    $chucnang = $_GET['function'];
    //echo $chucnang;
    //exit;

    while ($row = $recordset->fetch(PDO::FETCH_ASSOC)) {
                                            
?>
    <div>
        <div style="float: left; padding: 20px; border: 1px solid #CCCCCC; margin: 6px;">
            <a href="#"><img src="image\product\<?php echo $chucnang; ?>\<?php echo $row['picture']; ?>" width= 150 height = 150/></a>
            <a href="#"><p style="text-align: center;"><?php echo $row['prod_name']; ?></p></a>
            <a href="#"><p style="text-align: center;"><?php echo $row['price']; ?>đ</p></a>
            <a href="index.php?function=addCart&&id=<?php echo $row['prod_id']; ?>"><p style="text-align: center;">Add Cart</p>
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
    <a href="index.php?function=Sony&tranghientai=<?php echo $i; ?>"><?php echo $i . " " ?></a>
   
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