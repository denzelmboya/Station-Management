<?php
$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="";

$tankname = $_POST ['tankname'];
$fuel_type_id = $_POST ['fuel_type_id'];
$description = $_POST ['description'];

$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);

if ($conn->connect_error){
	die("connection failed" . $conn->connect_error);
}

$sql = "INSERT INTO station_tanks(tankname,fuel_type_id,description) VALUES ('$tankname','$fuel_type_id','$description')";

if ($conn->query($sql) === TRUE){
	echo "Thank you! Your data input has been successful :) Redirecting...";
	header('refresh:1; url=index.php?page=tanks');
}else {
	echo "Error." . $sql . "<br>" .$conn->error;
}
$conn->close();
?>
