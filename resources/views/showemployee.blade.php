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
<h1>All Employee Data:</h1>
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

$sql = "SELECT * FROM employee";
$users = $conn->query($sql);
if ($users->num_rows > 0) {
    echo "<table>
    <tr>
    <th>emp_id</th>
    <th>name</th>
    <th>email</th>
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

?>

<h1>Same Address Grouped Employee</h1>




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

$sql = "SELECT COUNT(emp_id) AS no, address
FROM employee
GROUP BY address
ORDER BY no DESC;";
$users = $conn->query($sql);
if ($users->num_rows > 0) {
    echo "<table>
    <tr>
    <th>NO of Employee</th>
    <th>Region</th>
    </tr>
";
    // output data of each row
    while($row = $users->fetch_assoc()) {
        echo "<tr>
        <td>".$row["no"]."</td>
         <td>".$row["address"]."</td> 
               </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>




<h1>Senior Employees Above Average Age:</h1>


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

$sql = "SELECT name,
       age,salary,no_of_years(jointime) as 'years'
FROM employee
WHERE age > (
  SELECT AVG(age) 
    FROM employee
)";
$users = $conn->query($sql);
if ($users->num_rows > 0) {
    echo "<table>
    <tr>
    <th>name</th>
    <th>age</th>
    <th>salary</th>
    <th>years worked</th>
    </tr>
";
    // output data of each row
    while($row = $users->fetch_assoc()) {
        echo "<tr>
         <td>".$row["name"]."</td>  
            <td>".$row["age"]."</td>
             <td>".$row["salary"]."</td>
             <td>".$row["years"]."</td>
               </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "Query with function with parameter and Subquery";
?>

<h1>Employee from Adminstration and Staffs:</h1>
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


$sql = "SELECT 
    emp_id, 
    section,
    designation
FROM
    adminstration
UNION 
SELECT 
    emp_id, 
    section,
    designation
FROM
    staff";

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
    <th>Employee_id:</th>
    <th>Section_NO:</th>
    <th>Designation:</th>



    </tr>
";
    // output data of each row
    while($row = $users->fetch_assoc()) {
        echo "<tr>
                   <td>".$row["emp_id"]."</td>
                   <td>".$row["section"]."</td>
                   <td>".$row["designation"]."</td>
               </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
                echo "Set Operation Union";

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
                $sql="SELECT COUNT(*) AS Total FROM employee";
                $records=mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($records);
                echo "<h1> Total Employee Number: ".$row['Total']."<h1>";

                 $sql="SELECT AVG(age) average_age FROM employee";
                $records=mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($records);
                echo "<h1> Employee Average Age: ".$row['average_age']."<h1>";
                                echo "*aggrigate count avg";
                                   
 ?>

</body>
</html>