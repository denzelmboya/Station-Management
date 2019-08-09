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
if(isset($_POST['update']))
{ 
    $id=$_POST['id'];
	$staff_id=$_POST['staff_id'];
    $pump_id=$_POST['pump_id'];
    $date=$_POST['date']; 
	$time=$_POST['time']; 
	
    //updating the table
$mysql = "UPDATE pump_attendants SET staff_id='$staff_id',pump_id='$pump_id',date='$date',time='$time' WHERE id=$id";
$result = $conn->query($mysql);

if ($conn->query($mysql) === TRUE){
	echo "Applied Changes Successful :) Redirecting...";
	header('editattendants.php?id=$id');
	header('refresh:0; url=index.php?page=attendants');
}else {
	echo "Error." . $mysql . "<br>" .$conn->error;
}}
?>
<?php
//getting id from url
if(isset($_GET['id']))
{
$id = $_GET['id'];
//selecting data associated with this particular id
$mysqli = "SELECT * FROM pump_attendants WHERE id='$id'";
$result = mysqli_query($conn,$mysqli);
 
while($row = mysqli_fetch_array($result))
{
    $staff_id=$row['staff_id'];
    $pump_id=$row['pump_id'];
    $date=$row['date']; 
	$time=$row['time']; 
}
}
error_reporting(E_ALL ^ E_NOTICE);
?>
<html>
<head>    
<title>Edit Data</title>
</head>
<body bgcolor="	#FAFAD2">
<div class="station" style="font-family:Brush Script Std; font-size:500%;">Update</div>
<h2>attendnants table</h2>
  <p><button onclick="window.location.href = 'index.php?page=attendants';">Station Forms</button>
  <button onclick="window.location.href = 'index.php';">Home</button></p>

    
    <form name="form1" method="post" action="editattendants.php">
        <table border="0">
			<tr> 
                <td>Staff ID</td>
                <td><input type="text" name="staff_id" value="<?php echo $staff_id;?>"></td>
            </tr>
            <tr> 
                <td>Pump ID</td>
                <td><input type="text" name="pump_id" value="<?php echo $pump_id;?>"></td>
            </tr>
            <tr> 
                <td>Date</td>
                <td><input type="text" name="date" value="<?php echo $date;?>"></td>
            </tr>
			            <tr> 
                <td>Time</td>
                <td><input type="text" name="time" value="<?php echo $time;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
