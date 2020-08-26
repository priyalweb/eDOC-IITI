<?php

	$host = "localhost";
    $DBUser = "priyal";
    $DBPassword = 'badminton';  
    $db = "edoc";

	$conn = mysqli_connect($host,$DBUser, $DBPassword, $db);

	if(!$conn)
	{
		echo "this wrong ".mysqli_error($conn);
	}

?>
