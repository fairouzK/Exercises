<?php

$dbusername="root";
$dbpassword="";
$dbdatabase="movie_ticket";
$mysqli=new mysqli("localhost",$dbusername, $dbpassword, $dbdatabase);
$username=$_POST['username'];
$password=$_POST['password'];
	
		$query="INSERT INTO people VALUES ('".$username."','".$password."', 'customer')";
		

	if(mysqli_query($mysqli,$query))
	{
		echo "New user inserted sucessfully";
	}
	else
	{
		echo "error";
	}
	$mysqli->close();






?>

