<?php
ob_start();
session_start();

    include("config.php");
    require("dbconnect.php");
    
    
    
	$tsql = mysql_query("SELECT * FROM category");
	
	$user = $_SESSION['username'];
	$xsql = mysql_query("SELECT validated FROM users WHERE user = '$user'");
	$row = mysql_fetch_row($xsql);
	$validated = $row[0];
	    
	if($validated != 1){		
		session_destroy();
		$_SESSION['fail'] = "Je bent niet geautoriseerd om in te loggen. Neem contact op met de administrator.";
		header('location: login.php');
	}
	
if(isset($_SESSION['username'])){

echo '
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
'; echo include 'header.php'; echo'

<body>
<div style="padding: 20px 0 0 0"></div><div class="container" id="hoofd-container" style="padding: 5px 0 0 0">

      
<div class="row">
  <div class="container admin-container">
  
  <div class="col-md-3 col-xl-3 foto-text">
        <h3>Foto&#8216;s uploaden</h3>
        <p>Hier kan je foto&#8216;s uploaden. Dit kunnen 1 of meerdere foto&#8216;s zijn. Als je deze foto&#8216;s hebt geselecteerd kan je een album kiezen en het daarin uploaden. </p>
        <hr>
        
        <h3>Nieuw Album toevoegen</h3>
        <p>Hiermee kan je een nieuw album toevoegen.</p>
 </div>

    <div class="col-md-7 col-xl-7 admin-nav">
	
  '; echo include 'admin-nav.php'; echo'  
  
      <form enctype="multipart/form-data" action="postArtikel.php" method="POST">
            <label for="file">Selecteer foto&#8216;s: </label><input required type="file" id="file" name="files[]" multiple="multiple" accept="image/*" /><br />
<label for="album">Selecteer album:</label><select class="form-control" name="eventid" id="album">
    '; 
	$sql = mysql_query("SELECT * FROM album ORDER BY id DESC");
        while($row = mysql_fetch_array($sql)) {
            echo '<option value="'.$row['title'].'">'. $row['title'].'</option>';
        };
		
		
    echo'
		</select><br />
		
            <input type="submit" class="btn btn-success"/><br />
    </form><hr>
    
    <form method="POST" action="">
    <label for="nieuw-soort">Nieuw album: </label><input class="form-control" type="text" required name="newAlbum" id="newAlbum" placeholder="Album naam"></input></br>
    
	<label for="category">Selecteer categorie:</label>
    <select class="form-control" id="category" name="category" required>
    '; 
        while($row = mysql_fetch_array($tsql)) {
            echo '<option value="'.$row['category'].'">'. $row['category'].'</option>';
        };
    echo'
</select>
<br />
		<label for="content">Schrijf hier het artikel:</label>
		<textarea required name="content" id="content" class="form-control myTextEditor">Voor hier wat commentaar in.</textarea>
		<br />

	<input type="submit" class="btn btn-success"/>
    
	</form>
	'; 
       if ($_SERVER['REQUEST_METHOD']== "POST") { 
        
		$username = $_SESSION['username'];		
        $title = str_replace(' ', '', $_POST['newAlbum']); 
		$category = $_POST['category'];
        $date = date('Y-m-d');
		$commentaar = $_POST['content'];
		$realtitle = $_POST['newAlbum'];
        
		$baanFilter = mysql_query("SELECT title FROM album WHERE title = '$title'");
		$id = mysql_fetch_row($baanFilter);

		if($id == NULL){
        mysql_query("INSERT INTO album (id, author, realtitle, title, date, category, commentaar) VALUES ( '', '$username', '$realtitle', '$title', '$date', '$category', '$commentaar')") or die (mysql_error());
		$_SESSION['success'] = "Er is een nieuw album toegevoegd!"; 
		}else{
		$_SESSION['fail'] = "Het album bestaat al.";
		}        
		header('location: admin2.php');
        die();
        };
		
		if(isset($_SESSION['success'])){
                    echo '<br /><div class="alert alert-success"><b>'.$_SESSION['success'].'</div>';
                    unset($_SESSION['success']);
                    }else if(isset($_SESSION['fail'])){
                        echo '<div class="alert alert-danger">'.$_SESSION['fail'].'</div>';
						unset($_SESSION['fail']);
                    };
    echo'
	
     </div>
    </div>
  </div>
</div>
</div>

    <!--Javascript includes!-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
 ';}else{
	
	header('location: login.php');
 }
?>
