<?php
include 'connection.php';
try{
 
    $sql = "SELECT count(type) FROM users WHERE type='student_id'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetchAll();
$results=$stmt->rowCount();
foreach ($result as $row) {
	echo "National_id:".$results; 
}
 
} catch(PDOException $e){

    die("ERROR: Could not able to execute $sql. " . $e->getMessage());

}
?>
