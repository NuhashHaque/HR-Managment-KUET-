<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 4px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}
</style>
</head>
<body>
<h1>All Course Data:</h1>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hrkuet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "CALL `get_course`();";
$users = $conn->query($sql);
if ($users->num_rows > 0) {
    echo "<table>
    <tr>
    <th>course_id</th>
    <th>course_name</th>
    <th>faculty_id</th>
    <th>department_number</th>
    </tr>
";
    // output data of each row
    while($row = $users->fetch_assoc()) {
        echo "<tr>
        <td>".$row["course_id"]."</td>
         <td>".$row["course_name"]."</td> 
          <td>".$row["fact_id"]."</td> 
           <td>".$row["d_no"]."</td>
               </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

                echo "used Procedure without parameter";

?>