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
$id = $_GET['emp_id'];

$sql =  "CALL `showwithid`('$id');";
$users = $conn->query($sql);


if ($users->num_rows > 0) {
    echo "<table>
    <tr>
    <th>Employee_Id:</th>
    <th>Name</th>
    <th>Email</th>
    <th>phn_no</th>
    <th>address</th>
    <th>age</th>
    <th>gender</th>
    <th>salary</th>
    <th>jointime</th>


    </tr>
";
    // output data of each row
    while($row = $users->fetch_assoc()) {
        echo "<tr>
        <td>".$row["emp_id"]."</td>
         <td>".$row["name"]."</td> 
          <td>".$row["email"]."</td>
           <td>".$row["phn_no"]."</td> 
           <td>".$row["address"]."</td>
            <td>".$row["age"]."</td>
             <td>".$row["gender"]."</td> 
             <td>".$row["salary"]."</td>
              <td>".$row["jointime"]."</td>

               </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
                echo "procedure with parameter";

?>
</body>
</html>