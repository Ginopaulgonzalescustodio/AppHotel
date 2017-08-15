<?php
include_once('DaoAlquiler.php');
include_once('DetallePiso/DaoDetallePiso.php');
class ControllerAlquiler {
	
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
		
		<a href="#" class="btn btn-success btn-md pull-left btnHab col-md-12" style="height:45px" onclick="registrar("Zona")">'
		.$lista[$i]["nro_hab"].'-'
		.$habitacion["1"].'</a></div>';

			if($i==4||$i==11||$i==18){
		$enviar=$enviar."</br></br></br>";		
			}
			
		
	}


	
	return $enviar;
 }

 
  
 function ins($datos){
  	$dao=new DaoAlquiler();
	($datos[0]!=null||$datos[0]>0)?
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
