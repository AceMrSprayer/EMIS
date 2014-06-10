<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 10-6-14
 * Time: 12:46
 */
require 'dbconnect.php';
session_start();
//Kijk of er al wat gepost is

if (isset($_POST['bookID'])) {

	//User id
    $user = $_POST['bookID'];
	
	//Delete query
	$sqlexec = "DELETE FROM users WHERE id = $user";
	sqlsrv_query($conn, $sqlexec);
	
	$sqlexec = "SELECT * FROM users WHERE id = $user";
	$results = sqlsrv_fetch(sqlsrv_query($conn, $sqlexec));

// als gelijk aan 1 dan klopt het.
if ($results == 0) {

        $_SESSION['success'] = 'Gebruiker is verwijderd';
        header('location: editUser.php');

    }
//Anders probeer het opnieuw
    else{
        if(!isset($_SESSION['fail']))	{
            $_SESSION['fail'] = 'De gebruiker kon niet verwijderd worden.';
        }
        header('location: editUser.php');
    }
}
?>