<?php
$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="";

$position = $_POST ['position'];
$fname = $_POST ['fname'];
$lname = $_POST ['lname'];
$nationalid = $_POST ['nationalid'];
$phone= $_POST ['phone'];
$address = $_POST ['address'];
$email = $_POST ['email'];
$password = $_POST ['password'];
$pswrepeat = $_POST ['pswrepeat'];

$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);

if ($conn->connect_error){
	die("connection failed" . $conn->connect_error);
}

$sql = "INSERT INTO station_staff (position,fname,lname,nationalid,phone,address,email,password,pswrepeat) VALUES ('$position','$fname','$lname','$nationalid','$phone','$address','$email','$password','$pswrepeat')";

if ($conn->query($sql) === TRUE){
	echo "SUCCESS! Your request has been received. Access online services remotely :) Redirecting...";
	header('refresh:1; url=index.php?page=login');
}else {
	echo "Error." . $sql . "<br>" .$conn->error;
}
$conn->close();
?>

