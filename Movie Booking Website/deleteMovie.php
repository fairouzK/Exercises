<!DOCTYPE html>
<html>
</body>
<?php
    $username="root";
    $password="";
    $database="movie_ticket";
    $mysqli=new mysqli("localhost", $username, $password, $database);
    
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$title=$_POST['id'];
$sql = "DELETE FROM movie WHERE Title='".$title."'";
 
if ($mysqli->query($sql) === TRUE) {
    echo "Record deleted successfully";
} 
else {
    echo "Error deleting record: " . $mysqli->error;
}
   


	
	
		//$idd=$_POST['id'];
		//echo "Hello Admin";
		//echo $idd;
		//$query1="delete * from movie where movie_id='".$idd."'";
        //$result= $mysqli->query($query);	
		header("Location: mainLandingPage_admin.php");
		 



$mysqli->close();
?>
</body>
</html>				  
