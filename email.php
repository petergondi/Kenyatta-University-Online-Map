<?php
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['comment'];
$message = wordwrap($message,70);
// send email
mail("gondipeters@gmail.com","Feedback",$message,"From:" . $email);
?>