<html>
<html lang="en">
<head>
  <title>Create</title>
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
<p>Creating new student list.</p>

<form action="" method="post">
    <!-- Name input -->
    <div class="form-outline mb-4">
        <label class="form-label"  for="sname" >Name</label>
        <input type="text" name="sname" id="sname" placeholder="Name">
    </div>
    <!-- Age input -->
    <div class="form-outline mb-4">
        <label class="form-label"  for="sage" >Age</label>
        <input type="text" name="sage" id="sage" placeholder="Age">
    </div>
     <!-- Age input -->
    <div class="form-outline mb-4">
        <label class="form-label"  for="sdate" >Date</label>
        <input type="text" name="sdate" id="sdate" placeholder="YYYY-MM-DD">
    </div>
    <button type="submit" class="btn btn-secondary btn-block mb-4">Cancle</button>
    <button type="submit" class="btn btn-primary  btn-block mb-4" name="ok">Create</button>
</form>

<?php 
$username = "root"; 
$password = ""; 
$database = "school"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$sql = "SELECT * FROM student_list";

$column = array("ID", "Name", "Age", "Date");

if(isset($_POST['ok'])){
    
    $sname = $_POST['sname'];
    $sage = $_POST['sage'];
    $sdate = $_POST['sdate'];

    $sql = "insert into student_list (Name,Age,Date)    
           values('$sname','$sage','$sdate')";  
    
    $mysqli->query($sql);
    header("Location:StudentList.php");
}

?>

</form>

</body>
</html>