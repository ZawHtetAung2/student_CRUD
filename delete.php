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

    $userID = $_GET['userid'];

    $sqli = "DELETE FROM $myTable
             WHERE $columns[0] = $userID"; 
    $mysqli->query($sqli);

    $sqli = "SET @num := 0"; 
    $mysqli->query($sqli);

    $sqli = "UPDATE $myTable SET $columns[0] = @num := (@num+1);"; 
    $mysqli->query($sqli);

    header("Location:StudentList.php");
?>
