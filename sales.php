<?php
$servername="localhost";
$dbusername="root";
$dbpassword="33587279Magic6666";
$dbname="petroldb";


$volume = $_POST ['volume'];
$pump_id = $_POST ['pump_id'];
$staff_id = $_POST ['staff_id'];
$cashsale = $_POST ['cashsale'];
$date = $_POST ['date'];
$time = $_POST ['time'];

$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);

if ($conn->connect_error){
	die("connection failed" . $conn->connect_error);
}

$sql = "INSERT INTO station_sales(volume,pump_id,staff_id,cashsale,date,time) VALUES ('$volume','$pump_id','$staff_id','$cashsale','$date','$time')";

if ($conn->query($sql) === TRUE){
	echo "Thank you! Your data input has been successful :) Redirecting...";
	header('refresh:1; url=index.php?page=sales');
}else {
	echo "Error." . $sql . "<br>" .$conn->error;
}
$conn->close();
?>