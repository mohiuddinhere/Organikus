<?php
include '../authentication/auth.php';
// include 'get-generate-data.php';
include '../authentication/connection.php';
// echo $project_name = $_SESSION['project_name'];
// print_r($_POST);

$user_id =  $_SESSION['id'];
$project_name = $_SESSION['project_name'];

$str = "SELECT * FROM generateproject 
WHERE project_name = '$project_name' && user_id = $user_id";
$result = mysqli_query($conn, $str);
$r = mysqli_fetch_assoc($result);

$project_id = $r['project_id'];
// echo $project_id;
// echo $str;
// $_REQUEST['']

foreach($_POST['crop_name'] as $key => $value){
    $crop_name = $_POST['crop_name'][$key];
    $crop_code = $_POST['crop_grow_system'][$key];
    $percentage = $_POST['crop_percentage'][$key];
    $sql = "INSERT INTO generatecrop(crop_name, crop_code, percentage, proj_id) 
    VALUES ('$crop_name', $crop_code, $percentage, $project_id);";
    // echo $sql;
    mysqli_query($conn, $sql);
    // $stmt = $conn->prepare($sql);
    // $stmt->execute([
    //     'crop_name' => $value,
    //     'crop_code' => $_POST['crop_grow_system'][$key],
    //     'percentage' => $_POST['crop_percentage'][$key],
    //     'project_id' => $project_id 
    // ]);
}
// echo 'done';

// $obj_data = [];
// $obj_data['data'] = 'true';
// echo json_encode($obj_data);

// header("Location: http://localhost/Organikus/customer-project/project.html");
// exit();
// $obj = [];
// if($_POST){
//     $obj['data'] = 'true';
//     echo json_encode($obj);
// }else if(!$_POST) {
//     $obj['data'] = 'false';
//     echo json_encode($obj);
// } 

?>