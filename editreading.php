<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "33587279Magic6666";
$dbname = "petroldb";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['update']))
{ 
    $reading_id = $_POST['reading_id'];
    $tank_id=$_POST['tank_id'];
    $initial_vol=$_POST['initial_vol'];
    $currentvol=$_POST['currentvol']; 
	$staff_id=$_POST['staff_id'];
    $date=$_POST['date'];
    $time=$_POST['time']; 
	
    //updating the table

$mysql = "UPDATE tank_readings SET tank_id='$tank_id',initial_vol='$initial_vol',currentvol='$currentvol',staff_id='$staff_id',date='$date',time='$time' WHERE reading_id=$reading_id";
$result = $conn->query($mysql);

if ($conn->query($mysql) === TRUE){
	echo "Applied Changes Successful :) Redirecting...";
	header('editreading.php?reading_id=$reading_id');
	header('refresh:0; url=index.php?page=readings');
}else {
	echo "Error." . $mysql . "<br>" .$conn->error;
}}
?>
<?php
//getting id from url
if(isset($_GET['reading_id']))
{
$reading_id= $_GET['reading_id'];
//selecting data associated with this particular id
$mysqli = "SELECT * FROM tank_readings WHERE reading_id='$reading_id'";
$result = mysqli_query($conn,$mysqli);
 
while($row = mysqli_fetch_array($result))
{
    $reading_id = $row['reading_id'];
	$tank_id = $row['tank_id'];
    $initial_vol= $row['initial_vol'];
    $currentvol = $row['currentvol'];
	$staff_id = $row['staff_id'];
    $date= $row['date'];
    $time = $row['time'];
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
<h2>tank readings</h2>
  <p><button onclick="window.location.href = 'index.php?page=readings';">Forms</button>
  <button onclick="window.location.href = 'index.php';">Home</button></p>

    <form name="form1" method="post" action="editreading.php">
        <table border="0">
            <tr> 
                <td>Reading ID</td>
                <td><input type="text" name="reading_id" value="<?php echo $reading_id;?>"></td>
            </tr>
			<tr> 
                <td>Tank ID</td>
                <td><input type="text" name="tank_id" value="<?php echo $tank_id;?>"></td>
            </tr>
            <tr> 
                <td>Initial Vol</td>
                <td><input type="text" name="initial_vol" value="<?php echo $initial_vol;?>"></td>
            </tr>
            <tr> 
                <td>Current Vol</td>
                <td><input type="text" name="currentvol" value="<?php echo $currentvol;?>"></td>
            </tr>
						<tr> 
                <td>Staff ID</td>
                <td><input type="text" name="staff_id" value="<?php echo $staff_id;?>"></td>
            </tr>
            <tr> 
                <td>Date</td>
                <td><input type="date" name="date" value="<?php echo $date;?>"></td>
            </tr>
            <tr> 
                <td>Time</td>
                <td><input type="time" name="time" value="<?php echo $time;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="reading_id" value=<?php echo $_GET['reading_id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>