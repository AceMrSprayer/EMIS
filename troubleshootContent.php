<?php
require 'dbconnect.php';
session_start();
include 'header.php';

include_once("functions/function.php");
$functions = new functions();

?>

<legend>
    	 <?php
    		$procName = $_POST['procName']; 
        	$obj = $functions->callStoredProcedure("procGetParameters", "procCheckOperators", NULL, NULL, NULL, NULL);
        ?>
        	<table class='table table-hover' style='cursor: pointer;'>
            <?php
	            for($i = 0; $i < count($obj); $i++) {
	            	$value = $obj[$i]->PARAMETER_NAME;
	            	echo '
	            	<thead>	
	            		<tr>';
	            			printf('<th>\'%s\'</th>', $value, $value);
	            	echo'
	            		</tr>
	            	</thead>';

	                
	                if(strpos($value,'tabel') !== false){
	                	printf('<tr><td onClick="makeRequest(\'%s\');">%s</td></tr> ', $value, $value);
	                }

	                if(strpos($value,'kolom') !== false){
	                	printf('<tr><td onClick="makeRequest(\'%s\');">%s</td></tr> ', $value, $value);
	                }
	                if(strpos($value,'operator') !== false){
	                	printf('<tr><td onClick="makeRequest(\'%s\');">%s</td></tr> ', $value, $value);
	                }
	                
	            }
          	?>

          	<table class='table table-hover' style='width: 300px; cursor: pointer;float: right;'>
            <?php
	            for($i = 0; $i < count($obj); $i++) {
	                $value = $obj[$i]->PARAMETER_NAME;
	                if(strpos($value,'tabel') !== false){
	                	printf('<tr><td onClick="makeRequest(\'%s\');">%s</td></tr> ', $value, $value);
	                	
	                }

	                if(strpos($value,'kolom') !== false){
	                	printf('<tr><td onClick="makeRequest(\'%s\');">%s</td></tr> ', $value, $value);
	                }
	                if(strpos($value,'operator') !== false){
	                	printf('<tr><td onClick="makeRequest(\'%s\');">%s</td></tr> ', $value, $value);
	                }
	                
	            }
          	?>
    	
</legend>

