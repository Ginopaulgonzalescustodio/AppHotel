<?php
 include_once('../conexion/conexion.php');
 class DaoAlquiler{
	 
 public function listar(){
 $cnx = new conexion();
 $consulta = $cnx->consultar("id_piso,nro_piso,cant_hab,nro_hab_inicial,fecha_registro,eliminado", "hotel.piso where eliminado='false'",true);
 $cnx->cerrarConexion();
 	return json_encode($consulta);
 }
 
 public function insertar($datos){
 	$msj="";$error="";
	$cnx = new conexion();
	$cnx->conexion->beginTransaction();
	$consulta = $cnx->agregar("hotel.piso","nro_piso,cant_hab,nro_hab_inicial", 
                           "?,?,?",
						   array(null,$datos[1],$datos[2],$datos[3]));
						   
	$cnx->conexion->commit();
	$cnx->cerrarConexion();
	return $consulta;
	}
 
 public function actualizar($datos){
 	$msj="";$error="";
	$cnx = new conexion();
	$consulta = $cnx->actualizar("hotel.piso","nro_piso=?,cant_hab=?,nro_hab_inicial=?", 
				array(null,$datos[1],$datos[2],$datos[3]),'id_habitacion='.$datos[0]);
	$cnx->cerrarConexion();
	return $consulta;
	}
 } 
 
 $daoAlquiler=new DaoAlquiler();
 echo $daoAlquiler->listar();
?>