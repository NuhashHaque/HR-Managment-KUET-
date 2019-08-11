
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

$course_name = $_GET['course_name'];
$fact_id = $_GET['fact_id'];
$d_no = $_GET['d_no'];


// Attempt insert query execution
$sql = "INSERT INTO course (course_name,fact_id,d_no) VALUES ('$course_name','$fact_id','$d_no')";

if ($conn->query($sql) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close();
unset($_GET['submit']);
}
?>