<?php
 include_once('DaoProducto.php');
 class ControllerProducto {
 public $clsDao="DaoProducto";	
 
 function listar(){	 
	$dao=new $this->clsDao();
	$lst=$dao->listar();
	return $lst;
 }
 
 function cmbListar(){	 
	$dao=new $this->clsDao();
	$lst=$dao->cmbListar();
	return $lst;
 }
 
 
 function ins($datos){ 
 	$dao=new $this->clsDao();
	
	($datos[3]!=null||$datos[3]>0)?
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