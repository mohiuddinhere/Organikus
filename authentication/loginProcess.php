<?php
include 'connection.php';

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

// echo $password;

// $password = md5($password);

$str1 = "SELECT * FROM registereduser WHERE email='$email' && password='$password'";
$result = mysqli_query($conn, $str1);
// $checkExistingEmail = mysqli_query($conn, $str1);
// $row = ;
// echo $row;
if(mysqli_num_rows($result)==1)
{
	// $str = "INSERT INTO registereduser(email, password) VALUES ('$email', '$password')";
	// mysqli_query($conn, $str1);
	$r = mysqli_fetch_assoc($result);
	if($r['email'] == $email && $r['password'] == $password){
		session_start();
		echo $_SESSION['auth'] = 'true';
		echo $_SESSION['id'] = $r['id'];
		$obj = [];
		if($_SESSION['id']){
			$obj['auth'] = 'true';
			echo json_encode($obj);
		}else if(!$_SESSION['id']) {
			$obj['auth'] = 'false';
			echo json_encode($obj);
		} 
	}else{
		echo "wrong login info";
	}


}
else
{
	echo "User Doesnot Exist!";
}

?>
