<?php
    include('connect.php');

    if(isset($_GET['id']))
        $id = $_GET['id'];
    //echo $id;
    //exit;
    $sql = "select categories.cate_name, product.* from product inner join categories on product.cate_id = categories.id where prod_id = {$id}";

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
      <p><img src="admin\image\product\<?php echo $row['cate_name']; ?>\<?php echo $row['picture']; ?>" width="170" height="170" class="img-rounded"><br />
        
      </p>
      <a href="index.php?process=add-cart&&id=<?php echo $row['prod_id']; ?>">Add to Cart</a>
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
    <td style="border-bottom:1px dotted #666; padding-left:5px"><font style="font-weight: bold;"><?php  echo number_format($row['price']); ?></font></td>
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
<div>
<?php
  include('connect.php');
  
  //$sql1 = "SELECT user.user_name, comment.content from comment INNER JOIN user ON comment.user_id = user.id where cmt_prod_id = {$id}";
?>
  <table width="600" class="table">
<?php
  
  $sql1 = "select user.user_name from comment inner join user on comment.user_id = user.id where cmt_prod_id = {$id}";

  $query1 = $db->query($sql1);

  //echo $username;

  $sql2 = "select content from comment inner join user on comment.user_id = user.id where cmt_prod_id = {$id}";

  $query2 = $db->query($sql2);

  if(isset($_SESSION['user']))
    {
  $user_name = $_SESSION['user'];
  // echo $user_name;
  $sql3 = "select id from user where user_name = '{$user_name}'";

  $query3 = $db->query($sql3);
  
  $user_id = $query3->fetch(PDO::FETCH_COLUMN);
  }

  $sql4 = "select cmt_id from comment where cmt_prod_id = {$id}";

  $query4 = $db->query($sql4);

  while($username = $query1->fetch(PDO::FETCH_COLUMN) and $content = $query2->fetch(PDO::FETCH_COLUMN) and $cmt_id = $query4->fetch(PDO::FETCH_COLUMN)){

?>
    <tr>
      <td width="100" align="center"><?php echo $username; ?></td>
      <td><?php echo $content; ?></td>
      <td>
        <?php
          if(isset($_SESSION['user'])){
            if($user_name == $username || $user_name == 'vietbeo'){
              echo "<a href=index.php?process=delete-comment&&cmt_id=".$cmt_id.">Delete</a>";
            }
          }
        ?>
      </td>
    </tr>
  <?php
    }
  ?>
  </table>
</div>

<!--check user loged-->
<?php
  if(isset($_SESSION['user']))
  {
?>
<form action="index.php?process=comment" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <input type="hidden" name="user" value="<?php echo $_SESSION['user']; ?>">
  <input type="text" name="content" class="form-group">
  <input type="submit" name="comment" value="Comment" class="btn btn-primary">
</form>
</div>

<?php
  }
}
?>