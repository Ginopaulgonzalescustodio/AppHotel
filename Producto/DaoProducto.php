<?php
 include_once('conexion/conexion.php');
 
 class DaoProducto {
 public $tbl="producto";	
 
 public function listar(){
 $cnx = new conexion();
 $consulta = $cnx->consultar( "id_producto,  upper(trim(descripcion)) descripcion, eliminado, fecha_registro,precio", "almacen.".$this->tbl." where eliminado='false'",true);
 $cnx->cerrarConexion();
 return json_encode($consulta);
 }
 
 public function cmbListar(){
 $cnx = new conexion();
 $consulta = $cnx->consultar( "id_producto as value,  upper(trim(descripcion)) as label, eliminado, fecha_registro,precio", "almacen.".$this->tbl." where eliminado='false'",true);
 $cnx->cerrarConexion();
 return json_encode($consulta);
 }

 
 public function insertar($datos){
 	$msj="";$error="";
	$cnx = new conexion();
 	$consulta = $cnx->agregar("almacen.".$this->tbl,"id_categoria,descripcion,precio", 
                           "?,?,?",
						   array(null,$datos[0],utf8_encode(strtoupper(trim($datos[1]))),$datos[2]));
 	$cnx->cerrarConexion();
	return $consulta;
	}
 
 public function actualizar($datos){
 	$msj="";$error="";
	$cnx = new conexion();
	$consulta = $cnx->actualizar($this->tbl,"descripcion=?,codigo=?", array(null,$datos[1],utf8_encode(trim($datos[0]))),'zonaid='.$datos[2]);
 //cerramos la coneccion
	$cnx->cerrarConexion();
 //enviamos los datos; como Jsonel envio de datos como json ahacen mas rapidoo el envio el acceso a los datos
 
	return $consulta;
	}
 } 
?>