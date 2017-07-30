<?php
include_once('DaoPiso.php');
class ControllerPiso {
	
 function listar(){	 
	$dao=new DaoPiso();
	$lst=$dao->listar();
	return $lst;
 }
  
 function ins($datos){
  	$dao=new DaoPiso();
	($datos[0]!=null||$datos[0]>0)?
		$ins=$dao->actualizar($datos):
		$ins=$dao->insertar($datos);
	if($ins=="true"){
		$err=0;
		$texto="REGISTRADO CORRECTAMENTE";
	}else{
		$err=$ins[0];
		$texto=$ins[2];
	}
	return json_encode(array('err'=>$err,'texto'=>$texto));
  }
  
 } 
?>