 
 <?php
  include("connection.php");
  session_start();
	$id=$_POST['id'];
   //$id=59;
	$_SESSION['id']=$id;
 
	$sql = "DELETE FROM posted WHERE Id =:ID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':ID', $id, PDO::PARAM_INT);   
$stmt->execute(); 

    
    ?>