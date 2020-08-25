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
        $hs=$_POST['hs'];
        $mm=$_POST['mh'];
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
                if($gender=="Male")
                {
                    $gender=0;
                }
                else
                {
                    $gender=1;
                }
                $queforcidh=mysqli_query($link,"SELECT * FROM hostel WHERE  ='$hs'");
                $row2h = $queforcid->fetch_row();
                $cidh = $row2h[0] ?? false;
                $sql1 = "INSERT INTO p_profile (patient_id, bg_id, hostel_id, first_name, last_name, email, roll_number, contact, gender, room_number, med_history) VALUES ('$did', '$cid', '$cidh', '$firstname', '$lastname', '$email', '$rollnum', '$cn', '$gender', '$roomnum', '$mm')";    
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
