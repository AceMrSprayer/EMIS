<?php
        function testProc($conn, $table){
            $query = 'CALL procGetColumnsPerTable(
                        \''.$table.'\'
                        );';
			$result = sqlsrv_query($conn, $query);
			
			while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_NUMERIC) ) {
      echo $row[0]."<br />";
}
			echo $query;
			echo '<br/><br/>';
			 if( $result === false ) {
				die( print_r( sqlsrv_errors(), true));
			}
            
        }
?>