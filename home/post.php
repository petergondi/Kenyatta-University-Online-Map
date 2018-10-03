<?php
include 'connection.php';
try{
 
    $sql = "INSERT INTO posted (firstname,lastname,Reg_no,type, terminal) VALUES (:firstname,:lastname, :reg_no,:type, :terminal)";

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$reg_no=$_POST['reg_no'];
$type=$_POST['type'];
$terminal=$_POST['terminal'];
    $stmt = $conn->prepare($sql);
    // bind parameters to statement
    $stmt->bindParam(':firstname', $_POST['firstname']);
     $stmt->bindParam(':lastname', $_POST['lastname']);
     $stmt->bindParam(':type', $_POST['type']);
      $stmt->bindParam(':reg_no', $_POST['reg_no']);
    $stmt->bindParam(':terminal', $_POST['terminal']);
    $verify="SELECT * FROM posted WHERE type=:type && Reg_no=:reg_no";
     $stm=$conn->prepare($verify);
     $stm->bindParam(':reg_no', $_POST['reg_no']);
     $stm->bindParam(':type', $_POST['type']);
   $stm->execute();
   
        if($_POST['firstname']==null|| $_POST['lastname']==null || $_POST['reg_no']==null||$_POST['type']==null){
            echo "please fill out all the fields";
        }
       
        else if($_POST['type']=="National Id" && !preg_match("/^[0-9]{8}$/", $_POST['reg_no'])){
            
    echo "Not a valid National Id no.";
}
 else if($_POST['type']=="Student Id" && (!preg_match("/^[0-9]{4}$/", $_POST['reg_no'])||$_POST['type']=="Exam Card" && !preg_match("/^[0-9]{4}$/", $_POST['reg_no']))||($_POST['type']=="Credit Card"&&!preg_match("/^[0-9]{16}$/", $_POST['reg_no']))||($_POST['type']=="ATM Card"&&!preg_match("/^[0-9]{10,14}$/", $_POST['reg_no']))||($_POST['type']=="ATM Card"&&!preg_match("/\[0-9]+[a-zA-Z]+|[a-zA-Z]+[0-9]+/", $_POST['reg_no']))){
            
    echo "Enter correct"." ".$_POST['type']." "."format";
}
 else if(preg_match('/\s/',$_POST['firstname']) || preg_match('/\s/',$_POST['lastname'])){
            echo "no white space allowed";

        }
   else if($stm->rowCount() > 0){

        echo "the  document's record has been registered!";
   }
else{
    $stmt->execute();
    echo "Document posted";

      $sendmail="SELECT * FROM registration WHERE DocNo=:reg_no";
       $st=$conn->prepare($sendmail);
       if ($st->rowCount() > 0) { 
$result = $st->fetchAll();

foreach( $result as $row ) { 
     $name= $row['Name'];
     $email= $row['Email'];
     $identity= $row['DocNo'];
}
  $msg = "Dear:".$name."\nPlease pick your".$type."document from:".$terminal;
$msg = wordwrap($msg,70);
mail($email,"Found Document:",$msg);
}
}
    
} catch(PDOException $e){

    die("ERROR: Could not able to execute $sql. " . $e->getMessage());

}




?>
