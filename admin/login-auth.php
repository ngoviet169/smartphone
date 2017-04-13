<?php include "funct-login.php"; ?>
<?php
    include("connect.php");
    if(!isset($_POST["user"])){ 
        echo "<script>alert('Enter username');window.history.go(-1);</script>";
        //header("location:login.php");
    }
    else 
    {
        $user=EncodeSpecialChar($_POST["user"]);
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
            $sql1 = "select count(*) from user";
            $kq1 = $db->query($sql1);
            $n = $kq1->fetch(PDO::FETCH_COLUMN);
            
            if($n==0)
            {
                echo "<script>alert('Username of Password are not match!');window.history.go(-1);</script>";
                //header("location: login.php");
            }   
            else 
            {   
                if($role==1){
                    if(!isset($_SESSION))
                    session_start();
                    $_SESSION["useradmin"]=$user;
                    $_SESSION["success"]=true;
                    $_SESSION['hotenadmin']=$thanhvien['fullname'];    
                    $_SESSION["role"]=$thanhvien["role"];
                    header("location:index.php");
                }
                else echo"<script>alert('Sorry, You cannot login to admin area!');window.location='login.php'</script>";
            }
        }
    }
?>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />