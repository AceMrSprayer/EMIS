<?php
$serverName = "localhost"; //serverName\instanceName, portNumber (default is 1433)
$connectionInfo = array( "Database"=>"EMIS", "UID"=>"sa", "PWD"=>"badoer13");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( !$conn ) {
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>



