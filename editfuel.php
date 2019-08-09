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
    $id = $_POST['id'];
    $fuel_type_name=$_POST['fuel_type_name'];
    $description=$_POST['description']; 
	
    //updating the table

$mysql = "UPDATE fuel_types SET id='$id',fuel_type_name='$fuel_type_name',description='$description' WHERE id=$id";
$result = $conn->query($mysql);

if ($conn->query($mysql) === TRUE){
	echo "Applied Changes Successful :) Redirecting...";
	header('editfuel.php?id=$id');
	header('refresh:0; url=index.php?page=fuel');
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
$mysqli = "SELECT * FROM fuel_types WHERE id='$id'";
$result = mysqli_query($conn,$mysqli);
 
while($row = mysqli_fetch_array($result))
{
    $id = $row['id'];
    $fuel_type_name= $row['fuel_type_name'];
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
<h2>fuel types</h2>
  <p><button onclick="window.location.href = 'index.php?page=fuel';">Station Forms</button>
  <button onclick="window.location.href = 'index.php';">Home</button></p>

    
    <form name="form1" method="post" action="editfuel.php">
        <table border="0">
            <tr> 
                <td>ID</td>
                <td><input type="text" name="id" value="<?php echo $id;?>"></td>
            </tr>
			<tr> 
                <td>Fuel Type Name</td>
                <td><input type="text" name="fuel_type_name" value="<?php echo $fuel_type_name;?>"></td>
            </tr>
            <tr> 
                <td>Description</td>
                <td><input type="text" name="description" value="<?php echo $description;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>