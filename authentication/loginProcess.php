<?php
include 'connection.php';

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

// echo $password;

$str1 = "SELECT email FROM registereduser WHERE email='$email'";
$result = mysqli_query($conn, $str1);
// $checkExistingEmail = mysqli_query($conn, $str1);
// $row = ;
// echo $row;

if(mysqli_num_rows($result)>=1)
{
	$str = "INSERT INTO registereduser(email, password) VALUES ('$email', '$password')";
	mysqli_query($conn, $str);
}
else
{
	echo "Email Doesn't Exists!";
}


?>
