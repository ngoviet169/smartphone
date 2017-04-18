<?php

    function addComment($cmt_id, $user_id, $prod_id, $content){
        $sql = "insert into comment(user_id, prod_id, content) value('{$user_id}', '{$prod_id}', '{$content}')";

        $db->exec($sql);
    }
    include("connect.php");

    if(isset($_POST['id']))
        $prod_id = $_POST['id'];
    if(isset($_POST['user']))
        $user_name = $_POST['user'];

    $sql1 = "select id from user where user_name = '{$user_name}'";

    $query = $db->query($sql1);

    $user_id = $query->fetch(PDO::FETCH_COLUMN);

    //var_dump($user_id);

    if(isset($_POST['content']))
        $content = $_POST['content'];

    $sql1 = "insert into comment (prod)"

?>