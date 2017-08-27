<?php
 include_once('DaoCategoria.php');
 class ControllerCategoria {
	
 function listar(){	 
	$dao=new DaoCategoria();
	$lst=$dao->listar();
	return $lst;
 }
  
 function ins($datos){ 
 	$dao=new DaoCategoria();
	
	($datos[1]!=null||$datos[1]>0)?
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