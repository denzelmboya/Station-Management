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
 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$mysql = "DELETE FROM fuel_types WHERE id=$id";
$result = $conn->query($mysql);
 
//redirecting to the display page
if ($conn->query($mysql) === TRUE){
	echo "Applied Changes Successful :) Redirecting...";
	header('refresh:1; url=index.php?page=fuel');
}else {
	echo "Error." . $mysql . "<br>" .$conn->error;
}
$conn->close();
?>
