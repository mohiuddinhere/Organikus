<?php
include '../authentication/connection.php';

$projName = $_REQUEST['name'];
$location = $_REQUEST['location'];
$operartype = $_REQUEST['operartype'];
$site = $_REQUEST['site'];

echo $projName;
echo $location;
echo $operartype;
echo $site;

// $str1 = "SELECT email FROM registereduser WHERE email='$email'";
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