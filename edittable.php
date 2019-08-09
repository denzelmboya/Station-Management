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
    $tank_id = $_POST['tank_id'];
    $tankname=$_POST['tankname'];
    $fuel_type_id=$_POST['fuel_type_id'];
    $description=$_POST['description']; 

    //updating the table

$mysql = "UPDATE station_tanks SET tank_id='$tank_id',tankname='$tankname',fuel_type_id='$fuel_type_id',description='$description' WHERE tank_id=$tank_id";
$result = $conn->query($mysql);

if ($conn->query($mysql) === TRUE){
	echo "Applied Changes Successful :) Redirecting...";
	header('edittable.php?tank_id=$tank_id');
	header('refresh:0; url=index.php?page=tanks');
}else {
	echo "Error." . $mysql . "<br>" .$conn->error;
}
   
}
?>
<?php
//getting id from url
if(isset($_GET['tank_id']))
{
$tank_id = $_GET['tank_id'];
//selecting data associated with this particular id
$mysqli = "SELECT * FROM station_tanks WHERE tank_id='$tank_id'";
$result = mysqli_query($conn,$mysqli);
 
while($row = mysqli_fetch_array($result))
{
    $tank_id = $row['tank_id'];
	$tankname = $row['tankname'];
    $fuel_type_id= $row['fuel_type_id'];
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
<h2>Tanks Table</h2>
  <p><button onclick="window.location.href = 'index.php?page=formtank';">Station Forms</button>
  <button onclick="window.location.href = 'index.php';">Home</button></p>

    
    <form name="form1" method="post" action="edittable.php">
        <table border="0">
            <tr> 
                <td>Tank ID</td>
                <td><input type="text" name="tank_id" value="<?php echo $tank_id;?>"></td>
            </tr>
			<tr> 
                <td>Tank Name</td>
                <td><input type="text" name="tankname" value="<?php echo $tankname;?>"></td>
            </tr>
            <tr> 
                <td>Fuel Type ID</td>
                <td><input type="text" name="fuel_type_id" value="<?php echo $fuel_type_id;?>"></td>
            </tr>
            <tr> 
                <td>Description</td>
                <td><input type="text" name="description" value="<?php echo $description;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="tank_id" value=<?php echo $_GET['tank_id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
