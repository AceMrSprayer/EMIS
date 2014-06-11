<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 5-6-14
 * Time: 0:41
 */
require 'dbconnect.php';
session_start();

//Kijk of er al wat gepost is
if (isset($_POST['email']) && isset($_POST['password'])) {
	
	$email = $_POST['email'];
	// Check of het email adres al bestaat
	$sqlexec = "SELECT email FROM users WHERE email = '$email'" ;
	$results = sqlsrv_fetch(sqlsrv_query($conn, $sqlexec));	
	
	//Als dat zo is redirect
	if ($results == 1) {		
        $_SESSION['fail'] = 'Email in gebruik.';        
        header('location: newUser.php');
		die();
	}else{
	
	//Posts
	$firstname = $_POST['firstname'];
	$lastname =  $_POST['lastname'];
	
	//Check password en hash als het klopt.
	if($_POST['password'] == $_POST['confirm_password']){
    $password = sha1($_POST['password']);	
	}else{
		$_SESSION['fail'] = 'Uw wachtwoorden zijn niet gelijk';		
		header('location: newUser.php');
		die();
	}
	
	//Insert nieuwe user
	$sql = "INSERT INTO USERS VALUES ('$email', '$firstname', '$lastname', '$password')" ;	
	sqlsrv_query($conn, $sql);
	
	//Check of deze erin staat.
	$sqlexec = "SELECT email FROM users WHERE email = '$email' AND password = '$password'" ;
	$results = sqlsrv_fetch(sqlsrv_query($conn, $sqlexec));

// Check results
if ($results == 1) {
        $_SESSION['success'] = 'Nieuwe account is aangemaakt.';
        header('location: newUser.php');
		die();
    }
//Anders probeer het opnieuw
    else{        
            $_SESSION['fail'] = 'Problemen met het toevoegen van een account.';
            header('location: newUser.php');
			die();
    }
	}
}
?>