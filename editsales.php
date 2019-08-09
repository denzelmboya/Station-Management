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
	$sale_id = $_POST['sale_id'];
	$volume= $_POST['volume'];
    $pump_id = $_POST['pump_id'];
	$staff_id = $_POST['staff_id'];
	$cashsale = $_POST['cashsale'];
    $date=$_POST['date'];
    $time = $_POST['time'];
	
    //updating the table

$mysql = "UPDATE station_sales SET sale_id='$sale_id',volume='$volume',pump_id='$pump_id',staff_id='$staff_id',cashsale='$cashsale',date='$date',time='$time' WHERE sale_id=$sale_id";
$result = $conn->query($mysql);

if ($conn->query($mysql) === TRUE){
	echo "Applied Changes Successful :) Redirecting...";
	header('editsales.php?sale_id=$sale_id');
	header('refresh:0; url=index.php?page=sales');
}else {
	echo "Error." . $mysql . "<br>" .$conn->error;
}
   
}
?>
<?php
//getting id from url
if(isset($_GET['sale_id']))
{
$sale_id = $_GET['sale_id'];
//selecting data associated with this particular id
$mysqli = "SELECT * FROM station_sales WHERE sale_id='$sale_id'";
$result = mysqli_query($conn,$mysqli);
 
while($row = mysqli_fetch_array($result))
{
    $sale_id=$row['sale_id'];
	$volume= $row['volume'];
    $pump_id = $row['pump_id'];
	$staff_id = $row['staff_id'];
	$cashsale = $row['cashsale'];
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
<h2>Sales Table</h2>
  <p><button onclick="window.location.href = 'index.php?page=sales';">Station Forms</button>
  <button onclick="window.location.href = 'index.php';">Home</button></p>

    
    <form name="form1" method="post" action="editsales.php">
        <table border="0">
			<tr> 
                <td>Volume</td>
                <td><input type="text" name="volume" value="<?php echo $volume;?>"></td>
            </tr>
            <tr> 
                <td>Pump ID</td>
                <td><input type="text" name="pump_id" value="<?php echo $pump_id;?>"></td>
            </tr>
            <tr>
                <td>Staff ID</td>
                <td><input type="text" name="staff_id" value="<?php echo $staff_id;?>"></td>
            </tr>
			<tr> 
                <td>Cash Sale</td>
                <td><input type="int" name="cashsale" value="<?php echo $cashsale;?>"></td>
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
                <td><input type="hidden" name="sale_id" value=<?php echo $_GET['sale_id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
