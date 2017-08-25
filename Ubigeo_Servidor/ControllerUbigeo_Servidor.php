<?php
 include_once('DaoUbigeo_Servidor.php');
 class ControllerUbigeo_Servidor {
	
 function listar(){	 
	$dUbigeo=new DaoUbigeo_Servidor();
	$lst=$dUbigeo->listar();
	return $lst;
 }
  
 function ins($datos){ 
 
 	$dUbigeo=new DaoUbigeo_Servidor();
	($datos[3]!=null||$datos[3]>0)?
		$ins=$dUbigeo->actualizar($datos):
		$ins=$dUbigeo->insertar($datos);
	if($ins=="true"){
		$err=0;
		$texto="REGISTRADO CORRECTAMENTE";
	}else{
		$err=$ins[0];
		$texto=$ins[3];
	}
	return json_encode(array('err'=>$err,'texto'=>$texto));
  }

 } 
?>