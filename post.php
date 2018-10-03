<?php
include 'connection.php';
try{
 
    $sql = "INSERT INTO posted (firstname,lastname,Reg_no,type, terminal) VALUES (:firstname,:lastname :reg_no,:type, :terminal)";

$firstname=$_POST['firstname'];
$lasttname=$_POST['lastname'];
$reg_no=$_POST['reg_no'];
$type=$_POST['type'];
$terminal=$_POST['terminal'];
    $stmt = $conn->prepare($sql);
    // bind parameters to statement
    $stmt->bindParam(':firstname', $_POST['firstname']);
     $stmt->bindParam(':lastname', $_POST['lastname']);
    $stmt->bindParam(':reg_no', $_POST['reg_no']);
     $stmt->bindParam(':type', $_POST['type']);
    $stmt->bindParam(':terminal', $_POST['terminal']);
    $verify="SELECT * FROM posted WHERE type=:type && Reg_no=:reg_no";
     $stm=$conn->prepare($verify);
     $stm->bindParam(':reg_no', $_POST['reg_no']);
     $stm->bindParam(':type', $_POST['type']);
   
   if ($stmt->execute()){
        if($firstname=null|| $lastname=null || $reg_no=null){
            echo "please fill out all the fields";
        }
        else{
        echo "posted!";
    }
    }
   else{
   $stm->execute();
   if ($stm->rowCount() > 0) {
        echo "the  document's record has been registered!";
   }
}
    
} catch(PDOException $e){

    die("ERROR: Could not able to execute $sql. " . $e->getMessage());

}




?>
