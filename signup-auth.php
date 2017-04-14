<?php

    function addUser($user_name, $fullname, $email, $password){
        include('connect.php');
        //check user name
        $test = "select count(*) from `user` where `user_name` = '{$user_name}'";
        $test1 = $db->query($test);
        $test2 = $test1->fetch(PDO::FETCH_ASSOC);

        //check email

        //$test3 = "select count(*) from `user` where `email` = '{$email}'";
        //$test4 = $db->query($test3);
        //$test5 = $test4->fetch(PDO::FETCH_ASSOC);

        //var_dump($test5);
        //echo $email;
        //var_dump($test2);
        //echo $user_name;
        //exit;
        if($test2 != 0){
            $sql = "insert into user(user_name, fullname, email, password, role) value ('$user_name', '$fullname', '$email', '$password', 2)";

            $query = $db->query($sql);
        } else 

            echo "<script>alert('User name or email already exists !');window.history.go(-1);</script>";

        }   
    
    if(isset($_POST['user_name']))
            $user_name = $_POST['user_name'];
    if(isset($_POST['fullname']))
        $fullname = $_POST['fullname'];
    if(isset($_POST['email']))
        $email = $_POST['email'];
    if(isset($_POST['password']))
        $password = md5($_POST['password']);

    if(isset($_POST['signup']))
        addUser($user_name, $fullname, $email, $password);

?>