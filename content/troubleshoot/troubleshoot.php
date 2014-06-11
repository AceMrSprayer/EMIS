<!DOCTYPE html>
<html lang="en">
<?php
require 'dbconnect.php';
session_start();
include 'header.php';

include_once("files/classes/function.php");
$functions = new functions();
?>


<body>

<?php
include 'navbar.php';
include 'jumbotron.php';
?>

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
                printf('<tr><td onClick="makeRequest(\'%s\');">%s</td></tr> ', $value, $value);
            }
            ?>
        </table>    </div>
    <div id="placeholderProcedureCalls" class="row">
        <!-- Placeholder for switchable content of procedure calls -->
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../../files/js/bootstrap.min.js"></script>
<script>

    /* Request XMLHttp */
    function getXMLHttp()
    {
        var xmlHttp

        try {
            //Firefox, Opera 8.0+, Safari
            xmlHttp = new XMLHttpRequest();
        }
        catch(e) {
            //Internet Explorer
            try {
                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch(e) {
                try {
                    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch(e) {
                    alert("Your browser does not support AJAX!");
                    return false;
                }
            }
        }
        return xmlHttp;
    }

    function makeRequest(procName)
    {
        var xmlHttp = getXMLHttp();

        xmlHttp.onreadystatechange = function()
        {
            if(xmlHttp.readyState == 4)
            {
                document.getElementById('placeholderProcedureCalls').innerHTML = xmlHttp.responseText;
            }
        }

        xmlHttp.open("POST", "troubleshootContent.php", true);
        xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlHttp.send("procName="+procName);
    }

</script>
</body>
</html>