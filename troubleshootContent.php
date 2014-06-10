<?php
require 'dbconnect.php';
session_start();
include 'header.php';

include_once("functions/function.php");
$functions = new functions();

?>

<legend>
    <b><?php echo $_POST['procName']; ?></b>
</legend>