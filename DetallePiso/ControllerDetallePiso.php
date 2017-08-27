<?php
include_once('DaoAlquiler.php');
include_once('DaoPiso.php');
class ControllerAlquiler {
	
 function listar(){	 
	$dao=new DaoAlquiler();
	$lst=$dao->listar();
	return $lst;
 }

 function lst(){	 
	$dao=new DaoPiso();
	$lstPiso=$dao->listar();
	
	return json_encode(array('lstPiso'=>$lstPiso,'texto'=>$texto));
 }
  
 function ins($datos){
  	$dao=new DaoAlquiler();
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