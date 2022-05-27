<!DOCTYPE HTML>
<html>
<head>
<title> Movies Booking Page</title>
<style>

table {
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
</style>
 
</head> 

<body style= "background-color: Lavender;">
<h1 style="text-align: center;" > List of Movies </h1>
<br></br>
<?php
    $username="root";
    $password="";
    $database="movie_ticket";
    $mysqli=new mysqli("localhost", $username, $password, $database);
    $query="select * from movie";
    $result= $mysqli->query($query);
?>
    <table>
 
<tr >
<th >  </th>
<th scope="col"> MOVIE NAME </th>
<th scope="col"> AVAILABLE SEATS </th>
<th scope="col"> SCREENING TIME </th> 
<th scope="col"> THEATRE </th>
<th scope="col"> Seats </th>
<th>  </th>
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
                  <td>".$time."</td><td>".$theater."</td>";
			
		echo "<td>";	
		echo 'seats:<input type="number"  id="myNumber"  name="number"  min="0">';
		$query="select * from movie where Number of seats>='".$_POST['number']."'";
		$result=$mysqli -> query($query);
		if (mysqli_num_rows($result)==0) 
			{ 
				echo "Error: exceed number of available seats"; //look into how to display this message
				header("Location: mainLandingPage_customer.php");
			}
			else
			{
				$query="UPDATE movie SET Number of seats= Number of seats -'".$_POST['number']."' where Number of seats >0";
			}
		  
		echo "</td>";
		
		?>
		<form method="post" action="confirmbooking.php">
        <?php 
		echo"<td>";
		echo '<button class="myButtonBook" type="submit" name="book" value="'.$row['Title'].'" >Book</button>';
			}
		//localStorage.setItem('key', 'value');
		?>
		
        </form>
		</td>
				
	  <?php 
        echo "</tr>";
		$counter++;
	
?>

</body>
</html>

