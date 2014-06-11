<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 10-6-14
 * Time: 13:04
 */
require 'dbconnect.php';
session_start();

//Kijk of er al wat gepost is
if (isset($_POST['email']) && isset($_POST['password'])) {
	
	//Posts
	$id = $_POST['bookId'];	
	$email = $_POST['email'];	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	
	//Check password en hash als het klopt.
	if(isset($_POST['password']) AND isset($_POST['confirm_password'])){
		if($_POST['password'] == $_POST['confirm_password']){		
			$password = sha1($_POST['password']);	
			}else{
				$_SESSION['fail'] = 'Uw wachtwoorden zijn niet gelijk';		
				header('location: editUser.php');
				die();		
	}
	}
	
	if(!isset($password)){
		$sql = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email' WHERE id = $id";
		sqlsrv_query($conn, $sql);
		
		//Check de gegevens
		$sqlexec = "SELECT email FROM users WHERE firstname = '$firstname' AND lastname = '$lastname' AND email = '$email'" ;
		$results = sqlsrv_fetch(sqlsrv_query($conn, $sqlexec));
		
		echo $sqlexec;
		exit();
		
	}else{
		$sql = "UPDATE users SET firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password' WHERE id = $id";
		sqlsrv_query($conn, $sql);
		
		//Check de gegevens
		$sqlexec = "SELECT email FROM users WHERE firstname = '$firstname' AND lastname = '$lastname' AND email = '$email'AND password = '$password'" ;
		$results = sqlsrv_fetch(sqlsrv_query($conn, $sqlexec));
	}
	
	

// Check results
if ($results == 1) {
        $_SESSION['success'] = 'De account is bijgewerkt.';
        header('location: editUser.php');
		die();
    }
//Anders probeer het opnieuw
    else{        
            $_SESSION['fail'] = 'Er is iets fout gegaan bij het bewerken.';
            header('location: editUser.php');
			die();
    }
	}

?>