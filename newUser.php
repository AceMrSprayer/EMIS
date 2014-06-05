<!DOCTYPE html>
<html lang="en">
<?php
	require 'dbconnect.php';
	session_start();
	include 'header.php';
?>
  <body>

    <?php
	include 'navbar.php';
	include 'jumbotron.php';
?>

    <div class="container" id="wrap">
	  <div class="row">
        <div class="col-md-8 col-md-offset-2">
				  <ul class="nav nav-tabs usernav">
				  <li class="active"><a href="newUser.php">Gebruiker toevoegen</a></li>
				  <li><a href="editUser.php">Gebruiker aanpassen</a></li>
				  </ul>
            <form action="doNewUser.php" method="POST" accept-charset="utf-8" class="newUserForm" role="form">   
			<legend><b>Nieuwe gebruiker</b></legend>
                    <h4>Vul hieronder de gegevens in.</h4>
					
					<?php
							if(isset($_SESSION['success'])){
								echo '<label for="message"><div class="alert alert-success"><b id="message">'.$_SESSION['success'].'</b></div></label>';
								unset($_SESSION['success']);
							}else if(isset($_SESSION['fail'])){
								echo '<label for="message"><div class="alert alert-danger"><b id="message">'.$_SESSION['fail'].'</b></div></label>';
								unset($_SESSION['fail']);
							}
						?>
                    <div class="row">
						
                        <div class="col-xs-6 col-md-4">
							<label for="firstname">Voornaam</label>
                            <input type="text" name="firstname" value="" class="form-control input-lg" placeholder="Voornaam"  required/> </div>
							
                        <div class="col-xs-6 col-md-5">
							<label for="lastname">Achternaam</label>
                            <input type="text" name="lastname" value="" class="form-control input-lg" placeholder="Achternaam"  required/>                        </div>
							<br/><br/><br/><br/>
                    </div>
					<label for="email">Email adres</label>
                    <input type="email" name="email" value="" class="form-control input-lg" placeholder="Email" required/>
					<br/><br/>
					<label for="newUserPassword">Minimaal 8 letters, 1 hoofdletter, 1 speciaal karakter en 1 nummer.</label>
					<input type="password" name="password" id ="newUserPassword" value="" class="form-control input-lg" placeholder="Wachtwoord" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" />
					<br/><br/>
					<label for="confirm password">Bevestig wachtwoord</label>
					<input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Bevestig wachtwoord" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" />  
					<br/><br/>         
                    <br/>
                    <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
                        Maak account aan</button>
            </form>          
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
  </body>
</html>