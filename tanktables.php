<!DOCTYPE html>
<html>
<head>
<title>Tank Table</title>
</head>
<body bgcolor="	#FAFAD2">
<div class="station" style="font-family:Brush Script Std; font-size:500%;">Station</div>
<h2>Tanks Table</h2>
    <button onclick="window.location.href = 'index.php?page=formtank';">Station Forms</button>
  <button class="home" onclick="window.location.href = 'index.php';">Home</button>
<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "33587279Magic6666";
$dbname = "petroldb";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM station_tanks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
	echo "<tr><th>Tank ID<th>Tank Name</th><th>Fuel Type ID</th><th>Description</th><th>Update</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr><td>";
		echo $row['tank_id'];
		echo "</td><td>";
		echo $row['tankname'];
		echo "</td><td>";
		echo $row['fuel_type_id'];
		echo "</td><td>";
		echo $row['description'];
		echo "<td><a href=\"index.php?page=edittable&tank_id=$row[tank_id]\">Edit</a> | <a href=\"deletetable.php?tank_id=$row[tank_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        echo "</tr></tr>";
    }
    echo "</table>";
    
} else { "0 results";
}

$conn->close();
?>
</body>
</html>