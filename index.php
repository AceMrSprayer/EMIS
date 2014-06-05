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
?>

  <body>

     
  <?php
  include 'navbar.php';
  include 'jumbotron.php';
  ?>

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