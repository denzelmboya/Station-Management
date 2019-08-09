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
    $refill_id = $_POST['refill_id'];
	$tank_id = $_POST['tank_id'];
	$fuel_balance = $_POST['fuel_balance'];
	$refill_amount = $_POST['refill_amount'];
    $supplier= $_POST['supplier'];
    $depot_location = $_POST['depot_location'];
	$supplier_contact = $_POST['supplier_contact'];
	$ship_method = $_POST['ship_method'];
    $date= $_POST['date'];
    $time = $_POST['time'];
	
    //updating the table

$mysql = "UPDATE refill_details SET refill_id='$refill_id',tank_id='$tank_id',fuel_balance='$fuel_balance',refill_amount='$refill_amount', supplier='$supplier',depot_location='$depot_location',supplier_contact='$supplier_contact',ship_method='$ship_method',date='$date',time='$time' WHERE refill_id=$refill_id";
$result = $conn->query($mysql);

if ($conn->query($mysql) === TRUE){
	echo "Applied Changes Successful :) Redirecting...";
	header('editrefill.php?refill_id=$refill_id');
	header('refresh:0; url=index.php?page=refill');
}else {
	echo "Error." . $mysql . "<br>" .$conn->error;
}}
?>
<?php
//getting id from url
if(isset($_GET['refill_id']))
{
$refill_id = $_GET['refill_id'];
//selecting data associated with this particular id
$mysqli = "SELECT * FROM refill_details WHERE refill_id='$refill_id'";
$result = mysqli_query($conn,$mysqli);
 
while($row = mysqli_fetch_array($result))
{
    $refill_id = $row['refill_id'];
	$tank_id = $row['tank_id'];
	$fuel_balance = $row['fuel_balance'];
	$refill_amount = $row['refill_amount'];
    $supplier= $row['supplier'];
    $depot_location = $row['depot_location'];
	$supplier_contact = $row['supplier_contact'];
	$ship_method = $row['ship_method'];
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
<h2>Refill Details</h2>
  <p><button onclick="window.location.href = 'index.php?page=refill';">Station Forms</button>
  <button onclick="window.location.href = 'index.php';">Home</button></p>

    
    <form name="form1" method="post" action="editrefill.php">
        <table border="0">
            <tr> 
                <td>Refill ID</td>
                <td><input type="text" name="refill_id" value="<?php echo $refill_id;?>"></td>
            </tr>
			<tr> 
                <td>Tank ID</td>
                <td><input type="text" name="tank_id" value="<?php echo $tank_id;?>"></td>
            </tr>
            <tr> 
                <td>Fuel Balance</td>
                <td><input type="text" name="fuel_balance" value="<?php echo $fuel_balance;?>"></td>
            </tr>
            <tr> 
                <td>Refill Amount</td>
                <td><input type="text" name="refill_amount" value="<?php echo $refill_amount;?>"></td>
            </tr>
			            <tr> 
                <td>Supplier</td>
                <td><input type="text" name="supplier" value="<?php echo $supplier;?>"></td>
            </tr>
			<tr> 
                <td>Depot Location</td>
                <td><input type="text" name="depot_location" value="<?php echo $depot_location;?>"></td>
            </tr>
            <tr> 
                <td>Supplier Contact</td>
                <td><input type="text" name="supplier_contact" value="<?php echo $supplier_contact;?>"></td>
            </tr>
            <tr> 
                <td>Ship Method</td>
                <td><input type="text" name="ship_method" value="<?php echo $ship_method;?>"></td>
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
                <td><input type="hidden" name="refill_id" value=<?php echo $_GET['refill_id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
