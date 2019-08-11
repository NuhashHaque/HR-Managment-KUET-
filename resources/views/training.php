
<?php
if(isset($_GET['submit']))
{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hrkuet";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$training_name= $_GET['training_name'];
$emp_id = $_GET['emp_id'];
$duration = $_GET['duration'];


// Attempt insert query execution
$sql = "INSERT INTO training (training_name,emp_id,duration) VALUES ('$training_name','$emp_id','$duration')";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close();
unset($_GET['submit']);
}
?>