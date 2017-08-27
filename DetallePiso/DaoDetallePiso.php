<?php
 include_once('conexion/conexion.php');
 class DaoDetallePiso{
	
 public function buscar($id){
 $cnx = new conexion();
 $consulta = $cnx->consultar(
 "id_det_hab, nro_hab, hab_estado, eliminado, id_piso, id_tipo_habitacion,fu_bpiso(id_piso) piso, fu_btipohabitacion(id_tipo_habitacion) habitacion",
 "hotel.det_piso where id_piso=$id and eliminado='false'",true);
 $cnx->cerrarConexion();
 	return json_encode($consulta);
 }
 
	
 public function listar(){
 $cnx = new conexion();
 $consulta = $cnx->consultar(
 "id_det_hab, nro_hab, (case hab_estado when 'L' then 'success' when 'R' then 'warning' when 'A' then 'danger'end ) as hab_estado, hab_estado estadohabitacion, eliminado, id_piso, id_tipo_habitacion,fu_bpiso(id_piso) piso, fu_btipohabitacion(id_tipo_habitacion) habitacion",  "hotel.det_piso where eliminado='false' order by nro_hab",true);
 
 $cnx->cerrarConexion();
 	return $consulta;
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
?>