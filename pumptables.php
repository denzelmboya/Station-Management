<!DOCTYPE html>
<html>
<head>
<title>Pump Table</title>
</head>
<body bgcolor="#FAFAD2">
<div class="station" style="font-family:Brush Script Std; font-size:500%;">Station</div>
<h2>Pumps Table</h2>
    <button onclick="window.location.href = 'index.php?page=forms';">Station Forms</button>
  <button onclick="window.location.href = 'index.php';">Home</button>
<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "petroldb";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	
$sql = "SELECT * FROM station_pumps";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table>";
	echo "<tr><th>Pump ID<th>Pump Name</th><th>Tank ID</th><th>Description</th><th>Update</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr><td>";
		echo $row['pump_id'];
		echo "</td><td>";
		echo $row['pumpname'];
		echo "</td><td>";
		echo $row['tank_id'];
		echo "</td><td>";
		echo $row['description'];
		echo "<td><a href=\"index.php?page=edit&pump_id=$row[pump_id]\">Edit</a> | <a href=\"delete.php?pump_id=$row[pump_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        echo "</tr></tr>";
      
	}
	echo "</table>";
	
    } else {
    echo "0 results";
}
$conn->close();
?>
</body>
</html>
