<?php

$error='';
session_start();

if(isset($_POST['submit'])){
    if(empty($_POST['p_email'])||empty($_POST['p_password'])||empty($_POST['FN'])||empty($_POST['LN'])||empty($_POST['roomnum'])||empty($_POST['rollnum'])||empty($_POST['bg'])||empty($_POST['Gender'])||empty($_POST['CN'])){
        $error="Please Enter All The Details";
    }
    else{
        $email=$_POST['p_email'];
        $password=$_POST['p_password'];
        $firstname=$_POST['FN'];
        $lastname=$_POST['LN'];
        $roomnum=$_POST['roomnum'];
        $rollnum=$_POST['rollnum'];
        $gender=$_POST['Gender'];
        $cn=$_POST['CN'];
        $bg=$_POST['bg'];
        $link=mysqli_connect("127.0.0.1","yourName","password");
        $db=mysqli_select_db($link,"edoc");
        $adminid=$_SESSION['admin_id'];;
        
        
            $queforchem=mysqli_query($link,"SELECT * FROM patients WHERE  p_email='$email'");
            $rows9=mysqli_num_rows($queforchem);
            if(!$rows9){
            $sql = "INSERT INTO patients (admin_id, p_name, p_email, p_password) VALUES ('$adminid', '$firstname', '$email', '$password')";
            if(mysqli_query($link, $sql)){

                $error = '<div class="alert alertsuccess">
                Data added successfully to the database
                table</div>';
                
                }else{
                $error = '<div class="alert alertwarning">
                ERROR: Unable to excecute: ' .$sql. '. ' .
                mysqli_error($link). '</div>';
                }
                $quefordid=mysqli_query($link,"SELECT * FROM patients WHERE  p_email='$email'");
                $row1 = $quefordid->fetch_row();
                $did = $row1[0] ?? false;
                $queforcid=mysqli_query($link,"SELECT * FROM bloodgroup WHERE  bloodgroup='$bg'");
                $row2 = $queforcid->fetch_row();
                $cid = $row2[0] ?? false;
                $sql1 = "INSERT INTO p_profile (patient_id, first_name, last_name, bg_id, email, roll_number, contact_number, gender, room_number ) VALUES ('$did', '$firstname', '$lastname', '$cid', '$email', '$rollnum', '$cn', '$gender', '$roomnum')";    
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
