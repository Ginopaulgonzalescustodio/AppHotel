<?php
 include_once('conexion/conexion.php');
 class DaoAlquiler{
	 
 public function listar(){
 $cnx = new conexion();
 $consulta = $cnx->consultar("id_piso,nro_piso,cant_hab,nro_hab_inicial,fecha_registro,eliminado", "hotel.piso where eliminado='false'",true);
 $cnx->cerrarConexion();
 	return json_encode($consulta);
 }
 
 public function buscar($datos){
	 
 $cnx = new conexion();
 $consulta = $cnx->consultar(
 "id_alquiler, fecha_ingreso, fecha_salida, hora_ingreso, hora_salida, 
       fecha_registro, precio_total, eliminado, precio_unitario, cantidad, 
       tipo_servicio, tipo_pago, id_det_hab, id_persona, fu_bcliente(id_persona) as cliente,fu_bdocumento(id_persona) as dni,fu_bcorreo(id_persona) as correo,   estado_alquiler", 
	   "hotel.alquiler	where  estado_alquiler='A' and id_det_hab=$datos[0] order by fecha_registro desc limit 1",
	   true);
 $cnx->cerrarConexion();
 	return json_encode($consulta);
 }
 
 	 
 public function listaProductosAlquiler($datos){
	 
 $cnx = new conexion();
 $consulta = $cnx->consultar(
 "id_alquiler_det_prod, p.id_producto, p.descripcion as producto, cantidad, precio_unitario,  
  cancelo, al_det.fecha_registro, al_det.eliminado, id_alquiler",  
  "hotel.alquiler_detalle_producto al_det inner join almacen.producto p on al_det.id_producto=p.id_producto 
   where al_det.eliminado=false and al_det.id_alquiler=$datos[0] order by p.descripcion asc",true);
 $cnx->cerrarConexion();
 
 	return $consulta;
 }
 
 public function insertar($datos){
	$msj="";$error="";
	$cnx = new conexion();
	try{
		$cnx->getConexion()->beginTransaction();
		if($datos[0]>0){
			$id=$datos[0];
		}else{
			$id=$this->insPersona($cnx);
			$this->insPersonaNatural($cnx,$datos[16],$id);
			$this->insPersonaDocumento($cnx,$datos[1],$id);
			$this->insPersonaCorreo($cnx,$datos[3],$id);
			$this->insPersonaCategoria($cnx,"CL",$id);
		}
		$this->insAlquiler($cnx,$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9], $datos[10],
		$datos[11],$datos[12],$datos[14],$id);
		$consulta=$this->actEstadoHab($cnx,$datos[14],'A');
		$cnx->getConexion()->commit();
		$cnx->cerrarConexion();
		
	}catch(Exception $e){
		$cnx->getConexion()->rollBack();
		$rt= "ERROR: " . $e->getMessage();
		error_log( $e->getMessage() );
	}
	return $consulta;
	}
	
	public function insDet($datos){
	
	$cnx = new conexion();
	try{
		$cnx->getConexion()->beginTransaction();
		$ins=$cnx->agregar("hotel.alquiler_detalle_producto",
		"id_producto, cantidad,precio_unitario,cancelo,id_alquiler",
		"?,?,?,?,?",
		array(null,$datos[0],$datos[3],$datos[2],!isset($datos[4])?$datos[4]:'false',$datos[5]));
			
		$cnx->getConexion()->commit();
		$cnx->cerrarConexion();
		
	}catch(Exception $e){
		$cnx->getConexion()->rollBack();
		$rt= "ERROR: " . $e->getMessage();
		error_log( $e->getMessage() );
	}
	return $ins;
	}
	
	public function insPersonaCategoria($cnx,$categoria,$id){
		$ins=$cnx->agregar("personal.percategoria","descripcion, personaid","?,?",
		array(null,$categoria,$id));
		return $ins;
	}
	
	public function actEstadoHab($cnx,$id_det_hab,$estado){
	$actualizar = $cnx->actualizar("hotel.det_piso","hab_estado=?", 
				array(null,$estado),'id_det_hab='.$id_det_hab);
	return $actualizar;
	}
	
	public function insAlquiler($cnx, $tipo_servicio,$cantidad,$fechaIng, $horaIng, $fechaSal, $horaSal,
	$tipo_pago,$precio_total,$precio_hab,$id_det_hab,$id){
	$ins=$cnx->agregar("hotel.alquiler",
	"fecha_ingreso,fecha_salida,tipo_servicio,hora_ingreso,hora_salida,precio_total,precio_unitario,cantidad,tipo_pago,id_det_hab,id_persona", 
			"?,?,?,?,?,?,?,?,?,?,?",
			array(null,$fechaIng,$fechaSal,$tipo_servicio,$horaIng,$horaSal,$precio_total,$precio_hab,$cantidad,$tipo_pago,$id_det_hab,$id));
	return $ins;
	}
	
	public function insPersona($cnx){
		$cnx->agregar("personal.persona","estado","?",array(null,"A"));
		$lst=$cnx->consultar("max(personaid) as id_persona","personal.persona", true);
		$id=$lst[0]['id_persona'];
		return $id;
	}
	
	public function insPersonaNatural($cnx,$cliente,$id){
		$ins=$cnx->agregar("personal.pernatural","personaid,nombre","?,?",array(null,$id,$cliente));
		return $ins;
	}
	
	
	
	public function insPersonaDocumento($cnx,$nrodocumento,$id){
		$ins=$cnx->agregar("personal.perdocumento","personaid,nrodocumento","?,?",array(null,$id,$nrodocumento));
		return $ins;
	}
	
	public function insPersonaCorreo($cnx,$correo,$id){
		$ins=$cnx->agregar("personal.correo","personaid,email","?,?",array(null,$id,$correo));
		return $ins;
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