<?php
 include_once('DaoUbigeo.php');
 class ControllerUbigeo {
	
 function listar(){	 
	$dUbigeo=new DaoUbigeo();
	$lst=$dUbigeo->listar();
	return $lst;
 }
  
 function ins($datos){ 
 
 	$dUbigeo=new DaoUbigeo();
	($datos[2]!=null||$datos[2]>0)?
		$ins=$dUbigeo->actualizar($datos):
		$ins=$dUbigeo->insertar($datos);
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