<?php
include 'connection.php';
try{
    $sql = "INSERT INTO registration (Name, Email,Type, DocNo) VALUES (:name, :email,:type, :doc)";

    $stmt = $conn->prepare($sql);
    // bind parameters to statement
    $name=$_POST['name'];
     $email=$_POST['email'];
      $doc=$_POST['doc'];

    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email',$_POST['email']);
     $stmt->bindParam(':type',$_POST['type']);
    $stmt->bindParam(':doc', $_POST['doc']);
    $verify="SELECT * FROM registration WHERE  Email=:email && Type=:type";
     $stm=$conn->prepare($verify); 
     $stm->bindParam(':email', $_POST['email']);
     $stm->bindParam(':type', $_POST['type']);
  $stm->execute();
  
  if($_POST['name']==null|| $_POST['email']==null || $_POST['doc']==null||$_POST['type']==null){
            echo "please fill out all the fields";
        }
        else if(preg_match('/\s/',$_POST['name']) || preg_match('/\s/',$_POST['email'])||preg_match('/\s/',$_POST['doc'])){
            echo "no white space allowed";

        }
      
        else if($stm->rowCount() > 0){
         echo "the  document's record has been registered!";
    }
   else{
   $stmt->execute();
   echo "registered!";
 }
    
   
} catch(PDOException $e){

    die("ERROR: Could not able to execute $sql. " . $e->getMessage());

}

//unset($pdo);
// Close connection
//header("Location: http://localhost/gisproject/map.php");
 //exit;


?>
