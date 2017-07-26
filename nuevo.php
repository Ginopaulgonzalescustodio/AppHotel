<?php
 $a='http://';
 $b=$_SERVER['SERVER_NAME'];
 $c=$_SERVER['SCRIPT_NAME'];
$e=explode("/",$c);
$f= "/".$e[1];
 $d='/indexPrincipal.php?label=Piso';
echo $texto=$a."".$b."".$f."".$d;

include $texto;
//include "http://".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."/indexPrincipal.php?label=Piso";  
//include 'http://localhost/apphotel/indexPrincipal.php?label=Piso'; 

?>