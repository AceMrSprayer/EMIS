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
		<ul class="nav nav-tabs usernav">
			<li><a href="newUser.php">Gebruiker toevoegen</a></li>
			<li class="active"><a href="editUser.php">Gebruikers beheren</a></li>
		</ul>
        <legend><b>Beheer gebruiker</b></legend>
        <div class="table-responsive">     
			<label for="userTable">Beheer hier uw gebruikers.</label>
              <table id="mytable" class="table table-bordred table-striped">                   
                   <thead>                   
                   <th><input type="checkbox" id="checkall" /></th>
                   <th>#</th>
                    <th>Email</th>
                     <th>Voornaam</th>
                      <th>Achternaam</th>
                       <th>Edit</th>
					     <th>Delete</th>
                   </thead>
    <tbody>
	
	<?php
	
	
	$tsql = "SELECT * FROM users";
	$result = sqlsrv_query( $conn, $tsql);
	
	while($itemArray= sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC)){	
		$id = $itemArray['id'];
		$email = $itemArray['email'];
		$firstname = $itemArray['firstname'];
		$lastname = $itemArray['lastname'];
		
		echo'
		
		<tr>
		<td><input type="checkbox" class="checkthis" /></td>	
		<td>'.$id.'</td>
		<td>'.$email.'</td>
		<td>'.$firstname.'</td>
		<td>'.$lastname.'</td>
		<td><p><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
		<td><p><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
		</tr>  
		
		';
	}
	?>    
    
    </tbody>
        
</table>

<div class="clearfix"></div>

                
            </div>
            
        </div>
	</div>
	 <?php
	  include 'footer.php';
	  ?>   
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
	  
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Bewerk gebruiker</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
		  <?php
		  $test = 'herp';
		  ?>
        <input class="form-control " type="text" placeholder="Mohsin" value="<?php echo $test; ?>">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
			<form action="delete.php" method="POST" accept-charset="utf-8" role="form">
			<button type="button" class="btn btn-warning" ><span class="glyphicon-ok-sign"></span>Yes</button>
			</form>
			<button type="button" class="btn btn-warning" ><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
 $(function () {
            $("[rel='tooltip']").tooltip();
        });
</script>
  </body>
</html>