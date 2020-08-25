<?php 

	$host = "localhost";  
    $DBUser = "yourName";  
    $DBPassword = 'password';  
    $db = "edoc";
	
	$conn = mysqli_connect($host,$DBUser, $DBPassword, $db);
	
	if(!$conn)
	{
		echo "this wrong ".mysqli_error($conn);
	}
	
?>