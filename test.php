<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 4-6-14
 * Time: 0:41
 */

ob_start();
require 'header.php';
require 'dbconnect.php';
session_start();
 ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
<div class="container">
    <div class="row vertical-offset-100">
       
	<?php
	
	$table = 'student';
	
	//Execute procedure
	$tsql = "EXEC procGetAllTables";
	//Voer sql code uit
	$result = sqlsrv_query( $conn, $tsql);
	
	//Loop de resultaten
	while($itemArray= sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){	
		echo  $itemArray['TabelNaam'];	
		echo '<br/>';
	}
	
	?>
</div>

	<!--Javascript includes!-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
<script>
</script>
</body>
</html>
