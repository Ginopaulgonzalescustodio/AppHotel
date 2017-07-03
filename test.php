<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
            jQuery('#test').ready(function(){
  
                jQuery('#log').ajaxStart(function() {
                    jQuery(this).append('ajaxStart<br />');
                });
  
                jQuery('#log').ajaxSend(function() {
                    jQuery(this).append('ajaxSend<br />');
                });
  
                jQuery('#log').ajaxSuccess(function() {
                    jQuery(this).append('ajaxSuccess<br />');
                });
  
                jQuery('#log').ajaxError(function() {
                    jQuery(this).append('ajaxError<br />');
                });
  
                jQuery('#log').ajaxComplete(function() {
                    jQuery(this).append('ajaxComplete<br />');
                });
  
                jQuery('#log').ajaxStop(function() {
                    jQuery(this).append('ajaxStop<br />');
                });
  
                jQuery('#test').load('server.php');
                jQuery('#test').load('no_existe.php');
  
            });
  
        </script>
  
        <style type="text/css">
            #test{
                border: solid #000 1px;
                width:300px;
                height: 350px;
                overflow: auto;
            }
        </style>
  
    </head>
    <body>
  
        <div id="log"></div>
  
        <div id="test">contenido inicial</div>
  
    </body>
</html>