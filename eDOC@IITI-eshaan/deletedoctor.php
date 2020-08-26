<?php

$link=mysqli_connect("127.0.0.1","yourName","password");
        $db=mysqli_select_db($link,"edoc");
        $doctorid=$_GET['did'];
        $que= "DELETE FROM doctors WHERE doctor_id='$doctorid'";
        $qe=mysqli_query($link,$que);
        if($qe)
        {
            header("Location: viewdoctors.php");

        }
?>