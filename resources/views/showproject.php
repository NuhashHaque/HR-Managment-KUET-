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
echo "Connected successfully";


$sql = "SELECT * FROM project";

$users = $conn->query($sql);

if ($result = $conn->query($sql)) {
    // $result is an object and can be used to fetch row here
    printf("querydone");
}
else {
    printf("Query failed: %s\n", $conn->error);
}

if ($users->num_rows > 0) {
    echo "<table>
    <tr>
    <th>Project_Id:</th>
    <th>Name</th>
    <th>supervisor_id</th>
    <th>duration</th>
    <th>Fund</th>


    </tr>
";
    // output data of each row
    while($row = $users->fetch_assoc()) {
        echo "<tr>
        <td>".$row["p_id"]."</td>
         <td>".$row["name"]."</td> 
          <td>".$row["supervisor_id"]."</td>
           <td>".$row["duration"]."</td> 
           <td>".$row["fund"]."</td>
               </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>