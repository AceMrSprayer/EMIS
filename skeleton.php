<!DOCTYPE html>
<html lang="en">
<?php
	require 'dbconnect.php';
	session_start();
	include 'header.php'
?>
  

  <body>

    <?php
	include 'navbar.php';
	include 'jumbotron.php';
	?>    

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://templateplanet.info/tooltip.js"></script>
<script src="http://templateplanet.info/modal.js"></script>
<div class="container">
	<div class="row">
		
        
    <div class="col-md-8 col-md-offset-2">
		<a data-toggle="modal" data-id="ISBN" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">test</a>
		<a data-id="derp" data-toggle="modal" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">test</a>


		<div class="modal" id="addBookDialog">
		<div class="modal-header">
		<button class="close" data-dismiss="modal">×</button>
		<h3>Modal header</h3>

		</div>
		<div class="modal-body">
		<p>some content</p>
		<input type="text" name="bookId" id="bookId" value="" />
		</div>
		</div>
            
        </div>
	</div>
	 <?php
	  include 'footer.php';
	  ?>   
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
	$(document).on("click", ".open-AddBookDialog", function (e) {

    e.preventDefault();

    var _self = $(this);

    var myBookId = _self.data('id');
    $("#bookId").val(myBookId);

    $(_self.attr('href')).modal('show');
});</script>
	
  </body>
</html>