<?php
/**
 * Created by PhpStorm.
 * User: Frank
 * Date: 4-6-14
 * Time: 0:41
 */

ob_start();
require '../../header.php';
require '../dbconnect.php';
session_start();
if(isset($_SESSION['username'])){
    $_SESSION['success'] = "Welkom terug.";
    header('location: ../../index.php');
}
 ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">

<body style=" background: url(http://mymaplist.com/img/parallax/back.png);
    background-color: #444;
    background: url(http://mymaplist.com/img/parallax/pinlayer2.png),url(http://mymaplist.com/img/parallax/pinlayer1.png),url(http://mymaplist.com/img/parallax/back.png);">
<script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>

<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign in</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" method="POST" role="form" action="content/user/doLogin.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="username" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me"> Remember Me
                                </label>
                            </div>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                        </fieldset>
                    </form>
                </div>
                <?php

                    if(isset($_SESSION['success'])){
                    echo '<div class="alert alert-success message-content"><b>'.$_SESSION['success'].'</div>';
                    unset($_SESSION['success']);
                    }else if(isset($_SESSION['fail'])){
                    echo '<div class="alert alert-danger message-content">'.$_SESSION['fail'].'</div>';
					unset($_SESSION['fail']);
                    }
                ?>
            </div>

        </div>

    </div>

</div>

	<!--Javascript includes!-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="files/js/bootstrap.js"></script>
<script>
$(document).ready(function(){
$(document).mousemove(function(e){
TweenLite.to($('body'),
.5,
{ css:
{
backgroundPosition: ""+ parseInt(event.pageX/8) + "px "+parseInt(event.pageY/'12')+"px, "+parseInt(event.pageX/'15')+"px "+parseInt(event.pageY/'15')+"px, "+parseInt(event.pageX/'30')+"px "+parseInt(event.pageY/'30')+"px"
}
});
});
});
</script>
</body>
</html>
