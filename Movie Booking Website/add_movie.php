<!DOCTYPE html>
<html>
<head>
<title> UPDATE DB </title>
</head>
<body>
<?php
$username="root";
$password="";
$database="movie_ticket";
$mysqli=new mysqli("localhost",$username, $password, $database);

$mname=$_POST['mname'];
$seats=$_POST['seats'];
$time=$_POST['time'];
$theater=$_POST['theater'];

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query ="INSERT INTO movie values('".$mname."', '".$seats."','".$time."','".$theater."')";
$result=$mysqli -> query($query);


header("Location: mainLandingPage_admin.php");

?>

</body>
</html>
