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
	if($ins=="true"){
		$err=0;
		$texto="REGISTRADO CORRECTAMENTE";
	}else{
		$err=1;
		$texto=$ins;
	}
	return json_encode(array('err'=>$err,'texto'=>$texto));
  }

 } 
?>