<!DOCTYPE html>
<html> 
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no">
    <title>GEOTRACK-KU</title> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

   <style type="text/css">

    #header{ height: 1.7em; text-align: center; font-size: 1.1em;border-radius: 25px;}
    ul {
    list-style-type: none;
    padding: 0;
    overflow: hidden;
    background-color: #333;
   margin: 0;    
}
li {
    float: right;
}
li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 11px 18px;
    text-decoration: none;
}
li a:hover:not(.active) {
    background-color: #111;
}
.active {
    background-color: #4CAF50;
}

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin-left: 400px;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 1px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 1px;
    padding-bottom: 1px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
#results{
	text-align: center;
	top:600px;
}
#time{
bottom:50px;
text-align: center;
}
table, td, th {
    border: 3px solid gray;
}

table {
    border-collapse: collapse;
    width: 80%;
    margin-left: 200px;

}
th{
  background: black;
  color:white;
  text-align: center;
}
tr:nth-child(even) {background: #CCC}
tr:nth-child(odd) {background: #FFF}


</style>
</head>
<div id="header"
       data-dojo-type="dijit/layout/ContentPane" 
           data-dojo-props="region:'top'">
           <strong><ul>
  <li><a class="active" href="index.php"><span style="font-size: 17px; color: black;font-family: Arial;">Home</span></a></li>
     
  <li><a href="map.php">Campus Map</a></li>
  
  <a href=""><div style="float:left" ><img src="p.png"height="47" width="50"><span style="font-size: 24px !important; color:chocolate;font-family: Arial;">GEOTRACK-KU</span></div></a>
 <input type="button" style="margin-top: 9px;float:right; border-color: black;border-radius: 7px;" onclick="printDiv('printableArea')" value="Print Records" />
  
  </div>
  
  </body>
  <div id="printableArea">

  <h2 style="text-align:center"><font color='black'>Documents Collected</font></h2>
  <?php 

include 'connection.php';
try{
	 $array = array("PML","Gate C","Graduate School","KUCC","Chandaria","Foreign Languages","Admin Block","International Center","Swimming Pool","Security Office","Nyayo Gate","Huduma Center","KM Gate","Main Gate");
         
         foreach( $array as $value ) {

         
    $sql = "SELECT * FROM posted WHERE terminal='$value'";
    $total="SELECT * FROM posted";
    $stmt = $conn->prepare($sql);
    $stm=$conn->prepare($total);
$stm->execute();
   $stmt->execute();
   $final=$stm->rowCount();
    //$result=$stmt->fetchAll();
$results=$stmt->rowCount();
 //echo "Documents collected at $value: $results <br />";

 echo "<table id='customers'>
<tr> 
 <th>Document Terminal </th>
<th>Documents Collected</th> 
  </tr>";
  echo "<tr>";
  echo "<td>";echo $value; echo "</td>";
  echo "<td>";echo $results; echo "</td>";
  

  echo "</tr>";


echo "</table>";
}

//echo "Total Documents Collected".$final."<br>";
//echo "Record as at:".date("l jS \of F Y h:i:s A");


} catch(PDOException $e){

    die("ERROR: Could not able to execute $sql. " . $e->getMessage());

}

  $servername = "localhost";
$username = "root";
$password = "";
    $conn = new PDO("mysql:host=$servername;dbname=studentid", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
 
    $all="SELECT * FROM posted";
    $view = $conn->prepare($all);  
$view->execute();
   ?>
   <div id='results'><h4><b><?php echo "Total Documents Collected:".$final."<br>";?></h4></div>
 <div id='time'><h5><?php echo "Record as at:".date("l jS \of F Y h:i:s A")."<br>";?></h5></div>
</div>
<h2 style="text-align: center;">All Records</h2>
<div><table >
    <thead>
        <tr>
             <th></th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Document Number</th>
             <th>Type</th>
            <th>Terminal</th>
            <th>Date</th>
            <th>Days Kept</th>
            <th>Remove</th>
            
        </tr>
    </thead>
    <tbody>
       <?php
            $i=1;
            
        
        
        while($records = $view->fetch()) : ?>
        <tr>
            <!--Each table column is echoed in to a td cell-->
           
           <td><?php echo $i; $i += 1; ?></td>
            <td><?php echo $records['firstname']; ?></td>
            <td><?php echo $records['lastname']; ?></td>
            <td><?php echo $records['Reg_no']; ?></td>
            <td><?php echo $records['type']; ?></td>
            <td><?php echo $records['terminal']; ?></td>
            <td><?php echo $records['Date']; ?></td>
            <td><?php $date1=$records['Date'];
             $date2=date("l jS \of F Y h:i:s A");
           $diff = abs(strtotime($date2) - strtotime($date1));
$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
if ($days>10 && ($records['type']=="Student Id"||$records['type']=="Exam Card")) {
  echo '<i style="color:red;font-size:15px;font-family:calibri ;  border-radius: 50%;
    behavior: url(PIE.htc);

    width: 16px;
    height: 16px;
    padding: 4px;
    
    background: #fff;
    border: 2px solid #666;
    color: red;
    text-align: center; ">'.$days.'</i> ';
}
else{
  printf($days);
}


?></td>
<td><button style="color:red; width:80px; margin-left: 25px;">delete</button></td>
        </tr>
        <?php endwhile ?>
    </tbody>
</table></div>
</body>
<script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

  </html>