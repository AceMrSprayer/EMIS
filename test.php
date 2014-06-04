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
	$sql = " { call procGetColumnsPerTable ( @tableName=? ) } ";
	$param1 = '"student"';
	$params = array(array(&$param1, SQLSRV_PARAM_IN));
	$stmt = sqlsrv_prepare($conn,$sql,$params);
	
	echo($stmt);
	exit();

	if ($stmt===false) {
	// handle error
	print_r(sqlsrv_errors,true);
	}else{
	if (sqlsrv_execute($stmt)===false) {
	// handle error. This is where the error happens
	print_r(sqlsrv_errors,true);
	}
	}
?>
       
	<?php
	
	$table = 'student';
	$params = array($table);
	
	$tsql = "CALL procGetColumnsPerTable (
	@tableName=$table
	)";
	//$tsql = "CALL procGetColumnsPerTable ($table);";
	$result = sqlsrv_query( $conn, $tsql, $params);
	
	// echo $tsql;
	// exit();
	
	

		
	while($itemArray= sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){	
	$test = $itemArray['TabelNaam'];
	
	echo $test;
	
	}
	
	// $sql= "EXEC procGetAllTables";
	
	// $stmt = sqlsrv_query( $conn, $sql);
	// if( $stmt === false ) {
		 // die( print_r( sqlsrv_errors(), true));
		 // }
		 
		 //var_dump($stmt);
	

	

	?>
</div>

	<!--Javascript includes!-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
<script>
</script>
</body>
</html>
