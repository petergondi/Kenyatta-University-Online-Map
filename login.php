<?php

include 'connection.php';
//$username=$_POST['firstname'];
//$password=$_POST['password'];

if($_POST['username']!==null && $_POST['password']!==null){
	$verify="SELECT * FROM admin WHERE username=:username1 AND password=:password1";
     $stm=$conn->prepare($verify);
     $stm->bindParam(':username1', $_POST['username']);
     $stm->bindParam(':password1', $_POST['password']);
   $stm->execute();
   if($stm->rowCount()>0){
   	header("location:home/home.php");
   }
   else{
   	echo "username or password invalid";
   }
}
else{
	echo "please fill all the sections";
}


?>