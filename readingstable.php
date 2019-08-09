<!DOCTYPE html>
<html>
<head>
<title>Readings</title>
<style>
</style>
</head>
<body bgcolor="	#FAFAD2">
<div class="station" style="font-family:Brush Script Std; font-size:500%;">Station</div>
<h2>Tank Readings</h2>
    <button onclick="window.location.href = 'index.php?page=readingsform';">Station Forms</button>
  <button onclick="window.location.href = 'index.php';">Home</button>
<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM tank_readings";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table>";
	echo "<tr><th>Reading ID<th>Tank ID</th><th>Initial Vol</th><th>Current Vol</th><th>Staff ID<th>Date</th><th>Time</th><th>Update</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr><td>";
		echo $row['reading_id'];
		echo "</td><td>";
		echo $row['tank_id'];
		echo "</td><td>";
		echo $row['initial_vol'];
		echo "</td><td>";
		echo $row['currentvol'];
		echo "</td><td>";
		echo $row['staff_id'];
		echo "</td><td>";
		echo $row['date'];
		echo "</td><td>";
		echo $row['time'];
		echo "<td><a href=\"index.php?page=editreading&reading_id=$row[reading_id]\">Edit</a> | <a href=\"deletereading.php?reading_id=$row[reading_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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
