<?php
$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="";

$tank_id = $_POST ['tank_id'];
$initial_vol = $_POST ['initial_vol'];
$currentvol = $_POST ['currentvol'];
$staff_id = $_POST ['staff_id'];
$date = $_POST ['date'];
$time = $_POST ['time'];

$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);

if ($conn->connect_error){
	die("connection failed" . $conn->connect_error);
}

$sql = "INSERT INTO tank_readings(tank_id,initial_vol,currentvol,staff_id,date,time) VALUES ('$tank_id','$initial_vol','$currentvol','$staff_id','$date','$time')";

if ($conn->query($sql) === TRUE){
	echo "Thank you! Your data input has been successful :) Redirecting...";
	header('refresh:1; url=index.php?page=readings');
}else {
	echo "Error." . $sql . "<br>" .$conn->error;
}
$conn->close();
?>
