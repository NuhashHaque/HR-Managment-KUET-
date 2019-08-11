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


$sql = "SELECT DISTINCT (facultymember.emp_id),employee.name,employee.email,employee.phn_no,employee.address,employee.age,employee.gender,employee.salary,employee.jointime,facultymember.fact_id,facultymember.d_no,facultymember.designation,facultymember.department FROM employee JOIN facultymember ON employee.emp_id = facultymember.emp_id";

$users = $conn->query($sql);

if ($result = $conn->query($sql)) {
    // $result is an object and can be used to fetch row here
}
else {
    printf("Query failed: %s\n", $conn->error);
}

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
    <th>Faculty_id:</th>
    <th>Department_NO</th>
    <th>Designation</th>
    <th>Department</th>

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
                            <td>".$row["fact_id"]."</td>
                           <td>".$row["d_no"]."</td>
                            <td>".$row["designation"]."</td>
                             <td>".$row["department"]."</td>
               </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
                echo "join operation";

?>


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
                $sql="SELECT COUNT(*) AS Total FROM facultymember";
                $records=mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($records);
                echo "<h1> Total FacultyMember Number: ".$row['Total']."<h1>";

                                echo "*aggregate count";

 ?>
</body>
</html>