<?php
$servername="localhost";
$dbusername="root";
$dbpassword="33587279Magic6666";
$dbname="petroldb";

$fuel_type_name = $_POST ['fuel_type_name'];
$description = $_POST ['description'];

$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);

if ($conn->connect_error){
	die("connection failed" . $conn->connect_error);
}

$sql = "INSERT INTO fuel_types(fuel_type_name,description) VALUES ('$fuel_type_name','$description')";

if ($conn->query($sql) === TRUE){
	echo "Thank you! Your data input has been successful :) Redirecting... ";
	header('refresh:1; url=index.php?page=fuel');
}else {
	echo "Error." . $sql . "<br>" .$conn->error;
}
$conn->close();
?>