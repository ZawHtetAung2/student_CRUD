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

<?php 
$username = "root"; 
$password = ""; 
$database = "school"; 
$myTable = "student_list";

$mysqli = new mysqli("localhost", $username, $password, $database); 
$sql = "SELECT * FROM $myTable";

//request Header Row
$res = $mysqli->query($sql);
$values = $res->fetch_all(MYSQLI_ASSOC);
$columns = array();
if(!empty($values)){
    $columns = array_keys($values[0]);
}

if(isset($_POST['ok'])){
    
    $sname = $_POST['sname'];
    $sage = (int)$_POST['sage'];


    if($sage>0 and $sage<100){
      $sql = "insert into $myTable ($columns[1],$columns[2],$columns[3])    
              values('$sname','$sage',now())";  
    
              
      $mysqli->query($sql);
      header("Location:StudentList.php");
    }else{
      echo '<p>Age input type is wrong<p>';
    }
    
}elseif(isset($_POST['cancle'])){
  header("Location:StudentList.php");
}
?>

<!-- Nav bar -->
<nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="StudentList.php">Home</a>
  </div>
</nav>
 
<!-- Input Box-->
<div class="container mt-3">
  <h3>Creating new student list.</h3>

  <form method="post">
    <!-- Name input -->
    <div class="mb-3 mt-3">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="sname" placeholder="Enter name" name="sname">
    </div>
    <!-- Age input -->
    <div class="mb-3 mt-3">
      <label for="email">Age:</label>
      <input type="text" class="form-control" id="sage" placeholder="Enter Age" name="sage">
    </div>
    <button type="submit" class="btn btn-secondary" name="cancle">Cancle</button>
    <button type="submit" class="btn btn-primary" name="ok">Create</button>
  </form>
</div>

</body>
</html>
