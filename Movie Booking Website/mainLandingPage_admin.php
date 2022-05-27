<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
	
<style>
h1{
	font-size: 40px;
	color: rgb(6, 106, 117);
	font-family: 'FranchiseRegular','Arial Narrow',Arial,sans-serif;
	font-weight: bold;
	text-align:center;
	margin-top: 10px;
	margin-bottom: 1px;
}

table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0; 
}

th,
td {
  padding: 10px 15px;
}

th {
  background: #395870;
  color: #fff;
}
th {
  font-weight: bold;
}
tbody tr:nth-child(even) {
  background: #f0f0f2;
}
td {
  border-bottom: 1px solid #cecfd5;
  border-right: 1px solid #cecfd5;
}
td:first-child {
  border-left: 1px solid #cecfd5;
}
button {
	margin-left: 10px; 
}
.myButtonEdit {
    padding: 0 20px 0 20px;
    display:block;
    background-color: blueblack;
    text-align:center;  
}
.myButtonDel {
    padding: 0 20px 0 20px;
    display:block; 
    background-color: Red;
    text-align:center;  
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
	<ul class="navbar-nav ml-auto">
		<li class="nav-item">
			<a class="nav-link"  href="movieCreationPage.html">Create new Movie</a>
		</li>
	</ul>
</div>
</nav>
</head> 

<body style= "background-color: Lavender;">
	<h1> List of Movies </h1>
	<br></br>

<?php
    $username="root";
    $password="";
    $database="movie_ticket";
    $mysqli=new mysqli("localhost", $username, $password, $database);
    $query="select * from movie";
    $result= $mysqli->query($query);
?>
    <table id="movies_table">
	
	<tr >
	<th> Number</th>
	<th> MOVIE NAME </th>
	<th> SEATS  </th>
	<th> SCREENING TIME </th> 
	<th> THEATRE </th>
	<th> EDIT</th>
	<th> DELETE </th>
	</tr>
	
<?php	
$counter=1;
    while ( $row=$result->fetch_assoc())
    {
        
        $title = $row['Title']; 
        $seats = $row['Number of seats'];
        $time  = $row['Display times']; 
        $theater = $row['Theater'];
        
        echo "<tr>";
        echo "<td>".$counter."</td><td>".$title."</td><td>".$seats."</td>
                  <td>".$time."</td><td>".$theater."</td>"?>
		<td>
		<form method="post" action="movieEditingPage.php">
        <?php 
		echo '<button class="myButtonEdit" type="submit" name="edit" value="'.$row['Title'].'" >Edit</button>';
		?>
		</form>
		</td>
		<td>
		<form method="post" action="deleteMovie.php">
        <?php 
		echo '<button class="myButtonDel" type="submit" name="id" value="'.$row['Title'].'" >Delete</button>';
		//localStorage.setItem('key', 'value');
		?>
        </form></td>
				
	  <?php 
        echo "</tr>";
		$counter++;
	}
?>
		


</body>
</html>