<?php
 include_once('conexion/conexion.php');// llamamos a nuestro archivo de conexion
 
 class DaoUbigeo {//creamos la clase el mismo nombre del archivo - Empezar con DaoTabla
	 
 public function listar(){ //Metodo o funcion para listar
 //abrimos conexion
 $cnx = new conexion();
 //CONSULTAR (atribtos que deseamos listar , tabla , siempre true para que nos envia como json);
 $consulta = $cnx->consultar( "ubigeo_id, upper(trim(ubigeo_pais)) ubigeo_pais,upper(trim(ubigeo_departamento)) ubigeo_departamento,upper(trim(ubigeo_provincia)) ubigeo_provincia,upper(trim(ubigeo_distrito)) ubigeo_distrito,ubigeo_eliminado, fecha_registro", "ubigeo where ubigeo_eliminado='false'",true);
 //cerramos la coneccion
 $cnx->cerrarConexion();
 //enviamos los datos; como Jsonel envio de datos como json ahacen mas rapidoo el envio el acceso a los datos
	return json_encode($consulta);
 }
 
 public function insertar($datos){ //Metodo o funcion para listar
 //abrimos conexionecho "ddd";
	$msj="";$error="";
	$cnx = new conexion();
 //CONSULTAR (atribtos que deseamos listar , tabla , siempre true para que nos envia como json);
	$consulta = $cnx->agregar("ubigeo","ubigeo_pais,ubigeo_departamento,ubigeo_provincia,ubigeo_distrito", 
                            "?,?,?,?",
						   array(null,utf8_encode(trim($datos[4])),$datos[0],$datos[1],$datos[2]));
 //cerramos la coneccion
	$cnx->cerrarConexion();
 //enviamos los datos; como Jsonel envio de datos como json ahacen mas rapidoo el envio el acceso a los datos
	return $consulta;
	}
 
 public function actualizar($datos){
 	$msj="";$error="";
	$cnx = new conexion();
	$consulta = $cnx->actualizar("ubigeo","ubigeo_pais=?,ubigeo_departamento=?,ubigeo_provincia=?,ubigeo_distrito=?", array(null,$datos[4],$datos[0],$datos[1],$datos[2],'ubigeo_id='.$datos[3]));
 //cerramos la coneccion
	$cnx->cerrarConexion();
 //enviamos los datos; como Jsonel envio de datos como json ahacen mas rapidoo el envio el acceso a los datos
 
	return $consulta;
	}
 } 
?>