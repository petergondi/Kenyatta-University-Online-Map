<?php
session_start();

if (isset($_POST['search'])==true && empty($_POST['search'])==false){
try {
$dbh = new PDO("mysql:dbname=studentid;host=localhost", 'root', '');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
$search = $_POST['search'];
$query = "SELECT * FROM posted WHERE Reg_no=:search";
$stmt = $dbh->prepare($query);
$stmt->bindValue(':search', $search);
$stmt->execute();
if ($stmt->rowCount() > 0) { 
$result = $stmt->fetchAll();

foreach( $result as $row ) {
    // 
     echo json_encode($row);
     $id=$row["id"];
     $_SESSION['id']=$id;
}
} else {
}
 
}