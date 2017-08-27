<?php
 include_once('conexion/conexion.php');
 class DaoPrecioTipoHab{
	
 public function buscarXTipoHab($datos){
	$cnx = new conexion();
	$consulta = $cnx->consultar(
	"id_precio_tipo_habitacion, case '".$datos[1]."' when 'N' then precio_dia 
		when 'H' then precio_hora end as precio, precio_dia, precio_hora, eliminado, id_tipo_habitacion",
	"hotel.precio_tipo_habitacion where id_tipo_habitacion=$datos[0] and eliminado='false'",false);
	$cnx->cerrarConexion();
	return $consulta;
 }
 
	
 public function listar(){
 $cnx = new conexion();
 $consulta = $cnx->consultar(
 "id_det_hab, nro_hab, (case hab_estado when 'L' then 'success' when 'R' then 'warning' when 'A' then 'danger'end ) as hab_estado, eliminado, id_piso, id_tipo_habitacion,fu_bpiso(id_piso) piso, fu_btipohabitacion(id_tipo_habitacion) habitacion", 
 "hotel.det_piso where eliminado='false' order by nro_hab",true);
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