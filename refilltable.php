<!DOCTYPE html>
<html>
<head>
<title>Refill Table</title>
</head>
<body bgcolor="	#FAFAD2">
<div class="station" style="font-family:Brush Script Std; font-size:500%;">Station</div>
<h2>Refill Details</h2>
    <button onclick="window.location.href = 'index.php?page=refillform';">Station Forms</button>
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

$sql = "SELECT * FROM refill_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<table>";
	echo "<tr><th>Refill ID<th>Tank ID</th><th>Fuel Balance</th><th>Refill Amount</th><th>Supplier</th><th>Depot Location<th>Supplier Contact</th><th>Ship Method</th><th>Date</th><th>Time</th><th>Update</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo "<tr><td>";
		echo $row['refill_id'];
		echo "</td><td>";
		echo $row['tank_id'];
		echo "</td><td>";
		echo $row['fuel_balance'];
		echo "</td><td>";
		echo $row['refill_amount'];
		echo "</td><td>";
	    echo $row['supplier'];
		echo "</td><td>";
		echo $row['depot_location'];
		echo "</td><td>";
		echo $row['supplier_contact'];
		echo "</td><td>";
		echo $row['ship_method'];
		echo "</td><td>";
		echo $row['date'];
		echo "</td><td>";
		echo $row['time'];
		echo "<td><a href=\"index.php?page=editrefill&refill_id=$row[refill_id]\">Edit</a> | <a href=\"deleterefill.php?refill_id=$row[refill_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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
