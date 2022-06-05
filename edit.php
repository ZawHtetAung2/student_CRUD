<html>
<html lang="en">
<head>
  <title>Edit</title>
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
<p>Editing a student data.</p>

<?php
$username = "root"; 
$password = ""; 
$database = "school"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$sql = "SELECT * FROM student_list";

$userID = $_GET['userid'];

$res = $mysqli->query($sql);
$values = $res->fetch_all(MYSQLI_ASSOC);
$columns = array();
if(!empty($values)){
    $columns = array_keys($values[0]);
}

  $sql = "SELECT * FROM student_list where ID = '$userID'";
  $result = $mysqli -> query($sql);
  
  // Associative array
  $row = $result -> fetch_assoc();

  
echo '<form action="" method="post">
    <!-- Name input -->
    <div class="form-outline mb-4">
        <label class="form-label"  for="sname" >Name</label>
        <input type="text" name="sname" id="sname" value='.$row[$columns[1]].'>
    </div>
    <!-- Age input -->
    <div class="form-outline mb-4">
        <label class="form-label"  for="sage" >Age</label>
        <input type="text" name="sage" id="sage" value='.$row[$columns[2]].'>
    </div>
     <!-- Age input -->
    <div class="form-outline mb-4">
        <label class="form-label"  for="sdate" >Date</label>
        <input type="text" name="sdate" id="sdate" value='.$row[$columns[3]].'>
    </div>
    <button type="submit" class="btn btn-secondary btn-block mb-4">Cancle</button>
    <button type="submit" class="btn btn-primary  btn-block mb-4" name="ok">Edit</button>
</form>';


if(isset($_POST['ok'])){
    $sname = $_POST['sname'];
    $sage = $_POST['sage'];
    $sdate = $_POST['sdate'];

    // echo $sname ."\n".$sage."\n".$sdate;

    $sqli = "UPDATE student_list
             SET Name = '$sname' , Age= '$sage', Date= '$sdate'
             WHERE ID = '$userID'";  
    
    $mysqli->query($sqli);
    header("Location:StudentList.php");

}

$result -> free_result();

$mysqli -> close();

?>

</form>

</body>
</html>