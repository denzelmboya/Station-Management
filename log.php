<?php
session_start();
$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="";

$conn = new mysqli($servername,$dbusername,$dbpassword,$dbname);
	
	$fname=$_POST ['fname'];
	$password=$_POST ['password'];
	
	$reg = "INSERT into login_user (fname,password) VALUES ('$fname','$password')";

	$s = "SELECT * FROM station_staff where fname='$fname' && password ='$password'";
	
	$result=mysqli_query($conn,$s);
	
	$num = mysqli_num_rows($result);
	
	if ($num==1){
		$_SESSION['fname']=$fname;
		$_SESSION["loggedin"] = true;
		$expire = time()+60+10;
	
		echo "Wonderful! ... Login Successful :) Welcome " .$_SESSION['fname'];
		header('refresh:1; url=index.php');
		}else{
		echo "Login Failed :( Wrong Username/Password combination. Not a member yet? Sign up to gain access. Redirecting... ";
			header('refresh:1; url=index.php?page=signup');
		}	
?>
