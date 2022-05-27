<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
	
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 1px solid #f2f2f2;}
label { float: left; width: 200px; }
.container {
  padding: 1px;
  width: 700px;
}
h1{
	font-size: 48px;
	color: rgb(6, 106, 117);
	padding: 2px 0 10px 0;
	font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif;
	font-weight: bold;
	text-align: center;
	padding-bottom: 30px;
}
input[type=text] {
  width: 70%;
  padding: 10px 20px;
  margin:4px;
  border: 1px solid rgb(178, 178, 178);
  border-radius: 3px;
  float: left;
  box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
}
button {
  background-color: rgb(61, 157, 179);
  color: #fff;
  padding: 10px 20px;
  border: 1px solid rgb(28, 108, 122);
  cursor: pointer;
  width: 30%;
  font-family: 'BebasNeueRegular','Arial Narrow',Arial,sans-serif;
  font-size: 20px;
  margin-top: 20px;
  margin-left: 250px;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.5);
}
button:hover {
  opacity: 0.8;
}
</style>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	<button class="navbar-toggler navbar-dark" type="button" datatoggle="collapse" data-target="#main-navigation">
		<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="main-navigation">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="#">Home</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#">Logout</a>
		</li>
	</ul>
</div>
</nav>
</head>

<body style= "background-color: Lavender;">
<h1>Edit Movie</h1>
<?php
$username="root";
$password="";
$database="movie_ticket";
$mysqli=new mysqli("localhost",$username, $password, $database);
$title=$_POST['edit'];

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query ="select * from movie where Title='".$title."'";
$result=$mysqli -> query($query);

while ( $row=$result->fetch_assoc())
    {
        
        $title = $row['Title']; 
        $seats = $row['Number of seats'];
        $time  = $row['Display times']; 
        $theater = $row['Theater'];
	}	

?>


<div class="container" style="margin: 0 auto">
  <form method="post" action="update_db.php">
    <label for="mname"><b>Movie Name:</b>
	</label> 
	<?php
    echo'<input type="text" value="'.$title.'" name="mname" required="required">';
	?>
	<br><br>
    <label for="seats"><b>Number of Seats:</b></label>
	<?php
    echo '<input type="text" value="'.$seats.'" name="seats" required="required" >';
	?>
    <br><br> 
	<label for="time"><b>Screening Time:</b></label>
	<?php
    echo '<input type="text" value="'.$time.'" name="time" required="required" >';
	?>
    <br><br> 
	<label for="theater"><b>Theater:</b></label>
	<?php
    echo '<input type="text" value="'.$theater.'" name="theater" required="required" >';
	
    echo '<br><br>';

	echo '<button type="submit" name="sub" value="'.$title.'" >Submit</button>';
    echo '<button type="submit" name="cancel" value="cancel" onclick="mainLandingPage_admin.php" >Cancel</button>';
	?>
	</form>
	
	<br><br>
	
</div>


</body>
</html>