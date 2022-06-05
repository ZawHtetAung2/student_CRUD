<html>
<html lang="en">
<head>
  <title>Student List</title>
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
<p>This is student lists.</p>
<a href="create.php" class="btn btn-primary ms-5" tabindex="-1" role="button" aria-disabled="true">Create</a>
<br>
<br>


<?php 
$username = "root"; 
$password = ""; 
$database = "school"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$query = "SELECT * FROM student_list";

$res = $mysqli->query($query);
$values = $res->fetch_all(MYSQLI_ASSOC);
$column = array();
if(!empty($values)){
    $column = array_keys($values[0]);
}

echo   '<div class="container text-center">
            <div class="col-lg8">

            <table class="table table-bordered border-dark table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>'.$column[0].'</th> 
                        <th>'.$column[1].'</th> 
                        <th>'.$column[2].'</th> 
                        <th>'.$column[3].'</th>
                        <th colspan="2">Action</th> 
                    </tr>
                    </thead>
                    <tbody>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row[$column[0]];
        $field2name = $row[$column[1]];
        $field3name = $row[$column[2]];
        $field4name = $row[$column[3]];
        echo '<tr> 
                  <td class="text-end me-2">'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td class="text-center"><a href="edit.php?userid='.$field1name.'" class="btn btn-success">Edit</a></td>
                  <td class="text-center"><a href="delete.php?userid='.$field1name.'" class="btn btn-danger">Delete</a></td>
              </tr>';

    }
    echo '</tbody>
          </table>
          </div>
          </div>';

    $result->free();
} 

?>
</body>
</html>