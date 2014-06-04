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
    $user = mysql_real_escape_string($_POST['username']);
    $password = sha1(mysql_real_escape_string($_POST['password']));

//Check of de username en password matchen en in de DB zitten
    $query = mysql_query("SELECT email FROM users WHERE email = '$user' AND password = '$password'") or die (mysql_error());

    $total = mysql_num_rows($query);

//Als alles klopt wordt je ingelogd
    if($total > 0){

        $_SESSION['username'] = $user;
        $_SESSION['success'] = 'U bent nu ingelogd.';
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