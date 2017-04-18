<?php

    function addComment($user_id, $cmt_prod_id, $content){
        include("connect.php");

        $sql = "insert into comment(user_id, cmt_prod_id, content) value('{$user_id}', '{$cmt_prod_id}', '{$content}')";

        $db->exec($sql);

        echo "<script>window.history.back(-1);window.refesh()</script>";
    }

    function delComment($cmt_id, $user_id){
        include('connect.php');

        $sql = "delete * from comment where cmt_id = '{$cmt_id}";

        $query = $db->query($sql);
    }
    
    if(isset($_POST['id']))
        $cmt_prod_id = $_POST['id'];
    if(isset($_POST['user'])){
        $user_name = $_POST['user'];

        $sql1 = "select id from user where user_name = '{$user_name}'";

        $query = $db->query($sql1);

        $user_id = $query->fetch(PDO::FETCH_COLUMN);
    }

    

    //var_dump($user_id);
    if(isset($_GET['cmt_id']))
        $cmt_id = $_GET['cmt_id'];

    if(isset($_POST['content']))
        $content = $_POST['content'];

    if(isset($_POST['comment']))
        addComment($user_id, $cmt_prod_id, $content);
?>