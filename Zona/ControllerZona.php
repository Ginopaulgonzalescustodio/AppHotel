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
	($datos[2]!=null||$datos[2]>0)?
		$ins=$dZona->actualizar($datos):
		$ins=$dZona->insertar($datos);
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