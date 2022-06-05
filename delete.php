<html>
<html lang="en">
<head>
  <title>Delete</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<nav class="navbar navbar-expand navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand btn btn-primary" href="StudentList.php">Home</a>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-light" type="submit">Search</button>
    </form>
  </div>
</nav>
<br>
<p>Deleting a student data.</p>

<?php
$username = "root"; 
$password = ""; 
$database = "school"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$sql = "SELECT * FROM student_list";

$userID = $_GET['userid'];


    $sqli = "DELETE FROM student_list
             WHERE ID = '$userID'";  
    $mysqli->query($sqli);

    $sqli = "ALTER TABLE student_list
             ALTER COLUMN ID int not null auto_increment primary key";
    $mysqli->query($sqli);

    header("Location:StudentList.php");

?>

</form>

</body>
</html>