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
$email = $_GET['email'];
$phn_no = $_GET['phn_no'];
$address = $_GET['address'];
$age = $_GET['age'];
$gender = $_GET['gender'];
$salary = $_GET['salary'];

// Attempt insert query execution
$sql = "INSERT INTO employee (name,email,phn_no,address,age,gender,salary) VALUES ('$name','$email','$phn_no','$address','$age','$gender','$salary')";
if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close();
unset($_GET['submit']);
}
?>