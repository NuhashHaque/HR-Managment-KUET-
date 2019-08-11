<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Record Form</title>
</head>
<body>
<form method="get" action="project.php">
    <p>
        <label for="name">Project Name:</label>
        <input type="text" name="name" id="name">
    </p>
        <p>
        <label for="supervisor_id">Supervisor ID:</label>
        <input type="text" name="supervisor_id" id="supervisor_id">
    </p>
    <p>
        <label for="duration">Duration:</label>
        <input type="text" name="duration" id="duration">
    </p>
        <p>
        <label for="fund">Fund:</label>
        <input type="text" name="fund" id="fund">
    </p>
    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>
