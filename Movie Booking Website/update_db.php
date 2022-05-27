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
$previous_title=$_POST['sub'];



if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query ="UPDATE movie SET Title='".$mname."', Seats='".$seats."', Time='".$time."', Theater='".$theater."' where Title='".$previous_title."'";
$result=$mysqli -> query($query);


header("Location: mainLandingPage_admin.php");

?>

</body>
</html>
