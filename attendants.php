<?php
$servername="localhost";
$dbusername="root";
$dbpassword="33587279Magic6666";
$dbname="petroldb";

$staff_id = $_POST ['staff_id'];
$pump_id = $_POST ['pump_id'];
$date = $_POST ['date'];
$time = $_POST ['time'];

$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);

if ($conn->connect_error){
	die("connection failed" . $conn->connect_error);
}

$sql = "INSERT INTO pump_attendants(staff_id,pump_id,date,time) VALUES ('$staff_id','$pump_id','$date','$time')";

if ($conn->query($sql) === TRUE){
	echo "Thank you! Your data input has been successful :) Redirecting...";
	header('refresh:1; url=index.php?page=attendants');
}else {
	echo "Error." . $sql . "<br>" .$conn->error;
}
$conn->close();
?>