<?php 

include '../authentication/connection.php';

$str = "SELECT * FROM operationtype";
$result = mysqli_query($conn, $str);
// $row = mysqli_num_rows($result);
$arr = [];

while($row = mysqli_fetch_array($result)){
    $obj = [];
    $id = $row['id'];
    $name = $row['name'];
    $obj['id'] = $id;
    $obj['name'] = $name;
    array_push($arr, $obj);
}

// print_r($arr);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($arr);
?>