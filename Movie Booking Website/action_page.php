<!DOCTYPE html>
<html>
<head>
<title> Login </title>
</head>
<body>
<?php
$username="root";
$password="";
$database="movie_ticket";
$mysqli=new mysqli("localhost",$username, $password, $database);
$usname=$_POST['uname'];
$psword=$_POST['psw'];
$query ="select * from people where username='".$usname."' AND password='".$psword."'";
$result=$mysqli -> query($query);


if (mysqli_num_rows($result)==0) 
{ 
	echo "Error: Wrong username and/or passowrd"; //look into how to display this message
	header("Location: LoginPage.html");
}
else 
{
	$final =   mysqli_fetch_array ($result);
	
	if(isset($_POST['admin']) && $final['State']=="admin") 
	{		
		header ("Location: mainLandingPage_admin.php");
		//echo "Hello Admin"; 		
	}	
	else if(isset($_POST['customer'])) 
	{
		header ("Location: mainLandingPage_customer.php");
		//echo "Hello customer"; 	
	}	
	else
	{
		header("Location: LoginPage.html");
	}	
}
//echo "</table>";

$mysqli->close();
?>
</body>
</html>				  
