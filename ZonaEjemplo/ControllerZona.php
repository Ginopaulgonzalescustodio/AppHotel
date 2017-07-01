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
	$ins=="true"?$msg="REGISTRADO CORRECTAMENTE":$msg=$ins;
	return $msg;
  }
  
 } 
 

?>