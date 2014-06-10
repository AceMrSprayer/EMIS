<!DOCTYPE html>
<html lang="en">
<?php
require 'dbconnect.php';
session_start();
include 'header.php';

include_once("functions/function.php");
$functions = new functions();
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
        <legend>
            <b>Fouten opsporen en repareren</b>
        </legend>
        <?php

        $obj = $functions->callStoredProcedure("procGetProcedures", NULL, NULL, NULL, NULL, NULL);
        ?>
        <table class='table table-hover' style='width: 300px; cursor: pointer;'>
            <?php
            for($i = 0; $i < count($obj); $i++) {
                $value = $obj[$i]->sproc_name_with_schema;
                printf('<tr><td onClick="test(\'%s\');">%s</td></tr> ', $value, $value);
            }
            ?>
        </table>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    function test(procname) {
        alert(procname);
    }
</script>
</body>
</html>