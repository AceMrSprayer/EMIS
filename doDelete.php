<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 5-6-14
 * Time: 0:41
 */
require 'dbconnect.php';
session_start();
	
	//Get id voor het verwijderen van de gebruiker.
	$id = $_GET['id'];

	$sqlexec = "DELETE FROM users WHERE id = $id" ;
	$results = sqlsrv_fetch(sqlsrv_query($conn, $sqlexec));

// Als de querie een resultaat terug krijgt
if ($results == 1) {
		$_SESSION['delete'] = 'Gebruiker is succevol verwijderd.';
        header('location: editUser.php');
    }
//Anders probeer het opnieuw
    else{        
		$_SESSION['fail'] = 'De gebruiker kon niet verwijderd worden.';     
        header('location: editUser.php');
    }
}
?>