<!DOCTYPE html>
<html>
<head>
<title>Attendants</title>
<style>
h2 {
  position: relative;
  left: 196px;
}
</style>
</head>
<body bgcolor="	#FAFAD2">
<div class="station" style="font-family:Brush Script Std; font-size:500%;">Staff</div>
<h2>attendants table</h2>
    <button onclick="window.location.href = 'index.php?page=attendantsform';">Station Forms</button>
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

$sql = "SELECT * FROM pump_attendants";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table>";
	echo "<tr><th>ID<th>Staff ID</th><th>Pump ID</th><th>Date</th><th>Time</th><th>Update</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr><td>";
		echo $row['id'];
		echo "</td><td>";
		echo $row['staff_id'];
		echo "</td><td>";
		echo $row['pump_id'];
		echo "</td><td>";
		echo $row['date'];
		echo "</td><td>";
		echo $row['time'];
		echo "<td><a href=\"index.php?page=editattendants&id=$row[id]\">Edit</a> | <a href=\"deleteattendants.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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
