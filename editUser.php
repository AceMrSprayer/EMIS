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
					<?php
                    if(isset($_SESSION['success'])){
                    echo '<div class="alert alert-success message-content"><b>'.$_SESSION['success'].'</b></div>';
                    unset($_SESSION['success']);
                    }else if(isset($_SESSION['fail'])){
                    echo '<div class="alert alert-danger message-content"><b>'.$_SESSION['fail'].'</b></div>';
					unset($_SESSION['fail']);
                    }
                ?>		
			<label for="userTable">Beheer hier uw gebruikers.</label>
              <table id="userTable" class="table table-bordred table-striped">                   
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
		
		<tr id="parentElement'.$id.'">
		<td><input type="checkbox" class="checkthis" /></td>	
		<td>'.$id.'</td>
		<td>'.$email.'</td>
		<td>'.$firstname.'</td>
		<td>'.$lastname.'</td>
		<td><p><button data-id="'.$id.'" class="btn btn-primary btn-xs open-AddBookDialog" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
		<td><p><button data-id="'.$id.'" class="btn btn-danger btn-xs open-deleteDialog" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><span class="glyphicon glyphicon-trash"></span></button></p></td>
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
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#215;</button>
        <h4 class="modal-title custom_align" id="Heading">Bewerk gebruiker</h4>
      </div>
          <div class="modal-body">
		  <form action="doUpdateUser.php" method="POST" accept-charset="utf-8" role="form">
		  
					<?	$test = 'win';	?>
					
					<input type="hidden" id="bookId" value=""/>					 
					
					<label for="firstname">Voornaam</label>
					<input type="text" name="firstname"  id="firstnameElement" value="" class="form-control input-lg editForm" placeholder="Voornaam"  required/> 						
			   
					<label for="lastname">Achternaam</label>
					<input type="text" name="lastname" id="lastnameElement" value="" class="form-control input-lg editForm" placeholder="Achternaam"  required/>                       
					
					<label for="email">Email adres</label>
					<input type="email" name="email" id="emailElement" value="" class="form-control input-lg editForm" placeholder="Email" required/>							
					
					<label for="newUserPassword">Minimaal 8 letters, 1 hoofdletter, 1 speciaal karakter en 1 nummer.</label>
					<input type="password" name="password" id ="newUserPassword" value="" class="form-control input-lg editForm" editForm placeholder=" Nieuw wachtwoord" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" />
												
					<label for="confirm password">Bevestig wachtwoord</label>
					<input type="password" name="confirm_password" value="" class="form-control input-lg editForm" placeholder="Bevestig wachtwoord" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" />  
						   
					</div>
					<div class="modal-footer ">
					<button type="submit" class="btn btn-warning" style="width:100%"><span class="glyphicon glyphicon-ok-sign"></span> &nbsp; Update</button>
					</div>
				</div>					
		  </form>     
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&#215;</button>
        <h4 class="modal-title custom_align" id="Heading">Verwijder dit record.</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>Weet u zeker dat u dit record wilt verwijderen?</div>
       
      </div>
        <div class="modal-footer ">
			<form action="doDeleteUser.php" method="POST" accept-charset="utf-8" role="form">		
			 <input type="hidden" name="bookID" id="bookId" value=""/>				 	
			 <button type="submit" class="btn btn-warning">Ja</button>
			 <button type="button" data-dismiss="modal" class="btn btn-warning">Nee</button>
			</form>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
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
				$
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
<script>
	
	$(document).on("click", ".open-AddBookDialog", function () {
	    var myBookId = $(this).data('id');
        var parentElement = document.getElementById("parentElement"+myBookId);
        var childElements = parentElement.getElementsByTagName('td');
        for(var i = 1; i < (childElements.length-2); i++) {
            document.getElementById("firstnameElement").value = childElements[3].innerHTML;
            document.getElementById("lastnameElement").value = childElements[4].innerHTML;
            document.getElementById("emailElement").value = childElements[2].innerHTML;
        }
	});	
	
	$(document).on("click", ".open-deleteDialog", function () {
				var myBookId = $(this).data('id');
				$(".modal-footer #bookId").val( myBookId );			
		});	
		
</script>
  </body>
</html>