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

$emp_id = $_GET['emp_id'];
$d_no = $_GET['d_no'];
$designation= $_GET['designation'];
$department=$_GET['department'];

// Attempt insert query execution
$sql="INSERT INTO facultymember(emp_id,d_no,designation,department) VALUES ('$emp_id','$d_no','$designation','$department')";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close();
unset($_GET['submit']);
}
?>