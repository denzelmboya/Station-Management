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
    $pump_id = $_POST['pump_id'];
    $pumpname=$_POST['pumpname'];
    $tank_id=$_POST['tank_id'];
    $description=$_POST['description']; 
	
    //updating the table

$mysql = "UPDATE station_pumps SET pump_id='$pump_id',pumpname='$pumpname',tank_id='$tank_id',description='$description' WHERE pump_id=$pump_id";
$result = $conn->query($mysql);

if ($conn->query($mysql) === TRUE){
	echo "Applied Changes Successful :) Redirecting...";
	header('edit.php?pump_id=$pump_id');
	header('refresh:0; url=index.php?page=pumps');
}else {
	echo "Error." . $mysql . "<br>" .$conn->error;
}
}
?>
<?php
//getting id from url
if(isset($_GET['pump_id']))
{
$pump_id = $_GET['pump_id'];
//selecting data associated with this particular id
$mysqli = "SELECT * FROM station_pumps WHERE pump_id='$pump_id'";
$result = mysqli_query($conn,$mysqli);
 
while($row = mysqli_fetch_array($result))
{
    $pump_id = $row['pump_id'];
	$pumpname = $row['pumpname'];
    $tank_id= $row['tank_id'];
    $description = $row['description'];
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
<h2>Pumps Table</h2>
  <button onclick="window.location.href = 'index.php?page=forms';">Station Forms</button>
  <button onclick="window.location.href = 'index.php';">Home</button>
<div class="container">
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Pump ID</td>
                <td><input type="text" name="pump_id" value="<?php echo $pump_id;?>"></td>
            </tr>
			<tr> 
                <td>Pump Name</td>
                <td><input type="text" name="pumpname" value="<?php echo $pumpname;?>"></td>
            </tr>
            <tr> 
                <td>Tank ID</td>
                <td><input type="text" name="tank_id" value="<?php echo $tank_id;?>"></td>
            </tr>
            <tr> 
                <td>Description</td>
                <td><input type="text" name="description" value="<?php echo $description;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="pump_id" value=<?php echo $_GET['pump_id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form></div>
</body>
</html>
