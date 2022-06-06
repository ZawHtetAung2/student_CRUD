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

<?php
$username = "root"; 
$password = ""; 
$database = "school"; 
$myTable = "student_list";


$mysqli = new mysqli("localhost", $username, $password, $database); 
$sql = "SELECT * FROM $myTable";

$userID = $_GET['userid'];

//request Header Row
$res = $mysqli->query($sql);
$values = $res->fetch_all(MYSQLI_ASSOC);
$columns = array();
if(!empty($values)){
    $columns = array_keys($values[0]);
}

  $sql = "SELECT * FROM $myTable where ID = '$userID'";
  $result = $mysqli -> query($sql);
  
  // Associative array
  $row = $result -> fetch_assoc();

if(isset($_POST['ok'])){
    $sname = $_POST['sname'];
    $sage = (int)$_POST['sage'];
    $sdate = $_POST['sdate'];
    
    // echo $sname ."\n".$sage."\n".$sdate;
    if($sage>0 and $sage<100){
    $sqli = "UPDATE $myTable
             SET $columns[1] = '$sname' , $columns[2]= '$sage', $columns[3]= '$sdate'
             WHERE $columns[0] = '$userID';";  
    
      $mysqli->query($sqli);
      header("Location:StudentList.php");
    }else{
      echo '<p>Age input type is wrong<p>';
    }
}elseif(isset($_POST['cancle'])){
  header("Location:StudentList.php");
}

$result -> free_result();
$mysqli -> close();

?>

<nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="StudentList.php">Home</a>
  </div>
</nav>

<div class="container mt-3">
  <h3>Editing student data.</h3>

  <form method="post">
    <!-- Name Edit -->
    <div class="mb-3 mt-3">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="sname" name="sname" value="<?php echo $row[$columns[1]]; ?>">
    </div>
    <!-- Age Edit -->
    <div class="mb-3 mt-3">
      <label for="email">Age:</label>
      <input type="text" class="form-control" id="sage" name="sage" value="<?php echo $row[$columns[2]]; ?>">
    </div>
    <!-- Age Date -->
    <div class="mb-3 mt-3">
      <label for="email">Age:</label>
      <input type="text" class="form-control" id="sdate" name="sdate" value="<?php echo $row[$columns[3]]; ?>" >
    </div>
    <!-- Button -->
    <button type="submit" class="btn btn-secondary" name="cancle">Cancle</button>
    <button type="submit" class="btn btn-primary" name="ok">Edit</button>
  </form>
</div>

</body>
</html>
