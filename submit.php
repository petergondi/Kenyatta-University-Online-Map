<?php
include 'connection.php';
try{
 
    $sql = "INSERT INTO users (name, Reg_no,type, terminal) VALUES (:name, :reg_no,:type, :terminal)";

$name=$_POST['name'];
$reg_no=$_POST['reg_no'];
$type=$_POST['type'];
$terminal=$_POST['terminal'];
    $stmt = $conn->prepare($sql);
    // bind parameters to statement
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':reg_no', $_POST['reg_no']);
     $stmt->bindParam(':type', $_POST['type']);
    $stmt->bindParam(':terminal', $_POST['terminal']);
    $verify="SELECT * FROM Users WHERE type=:type && Reg_no=:reg_no";
     $stm=$conn->prepare($verify);
     $stm->bindParam(':reg_no', $_POST['reg_no']);
     $stm->bindParam(':type', $_POST['type']);
   
   if ($stmt->execute()){
        if($name=="" || $reg_no==""){
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
