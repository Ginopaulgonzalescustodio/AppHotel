<?php
 include_once('DaoZona.php');

 class ControllerZona {
	
 function listar(){	 
	$dZona=new DaoZona();
	$lst=$dZona->listar();
	return $lst;
 }
  
 function ins($datos){ 
 	$dZona=new DaoZona();
	$ins=$dZona->insertar($datos);
	!$ins?$msg="REGISTRADO CORRECTAMENTE":$msg="NO SE HA REGISTRADO";
	return $msg;
  }
  
 } 
 

?>