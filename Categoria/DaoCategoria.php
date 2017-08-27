<?php
 include_once('conexion/conexion.php');
 class DaoCategoria {
	 
 public function listar(){
 $cnx = new conexion();
 $consulta = $cnx->consultar( "id_categoria,  upper(trim(cat_descripcion)) cat_descripcion, eliminado, fecha_registro", "almacen.categoria where eliminado='false'",true);
 $cnx->cerrarConexion();
 return json_encode($consulta);
 }
 
 public function insertar($datos){
 	$msj="";$error="";
	$cnx = new conexion();
 	$consulta = $cnx->agregar("almacen.categoria","cat_descripcion", 
                           "?",
						   array(null,utf8_encode(strtoupper(trim($datos[0])))));
 	$cnx->cerrarConexion();
	return $consulta;
	}
 
 public function actualizar($datos){
 	$msj="";$error="";
	$cnx = new conexion();
	$consulta = $cnx->actualizar("zona","descripcion=?,codigo=?", array(null,$datos[1],utf8_encode(trim($datos[0]))),'zonaid='.$datos[2]);
 //cerramos la coneccion
	$cnx->cerrarConexion();
 //enviamos los datos; como Jsonel envio de datos como json ahacen mas rapidoo el envio el acceso a los datos
 
	return $consulta;
	}
 } 
?>