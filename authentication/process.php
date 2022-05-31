<?php

include 'connection.php';
include '../backendFunction/function.php';

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$confirm_password = $_REQUEST['confirm_password'];

$checkEmail = emailValidation($email);

$checkPass = passwordValidation($password);
// echo $checkPass;

$str1 = "SELECT email FROM registereduser WHERE email='$email'";
$result = mysqli_query($conn, $str1);
// $checkExistingEmail = mysqli_query($conn, $str1);
// $row = ;
// echo $row;

if(mysqli_num_rows($result)<=0)
{
	if($password == $confirm_password && $checkPass == 1 && $checkEmail == 1)
	{
		$str = "INSERT INTO registereduser(email, password) VALUES ('$email', '$password')";
		mysqli_query($conn, $str);
	}
}
else
{
	echo "Email Exists!";
}


// echo $email;


    // echo $email;
    //echo "sxsxs";
	
	// $stmt=$db->prepare("INSERT INTO tbl_user(username,
	// 										 email, 
	// 										 password)
	// 									VALUES
	// 									    (:uname,
	// 										 :uemail,
	// 										 :upassword)"); 
	
		
	// $stmt->bindParam(":uname",$username);
	// $stmt->bindParam(":uemail",$email);
	// $stmt->bindParam(":upassword",$password);
		 		
	// if($stmt->execute())
	// {
	// 	echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> 
	// 				Register Successfully  
	// 		 </div>';		
	// }	
	// else
	// {
	// 	echo  '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> 
	// 				Fail to Register  
	// 		   </div>';		
	// }
