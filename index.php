<!DOCTYPE html>
<html lang="en">
<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 4-6-14
 * Time: 0:41
 */

ob_start();
require 'header.php';
require 'dbconnect.php';
session_start();

if(!isset($_SESSION['username'])){
	$_SESSION['fail'] = 'U bent nog niet ingelogd';
	header('location: login.php');	      
}
include 'header.php';
?>
  <body>
    <?php
	include 'navbar.php';
	?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Datacleansing Dashboard</h1>
        <p>Data opschonen in een hand omdraai!</p>
        
		<div class="knoppen">
		<!--<p><a class="btn btn-primary btn-lg" role="button">Home</a></p>-->

		</div>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      

      <hr>

      <footer>
        <p>&copy; EMIS 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>