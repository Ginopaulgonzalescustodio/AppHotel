
<?php
 include_once('../conexion/conexion.php');// llamamos a nuestro archivo de conexion
 
 class DaoZona {//creamos la clase el mismo nombre del archivo - Empezar con DaoTabla
	 
 public function listar(){ //Metodo o funcion para listar
 //abrimos conexion
 $cnx = new conexion();
 //CONSULTAR (atribtos que deseamos listar , tabla , siempre true para que nos envia como json);
 $consulta = $cnx->consultar( "zonaid,codigo, upper(trim(descripcion)) descripcion,eliminado, fechar_registro", "zona",true);
 //cerramos la coneccion
 $cnx->cerrarConexion();
 //enviamos los datos; como Jsonel envio de datos como json ahacen mas rapidoo el envio el acceso a los datos

 return json_encode($consulta);
 }
 }
 
 
?>