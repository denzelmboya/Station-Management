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

$sql = "SELECT tank_id, tankname, fuel_type_id, description FROM station_tanks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
echo "<br> Fuel Tank_ID: ". $row["tank_id"]. " - Name: ". $row["tankname"]. "&nbsp;- Fuel Type_No: " . $row["fuel_type_id"] . "&nbsp;{Description} " . $row["description"] ."<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?> 
