<!DOCTYPE html>
<html>
<head>
<title>Fuel Table</title>
<style>
h2 {
  position: relative;
  left: 165px;
}
</style>
</head>
<body bgcolor="	#FAFAD2">
<div class="station" style="font-family:Brush Script Std; font-size:500%;">Fuel</div>
<h2>types table</h2>
    <button onclick="window.location.href = 'index.php?page=fuelform';">Station Forms</button>
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

$sql = "SELECT * FROM fuel_types";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table>";
	echo "<tr><th>ID<th>Fuel Type Name</th><th>Description</th><th>Update</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr><td>";
		echo $row['id'];
		echo "</td><td>";
		echo $row['fuel_type_name'];
		echo "</td><td>";
		echo $row['description'];
		echo "<td><a href=\"index.php?page=fueledit&id=$row[id]\">Edit</a> | <a href=\"deletefuel.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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
