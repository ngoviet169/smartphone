<!DOCTYPE html>

<?php
    function addProduct($cate_id, $prod_name, $description, $picture, $price){
        include('connect.php');

        $sql = "insert into product(cate_id, prod_name, description, picture, price) value({$cate_id}, '{$prod_name}', '{$description}', '{$picture}', '{$price}')";

        $query = $db->query($sql);

        $last_id = $db->lastInsertId();

        if(isset($_POST['rank']))
            $rank_id = $_POST['rank'];
        $count = 0;
        $count = count($rank_id);
        
        for($i = 0; $i < $count; $i++){
            $sql1 = "insert into prod_rank(prod_id, rank_id) values ({$last_id}, {$rank_id[$i]})";
            
            $query1 = $db->query($sql1);
        }
        
    }
    if(isset($_POST['categories']))
        $cate_id = $_POST['categories'];
    //echo $cate_id;
    if(isset($_POST['prod_name']))
        $prod_name = $_POST['prod_name'];

    if(isset($_POST['description']))
        $description = $_POST['description'];
    
    if(isset($_POST['price']))
        $price = $_POST['price'];

    if(isset($_POST['upload'])){
        if(isset($_FILES['image'])){

            $sql = "select * from categories where id = {$cate_id}";

            $query = $db->query($sql);

            $row = $query->fetch(PDO::FETCH_ASSOC);

            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $path = "image/product/".$row['cate_name']."/";
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
            $expensions= array("jpeg","jpg","png");
              
            if(in_array($file_ext,$expensions)=== false){
                $errors="Tmp of file not support.";

            }
              
            if($file_size > 2097152){
                $errors='File size is not large more than 2mb';
            }
              
            if(empty($errors)==true){
                
                if(file_exists($path.$file_name)){
                    echo "File is already exists !";
                    return;
                }
                move_uploaded_file($file_tmp,$path.$file_name);
                
            }
            else{
                print_r($errors);
            }
        }
        $picture = $file_name;
        addProduct($cate_id, $prod_name, $description, $picture, $price);
        
        header('location:index.php?function=prod_add');
    }
?>
