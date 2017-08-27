<?php
include_once('DaoAlquiler.php');
include_once('DetallePiso/DaoDetallePiso.php');
include_once('PrecioTipoHab/DaoPrecioTipoHab.php');
class ControllerAlquiler {

function buscarXTipoHab($datos){
	$dao=new DaoPrecioTipoHab();
	$datosBD=$dao->buscarXTipoHab($datos);	
	return json_encode($datosBD);
 }
 
function buscar($datos){
	$dao=new DaoAlquiler();
	$datosBD=$dao->buscar($datos);	
	
	return json_encode($datosBD);
 }
 
 function listar(){	 
	$dao=new DaoDetallePiso();
	$lista=$dao->listar();	
	
	$enviar="";
	$piso;
	$habitacion;
	
	for ($i = 0; $i < count($lista); $i++) {
		
		$piso=explode("/",$lista[$i]["piso"]);
		$habitacion=explode("/",$lista[$i]["habitacion"]);
		if ($i == 0) {
			$enviar=$enviar.
			'<div class="form-group"><label class="col-md-2 control-label" for="piso">'.$piso[0].'º Piso</label></br>
			<div class="col-md-10">';
		}
		
		if ($i > 0 && $lista[$i]['piso'] != $lista[$i - 1]['piso']) {
				$enviar=$enviar.
				'</div></div><div class="form-group"><label class="col-md-2 control-label" for="piso">'.$piso[0].'º Piso</label></br>
				<div class="col-md-10">';	
		}
		//;background-color: red;color:#fff
		$enviar=$enviar.'<div class="col-md-2">
		<a href="#" class="btn btn-'.$lista[$i]["hab_estado"].' btn-md pull-left btnHab col-md-12" style="height:45px"
		onclick="nuevoForm('.""
		."'Alquiler',".$lista[$i]["id_tipo_habitacion"].",".$lista[$i]["nro_hab"].",'".$habitacion["1"]
		."',".$lista[$i]["id_det_hab"].",'".$lista[$i]["estadohabitacion"]."'"
		.')">'
		.$lista[$i]["nro_hab"].'-'
		.$habitacion["1"].'</a></div>';

			if($i==4||$i==11||$i==18){
		$enviar=$enviar."</br></br></br>";		
			}
	}
	return $enviar;
 }

 function listaTable($datos){	 
	$dao=new DaoAlquiler();
	$lista=$dao->listaProductosAlquiler($datos);	
	$enviar="";
	$cancelo="";
	for ($i = 0; $i < count($lista); $i++) {
		($lista[$i]==true)?$cancelo="SI":$cancelo="NO";
		$enviar=$enviar.'<tr data-id='.$lista[$i]['id_alquiler_det_prod'].'>'.
		'<td>'.$lista[$i]['producto'].'</td>'.
		'<td>'.$lista[$i]['cantidad'].'</td>'.
		'<td>'.$lista[$i]['precio_unitario'].'</td>'.
		'<td>'.$lista[$i]['cantidad']*$lista[$i]['precio_unitario'].'</td>'.
		'<td>'.$cancelo.'</td>'.
		'</tr>';
	}
	return $enviar;
 }
 
  
 function ins($datos){
  	$dao=new DaoAlquiler();
	($datos[15]!=null||$datos[15]>0)?
		$ins=$dao->actualizar($datos):
		$ins=$dao->insertar($datos);
		
	if($ins=="true"){
		$err=0;
		$texto="REGISTRADO CORRECTAMENTE";
	}else{
		if($err="25P02"){
			$texto="El cliente ya se encuentra en la base de datos, para ello debe seleccionar el cliente y no volver a registrarlo";
		}else{
		$texto=$ins[2];	
		}
	
		$err=$ins[0];
		
	}
	return json_encode(array('err'=>$err,'texto'=>$texto));
  } 
 
 
 
 function insDet($datos){
  	$dao=new DaoAlquiler();
	($datos[5]!=null||$datos[5]>0)?
		$ins=$dao->insDet($datos):
		$ins=$dao->insDet($datos);
		
	if($ins=="true"){
		$err=0;
		$texto="REGISTRADO CORRECTAMENTE";
	}else{
		$texto=$ins[2];	
		$err=$ins[0];
		
	}
	return json_encode(array('err'=>$err,'texto'=>$texto));
  } 
 } 
 
 
 
?>
