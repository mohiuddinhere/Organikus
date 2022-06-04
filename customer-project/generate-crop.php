<?php
include '../authentication/auth.php';
// include 'get-generate-data.php';
include '../authentication/connection.php';

print_r($_POST);

$user_id =  $_SESSION['id'];
$project_name = $_REQUEST['name'];

$str = "SELECT * FROM generateproject 
WHERE project_name = '$project_name' && user_id = $user_id";

echo $str;
// $_REQUEST['']

foreach($_POST['crop_name'] as $key => $value){
    // $crop_code = $_POST['crop_code'][$key];
    // $percentage = $_POST['percentage'][$key];
    $sql = "INSERT INTO generatecrop(crop_id, crop_name, crop_code, percentage, proj_id) VALUES (:crop_name, :crop_code, :percentage)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'crop_name' => $value,
        'crop_code' => $_POST['crop_code'][$key],
        'percentage' => $_POST['percentage'][$key]
    ]);
}
echo 'dudu';
// $obj = [];
// if($_POST){
//     $obj['data'] = 'true';
//     echo json_encode($obj);
// }else if(!$_POST) {
//     $obj['data'] = 'false';
//     echo json_encode($obj);
// } 

?>