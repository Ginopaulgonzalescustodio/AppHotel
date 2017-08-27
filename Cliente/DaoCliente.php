<?php
 include_once('conexion/conexion.php');
 
 class DaoCliente {
 public $tbl="persona";	
 
 public function listar(){
 $cnx = new conexion();
 $consulta = $cnx->consultar(
	"p.personaid, estado, p.vigencia,upper(trim(nombre)) as cliente, upper(trim(apellidomaterno)) as cli_apellido_materno, upper(trim(apellidopaterno)) as cli_apellido_paterno, upper(trim(sexo)) as sexo, 
    fechanacimiento, upper(trim(estadocivil)) as estado_civil, personajuricaid,per_doc.nrodocumento dni, per_corr.email", 
	"personal.".$this->tbl." p 
	inner join personal.pernatural per_nat on p.personaid=per_nat.personaid
	inner join personal.perdocumento per_doc on per_nat.personaid=per_doc.personaid 
	inner join personal.percategoria per_cat on per_doc.personaid=per_cat.personaid
	inner join personal.correo per_corr on per_cat.personaid=per_corr.personaid
	where p.vigencia=false and per_cat.descripcion='CL'",true);

 $cnx->cerrarConexion();
 return json_encode($consulta);
 }
 
  
 
 public function cmbListar(){
 $cnx = new conexion();
 $consulta = $cnx->consultar(
	"p.personaid as value, estado, p.vigencia,upper(trim(nombre)) as cliente, upper(trim(apellidomaterno)) as cli_apellido_materno, upper(trim(apellidopaterno)) as cli_apellido_paterno, upper(trim(sexo)) as sexo, 
    fechanacimiento, upper(trim(estadocivil)) as estado_civil, personajuricaid,per_doc.nrodocumento as label, per_corr.email", 
	"personal.".$this->tbl." p 
	inner join personal.pernatural per_nat on p.personaid=per_nat.personaid
	inner join personal.perdocumento per_doc on per_nat.personaid=per_doc.personaid 
	inner join personal.percategoria per_cat on per_doc.personaid=per_cat.personaid
	inner join personal.correo per_corr on per_cat.personaid=per_corr.personaid
	where p.vigencia=false and per_cat.descripcion='CL'",true);
	
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