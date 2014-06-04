<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

        <?php
            require 'dbconnect.php';
        ?>
<html xmlns="http://www.w3.org/1999/xhtml">

<html>
<head>
    <rel="stylesheet" type="text/css" href="css/main.css" />
    <meta http-equiv="content-type" content="text/php; charset=utf-8" />

    <title>Site Template - Welcome!</title>
</head>

<body>
<div class="Container">
    <div class="Header">

    </div>

    <div class="Body">
        <form action="javascript:void(0);">
            <input type="text" id="q" name="q"/>
        </form>
        <div class="search_item">
            <h4 class="search_text">Item 1</h4>
            <p>Some more info about Item 1</p>
        </div>
        <div class="search_item">
            <h4 class="search_text">Item 2</h4>
            <p>Some more info about Item 2</p>
        </div>
        <div class="search_item">
            <h4 class="search_text">Item 3</h4>
            <p>Some more info about Item 3</p>
        </div>
    </div>
</div>

<script>
    $().ready(function(){
        // Instant Search
        $('#q').keyup(function(){
            $('.search_item').each(function(){
                var re = new RegExp($('#q').val(), 'i')
                if($(this).children('.search_text')[0].innerHTML.match(re)){
                    $(this).show();
                }else{
                    $(this).hide();
                };
            });
        });
    });
</script>
</body>

<footer>
    <div class="Footer">
        <b>Copyright - 2010</b>
    </div>
</footer>
</html>