<?php
 $pdo = new PDO("mysql:host=localhost;dbname=studentid", "root", "");
 // Set the PDO error mode to exception

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "SELECT * FROM download";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo "<table>";
    while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
    	echo"<tr>";
    	echo"<td>";echo $result['name'];echo"</td>";
    	echo"<td>";?> <a href="<?php echo $result['path']; ?>"><form action="save.php" method="post">
           <input type="submit" name="submit" value="Download Gate Pass" />
       </form></a> <?php echo"</td>";
    	echo"</tr>";
    }
    echo "</table>";

    
    ?>
    