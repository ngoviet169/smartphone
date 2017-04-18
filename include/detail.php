<?php
    include('connect.php');

    if(isset($_GET['id']))
        $id = $_GET['id'];
    //echo $id;
    //exit;
    $sql = "select * from product where prod_id = '{$id}'";

    $query = $db->query($sql);
    //var_dump($query);
    //exit;
    while ($row = $query->fetch(PDO::FETCH_ASSOC)){
?>
<div align="center">
<div style="width:560px" align="center">

<table width="560" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td width="220" rowspan="7" align="center" valign="top"><div>
      <p><img src="image\product\lastadd\<?php echo $row['picture']; ?>" width="170" height="170"><br />
        
      </p>
      <a href="index.php?function=addCart&&id=<?php echo $row['prod_id']; ?>">Add to Cart</a>
      <p>&nbsp;</p>
    </div>
    <form method="post" name="form">
    <input type="hidden" name="dathang" />
    <input type="hidden" value=<?php echo "$id"; ?> name="catid" /> 
    <input type="hidden" name="gia" value="<?php echo "$gia"; ?>" />
     </form></td>
    <td width="120" height="25" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Mã sản phẩm:</td>
    <td width="220" style="border-bottom:1px dotted #666; padding-left:5px"><span style="font-size:18px; color:#00F; font-weight:bold"><?php echo $row['prod_id']; ?></span></td>
  </tr>
  <tr>
    <td height="25" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Giá:</td>
    <td style="border-bottom:1px dotted #666; padding-left:5px"><font color="#FF0000"><?php  echo number_format($row['price']); ?></font></td>
  </tr>
  <tr>
    <td height="25" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Thuế VAT:</td>
    <td style="border-bottom:1px dotted #666; padding-left:5px"><font color="#FF0000">Giá trên chưa bao gồm thuế</font></td>
  </tr>
  <tr>
    <td height="25" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Bảo hành:</td>
    <td style="border-bottom:1px dotted #666; padding-left:5px">12 tháng.</td>
  </tr>
  <tr>
    <td height="40" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Vận chuyển:</td>
    <td style="border-bottom:1px dotted #666; padding-left:5px">Giao hàng toàn quốc</td>
  </tr>
  <tr>
    <td height="40" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Thời gian <br />
      giao hàng:</td>
    <td style="border-bottom:1px dotted #666; padding-left:5px">
    </td>
  </tr>  
  <tr>
    <td height="70" style="padding-left:20px; border-bottom:1px dotted #666; border-right:1px dotted #666">Hình thức<br />
thanh toán:</td>
    <td style="padding-left:5px"><p>Nhận tiền sau khi giao hàng</p></td>
  </tr>

    <td align="justify" colspan="3" style="border-bottom:1px solid #333; padding-bottom:5px; color:#F00">
    </td>
  </tr>  
</table>
<table width="560" border="0" cellspacing="0" cellpadding="0" style="padding-top:5px;">
<tr>
    <td>
    <div id="TabbedPanels1" class="TabbedPanels">
      <ul class="TabbedPanelsTabGroup">
        
        </ul>
       
      <div class="TabbedPanelsContentGroup">
       <!-- Mô tả sản phẩm --> 
        <div class="TabbedPanelsContent">
        <table width="552" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td style="line-height:25px"><?php echo $row['description']; ?></td>
          </tr>
        </table>
        </div>
</div>
</div>
</td>
</tr>
</table>

<!--check user loged-->
<?php
  if(isset($_SESSION['user']))
  {
?>
<form action="index.php?function=comment" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <input type="hidden" name="user" value="<?php echo $_SESSION['user']; ?>">
  <input type="text" name="content">
  <input type="submit" name="comment" value="Comment">
</form>
</div>
<?php
  }
}
?>