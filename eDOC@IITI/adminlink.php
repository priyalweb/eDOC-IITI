<?php

$error='';
session_start();

if(isset($_POST['submit'])){
    if(empty($_POST['exampleInputEmail1'])||empty($_POST['exampleInputPassword1'])){
        $error="Email or Password is invalid";
    }
    else{
        $email=$_POST['exampleInputEmail1'];
        $password=$_POST['exampleInputPassword1'];
        $link=mysqli_connect("127.0.0.1","priyal","badminton");
        $db=mysqli_select_db($link,"edoc");
        $query=mysqli_query($link,"SELECT * FROM admins WHERE a_password='$password' AND a_email='$email'");
        $row = $query->fetch_row();
        $value = $row[1] ?? false;
        $aid=$row[0] ?? false;
        $rows=mysqli_num_rows($query);
        if($rows == 1){
            $_SESSION['a_name']=$value;
            $_SESSION['admin_id']=$aid;
            header("Location: admindashboard.php");
        }
        else{
            $error="Email or Password is invalid";
        }
        mysqli_close($link);
    }
}

?>
