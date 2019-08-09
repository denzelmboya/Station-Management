<?php
$servername="localhost";
$dbusername="root";
$dbpassword="33587279Magic6666";
$dbname="petroldb";

$tank_id = $_POST ['tank_id'];
$fuel_balance = $_POST ['fuel_balance'];
$refill_amount = $_POST ['refill_amount'];
$supplier = $_POST ['supplier'];
$depot_location = $_POST ['depot_location'];
$supplier_contact = $_POST ['supplier_contact'];
$ship_method = $_POST ['ship_method'];
$date = $_POST ['date'];
$time = $_POST ['time'];

$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);

if ($conn->connect_error){
	die("connection failed" . $conn->connect_error);
}

$sql = "INSERT INTO refill_details(tank_id,fuel_balance,refill_amount,supplier,depot_location,supplier_contact,ship_method,date,time) VALUES ('$tank_id','$fuel_balance','$refill_amount','$supplier','$depot_location','$supplier_contact','$ship_method','$date','$time')";

if ($conn->query($sql) === TRUE){
	echo "Thank you! Your data input has been successful :) Redirecting...";
	header('refresh:1; url=index.php?page=refill');
}else {
	echo "Error." . $sql . "<br>" .$conn->error;
}
$conn->close();
?>