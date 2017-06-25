<?php
 include_once('DaoZona.php');
 //Controllador
 class Zona {
	
 function listar(){ 
	$dZona=new DaoZona();
	$lst=$dZona->listar();
	return $lst;
 }
 
 function insertar(){ 
	return null;
  }
  
 }
 
 
 if (isset($_GET['lst']) && method_exists('Zona',$_GET['lst'])){
  $view = new Zona();
  $lst=$view->$_GET['lst']();
  echo ($lst);
} else {
  echo 'Function not found';
}
 
 
 

?>