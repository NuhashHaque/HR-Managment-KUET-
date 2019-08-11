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
$section = $_GET['section'];
$department = $_GET['department'];
$designation=$_GET['designation'];

// Attempt insert query execution
$sql = "INSERT INTO staff (emp_id,section,department,designation) VALUES ('$emp_id', '$section ','department ','$designation')";
if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close();
unset($_GET['submit']);
}
?>