<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 4-6-14
 * Time: 0:41
 */
require 'dbconnect.php';
session_start();
//Kijk of er al wat gepost is

if (isset($_POST['username']) && isset($_POST['password'])) {

//Clean de posts
    $user = $_POST['username'];
    $password = sha1($_POST['password']);
	
	// echo $password;
	// echo $user;
	// exit();
	
	$sqlexec = "SELECT email FROM users WHERE email = '$user' AND password = '$password'" ;
	$results = sqlsrv_fetch(sqlsrv_query($conn, $sqlexec));

// als gelijk aan 1 dan klopt het.
if ($results == 1) {

        $_SESSION['username'] = $user;
        header('location: index.php');

    }
//Anders probeer het opnieuw
    else{
        if(!isset($_SESSION['fail']))	{
            $_SESSION['fail'] = 'Uw wachtwoord of gebruikersnaam is incorrect';
        }
        header('location: login.php');
    }
}
?>