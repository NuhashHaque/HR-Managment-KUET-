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

$name = $_GET['name'];
$supervisor_id = $_GET['supervisor_id'];
$duration = $_GET['duration'];
$fund = $_GET['fund'];

// Attempt insert query execution
$sql = "INSERT INTO project (name,supervisor_id,duration,fund) VALUES ('$name','$supervisor_id','$duration','$fund')";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close();
unset($_GET['submit']);
}
?>