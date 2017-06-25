
<?php
 include_once('../conexion/conexion.php');
 
 class DaoZona {
	 
 public function listar(){ 
 //abrimos conexion
 $cnx = new conexion();
 //CONSULTAR (atribtos que deseamos listar , tabla , siempre true para que nos envia como json);
 $consulta = $cnx->consultar( "zonaid,codigo, upper(trim(descripcion)) descripcion,eliminado, fechar_registro", "zona",true);
 //cerramos la coneccion
 $cnx->cerrarConexion();
 //enviamos los datos;
 return json_encode($consulta);
 }
 }
 
 
?>