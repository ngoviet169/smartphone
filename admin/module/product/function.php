<!DOCTYPE html>

<?php
    function addProduct($cate_id, $prod_name, $description, $picture, $price){
        include('connect.php');

        $sql = "insert into product(cate_id, prod_name, description, picture, price) value({$cate_id}, '{$prod_name}', '{$description}', '{$picture}', '{$price}')";

        $query = $db->query($sql);
    }

    if(isset($_POST['categories']))
        $cate_id = $_POST['categories'];
    if(isset($_POST['prod_name']))
        $prod_name = $_POST['prod_name'];
    if(isset($_POST['description']))
        $description = $_POST['description'];
    if(isset($_POST['image']))
        $picture = $_POST['image'];
    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
         
        $expensions= array("jpeg","jpg","png");
         
        if(in_array($file_ext,$expensions)=== false){
            $errors[]="Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
        }
          
        if($file_size > 2097152){
            $errors[]='Kích cỡ file nên là 2 MB';
        }
          
        if(empty($errors)==true){
            move_uploaded_file($file_tmp,"image/product/lastAdd/".$file_name);
            echo "Thành công!!!";
        }
        else{
            print_r($errors);
        }
    }
    if(isset($_POST['price']))
        $price = $_POST['price'];
    if(isset($_POST['upload']))
        addProduct($cate_id, $prod_name, $description, $picture, $price)
?>
