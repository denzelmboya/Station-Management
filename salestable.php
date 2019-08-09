<!DOCTYPE html>
<html>
<head>
<title>Sales Table</title>
</head>
<body bgcolor="	#FAFAD2">
<div class="station" style="font-family:Brush Script Std; font-size:500%;">Station</div>
<h2>Sales Table</h2>
    <button onclick="window.location.href = 'index.php?page=formsales';">Station Forms</button>
  <button onclick="window.location.href = 'index.php';">Home</button>
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

$sql = "SELECT * FROM station_sales";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
		echo "<table>";
	echo "<tr><th>Sale ID<th>Volume</th><th>Pump ID</th><th>Staff ID</th><th>Cash Sale</th><th>Date</th><th>Time</th><th>Update</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr><td>";
		echo $row['sale_id'];
		echo "</td><td>";
		echo $row['volume'];
		echo "</td><td>";
		echo $row['pump_id'];
		echo "</td><td>";
		echo $row['staff_id'];
		echo "</td><td>";
		echo $row['cashsale'];
		echo "</td><td>";
		echo $row['date'];
		echo "</td><td>";
		echo $row['time'];
		echo "<td><a href=\"index.php?page=salestable&sale_id=$row[sale_id]\">Edit</a> | <a href=\"deletesales.php?sale_id=$row[sale_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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