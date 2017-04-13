<?php
function checkquyentruycap_bang($mucbang)
{
    $sscapquyen=$_SESSION['capquyen'];
    if ($sscapquyen!=$mucbang)
        echo "<script>alert('Không có quyền truy cập vào phần quản lý này.'); window.location='index.php';</script>";
}

function checkquyentruycap_bang2($muc2,$muc3)
{
    $sscapquyen=$_SESSION['capquyen'];
    if (($sscapquyen!=$muc2) and ($sscapquyen!=$muc3))
        echo "<script>alert('Không có quyền truy cập vào phần quản lý này '); window.location='index.php';</script>";
 }
 
function checked_quyenhan()
{
    if (isset($_GET['key']))
    {
         $idkey=EncodeSpecialChar($_GET['key']);
         
         $sql_quyenhan="SELECT * FROM capquyen where user='$idkey'";
         $result_thanhvien=mysql_query($sql_quyenhan);
        
         echo "<script language='JavaScript'>";         

        while ($row=mysql_fetch_array($result_thanhvien))
        {                           
                echo "document.form1.check_".$row["id_chuyenmuc"].".checked=true;";                     
        }       
        echo "</script>";       // dong javascript
    }
 }

function EncodeSpecialChar($content) {  //insert table
    $content = trim($content);
    $content = addslashes($content);
    $content = htmlspecialchars($content);
    return $content;
}



 






