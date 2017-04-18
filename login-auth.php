
<?php
    include("connect.php");
    if(!isset($_POST["user"])){ 
        echo "<script>alert('Enter username');window.history.go(-1);</script>";
        //header("location:login.php");
    }
    else 
    {
        $user=$_POST["user"];
        if (!isset($_POST["pass"])) {
            echo "<script>alert('Enter your password');window.history.go(-1);</script>";
            //header("location:login.php");                 
        }
        else
        {
            $pass=md5($_POST["pass"]);          
            $sql="select * from user where user_name='$user' and password='$pass'";
            $kq=$db->query($sql);
            $thanhvien=$kq->fetch(PDO::FETCH_ASSOC);
            $role=$thanhvien["role"];
            $sql1 = "select count(*) from user where user_name = '{$user}'";
            $kq1 = $db->query($sql1);
            $n = $kq1->fetch(PDO::FETCH_COLUMN);
            
            if($n==0)
            {
                echo "<script>alert('You have not sign up yet!');window.history.go(-1);</script>";
                //header("location: login.php");
            }   
            else 
            {   
                if($role==1 || $role == 2){
                    if(!isset($_SESSION))
                    session_start();
                    $_SESSION["user"]=$user;
                    $_SESSION["success"]=true;
                    $_SESSION['name']=$thanhvien['fullname'];    
                    $_SESSION["role"]=$thanhvien["role"];
                    header("location:index.php");
                } else if($role != 1 || $role != 2)
                    echo "<script>alert('Sorry, This account has been baned!');window.location='index.php?function=signin'</script>";
                }
                //else echo"<script>alert('You have not sign up yet!');window.location='index.php?function=signin'</script>";
            }
        }
    
?>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />