<?php

$error='';
session_start();
if(isset($_POST['submit'])){
    if(empty($_POST['d_email'])||empty($_POST['d_password'])||empty($_POST['FN'])||empty($_POST['LN'])||empty($_POST['CN'])||empty($_POST['img'])||empty($_POST['Category'])||empty($_POST['Gender'])||empty($_POST['Description'])){
        $error="Please Enter All The Details";
    }
    else{
        $email=$_POST['d_email'];
        $password=$_POST['d_password'];
        $firstname=$_POST['FN'];
        $lastname=$_POST['LN'];
        $image=$_POST['img'];
        $category=$_POST['Category'];
        $gender=$_POST['Gender'];
        $cn=$_POST['CN'];
        $description=$_POST['Description'];
        $link=mysqli_connect("127.0.0.1","yourName","password");
        $db=mysqli_select_db($link,"edoc");
        $adminid=$_SESSION['admin_id'];
            $queforchem=mysqli_query($link,"SELECT * FROM doctors WHERE  d_email='$email'");
            $rows9=mysqli_num_rows($queforchem);
            if(!$rows9){
            $sql = "INSERT INTO doctors (admin_id, d_name, d_email, d_password) VALUES ('$adminid', '$firstname', '$email', '$password')";
            if(mysqli_query($link, $sql)){

                $error = '<div class="alert alertsuccess">
                Data added successfully to the database
                table</div>';
                
                }else{
                $error = '<div class="alert alertwarning">
                ERROR: Unable to excecute: ' .$sql. '. ' .
                mysqli_error($link). '</div>';
                }
                $quefordid=mysqli_query($link,"SELECT * FROM doctors WHERE  d_email='$email'");
                $row1 = $quefordid->fetch_row();
                $did = $row1[0] ?? false;
                if($gender=="Male")
                {
                    $gender=0;
                }
                else
                {
                    $gender=1;
                }
                $queforcid=mysqli_query($link,"SELECT * FROM category WHERE  name_='$category'");
                $row2 = $queforcid->fetch_row();
                $cid = $row2[0] ?? false;
                $sql1 = "INSERT INTO d_profile (doctor_id, category_id, first_name, last_name, email, contact, image_, gender, description_ ) VALUES ('$did', '$cid', '$firstname', '$lastname', '$email', '$cn', '$image', '$gender', '$description')";    
                if(mysqli_query($link, $sql1)){

                    $error = '<div class="alert alertsuccess">
                    Data added successfully to the database
                    table</div>';
                    
                    }else{
                    $error = '<div class="alert alertwarning">
                    ERROR: Unable to excecute: ' .$sql. '. ' .
                    mysqli_error($link). '</div>';
                    }
                   
            }
            else{
                $error="This Email id is already in use, Try using some other one"; 
            }
 
    }
}

?>
