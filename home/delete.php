 
 <?php
  include("connection.php");
	$id=$_POST['id'];
   
	$sql = "DELETE FROM posted WHERE id =:ID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':ID', $id, PDO::PARAM_INT);   
$stmt->execute(); 

    
    ?>