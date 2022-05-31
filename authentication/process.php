<?php

include 'connection.php';
include '../backendFunction/function.php';

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$confirm_password = $_REQUEST['confirm_password'];

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
