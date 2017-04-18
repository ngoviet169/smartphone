<!DOCTYPE html>

<?php
    

    function editCate($id, $cate_name, $note) {
        include('connect.php');

        $sql = "update categories set cate_name = '{$cate_name}', note = '{$note}' where id = {$id}";

        $query = $db->prepare($sql);

        $query->execute();
?>
        <script> 
            location.replace("index.php");
            alert("Edit done !");
        </script>
<?php

        
    }

    function addCate($cate_name, $note){
        include('connect.php');

        $sql = "insert into categories(cate_name, note) value ('{$cate_name}', '{$note}')";

        $query = $db->prepare($sql);
        //var_dump($query);
        $query->execute();

?>
        <script> 
            location.replace("index.php");
            alert("Add a new categories successfully !");
        </script>
<?php
    }

    function deleteCate($id){
        include('connect.php');

        $sql = "delete from categories where id = {$id}";

        $query = $db->prepare($sql);

        $query->execute();

?>
        <script> 
            location.replace("index.php");
            alert("Delete successfully !");
        </script>
<?php
    }

    if(isset($_POST['cate_name']))
        $cate_name = $_POST['cate_name'];
    if(isset($_POST['note']))
        $note = $_POST['note'];
    
    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        editCate($id, $cate_name, $note);
    } else if(isset($_POST['add'])){
        addCate($cate_name, $note);
    } else if($_GET['function'] == 'deleteCate')
        $id = $_GET['id'];
        deleteCate($id);
?>
