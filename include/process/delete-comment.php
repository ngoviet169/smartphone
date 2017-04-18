<?php
    include('connect.php');

    if(isset($_GET['cmt_id']))
            $cmt_id = $_GET['cmt_id'];

    if(isset($_SESSION['user'])){

        $user_name = $_SESSION['user'];

        $sql1 = "select user.user_name from comment inner join user on comment.user_id = user.id where cmt_id = {$cmt_id}";

        $query1 = $db->query($sql1);

        $username = $query1->fetch(PDO::FETCH_COLUMN);
        if($user_name == $username || $user_name == 'vietbeo'){
            $sql = "delete from comment where cmt_id = {$cmt_id}";

            $query = $db->query($sql);
            } else echo "<script>alert'You dont have a permission !; window.history.back(-1);'</script>";
        }

    echo "<script>window.history.back(-1);</script>";
?>