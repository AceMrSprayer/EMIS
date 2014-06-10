<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 4-6-14
 * Time: 0:41
 */
session_start();
ob_start();
require 'header.php';
require 'dbconnect.php';


 ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
<div class="container">
    <div class="row vertical-offset-100">

    	<?php

			$tsql_callSP = "{call dbo.procCheckOperators( ? , ? , ? , ? , ? )}";

			$tabel = 'docent';
			$kolom = 'gebdat';
			$operator = '>';  
			$param1 = '2000';
			$param2 = '0';

			$params = array(
				array($tabel,SQLSRV_PARAM_IN),
				array($kolom,SQLSRV_PARAM_IN),
				array($operator,SQLSRV_PARAM_IN),
				array($param1,SQLSRV_PARAM_IN),
				array($param2,SQLSRV_PARAM_IN)
			);   

			

			/* Execute the query. */  
			$stmt3 = sqlsrv_query( $conn, $tsql_callSP, $params);   
			//var_dump($stmt3);

			if( $stmt3 === false ) {       
			echo "Error in executing statement 3.\n";       
			die( print_r( sqlsrv_errors(), true)); }   

			while ($obj=sqlsrv_fetch_object($stmt3)) {       
				// SET PARAMETERS - SET TERMS      
				echo $obj->doc_nr;
				echo '</br>';
			}   

			/*Free the statement and connection resources. */  
			sqlsrv_free_stmt( $stmt3);  
		?>
	
<!-- 	<?php
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
?> -->
       
<!--	<?php
	
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
	

	

	?> -->
</div>

	<!--Javascript includes!-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
<script>
</script>
</body>
</html>
