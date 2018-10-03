 <?php
 include 'connection.php';
 //include 'delete.php';
 //$id=$_POST['id'];
 if(empty($_SESSION['id'])){
 	exit();
 }
 else{
	$itemid=$_SESSION['id'];
	$save = "INSERT INTO records (itemid) values(:ID)";
$stm = $conn->prepare($save);
$stm->bindParam(':ID', $itemid, PDO::PARAM_INT);   
$stm->execute();
if($stm){
echo "the record has been inserted sucessfully!";
}
else{
	
echo "record not deleted or does not exist";
} 
}     


    ?>