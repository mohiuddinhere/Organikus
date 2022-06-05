<?php
include '../authentication/auth.php';
include '../authentication/connection.php';
$user_id = $_SESSION['id'];
$project_name = $_REQUEST['name'];
$location = $_REQUEST['location'];
$operation_type = $_REQUEST['operartype'];
$site = $_REQUEST['site'];


$str = "SELECT project_name, user_id FROM generateproject 
WHERE project_name = '$project_name' && user_id = $user_id";
$result = mysqli_query($conn, $str);

$_SESSION['project_name'] = $project_name;

if(mysqli_num_rows($result)<=0)
{
    $str = "INSERT INTO generateproject(project_name, site_area, project_location, operate, user_id) 
    VALUES ('$project_name', $site, '$location', $operation_type, $user_id)";
    mysqli_query($conn,$str);
}
else
{
    echo 'single user cannot create multiple projects with same name';
}




// echo $projName;
// echo $location;
// echo $operartype;
// echo $site;

// $str1 = "INSERT ";
// $result = mysqli_query($conn, $str1);
// $checkExistingEmail = mysqli_query($conn, $str1);
// $row = ;
// echo $row;

// if(mysqli_num_rows($result)>=1)
// {
// 	$str = "INSERT INTO registereduser(email, password) VALUES ('$email', '$password')";
// 	mysqli_query($conn, $str);
// }
// else
// {
// 	echo "Email Doesn't Exists!";
// }


?>