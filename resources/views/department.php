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

$d_name = $_GET['d_name'];
$faculty = $_GET['faculty'];

// Attempt insert query execution
$sql = "INSERT INTO department(d_name,faculty) VALUES ('$d_name', '$faculty')";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close();
unset($_GET['submit']);
}
?>