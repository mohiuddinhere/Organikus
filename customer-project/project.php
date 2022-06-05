<?php
include '../authentication/auth.php';
// include 'get-generate-data.php';
include '../authentication/connection.php';

$user_id =  $_SESSION['id'];

$str = "SELECT * FROM generateproject WHERE user_id=$user_id";
$result = mysqli_query($conn, $str);
$row = mysqli_fetch_all($result);

// print_r($row);


$obj = [];
$obj['project_list'] = $row;

    if(mysqli_num_rows($result)> 0){
        foreach($obj as $r){
            array_push($obj, $r);
        }
    }

    echo json_encode($obj);

?>