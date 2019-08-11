
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<form method="get" action="employee.php">
    <p>
        <label for="name">Name:</label>
        <input type="text" name="name" id="emp_id">
    </p>
    <p>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
    </p>
    <p>
        <label for="Phn_no">Phone No:</label>
        <input type="text" name="phn_no" id="phn_no">
    </p>
        <p>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address">
    </p>
            <p>
        <label for="age">Age:</label>
        <input type="number" name="age" id="age">
    </p>
                <p>
        <label for="gender">Gender:</label>
        <input type="text" name="gender" id="gender">
    </p>
                <p>
        <label for="salary">Salary:</label>
        <input type="number" name="salary" id="address">
    </p>

    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>





<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
 
<div class="container">
   
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Add Employee Data</h3>
  <br />
  

  <form method="post" action="{{url('employee')}}">
   
   <div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="Enter Name" />
   </div>
   <div class="form-group">
    <input type="text" name="email" class="form-control" placeholder="Enter Email" />
   </div>
  <div class="form-group">
    <input type="text" name="phn_no" class="form-control" placeholder="Enter Phone" />
   </div>
      <div class="form-group">
    <input type="text" name="address" class="form-control" placeholder="Enter Address" />
   </div>
      <div class="form-group">
    <input type="text" name="age" class="form-control" placeholder="Enter Age" />
   </div>
      <div class="form-group">
    <input type="text" name="gender" class="form-control" placeholder="Enter Gender" />
   </div>
      <div class="form-group">
    <input type="number" name="salary" class="form-control" placeholder="Enter Salary" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" />
   </div>
  @csrf
  </form>
 </div>
</div>

</div>
 
</body>
</html> -->