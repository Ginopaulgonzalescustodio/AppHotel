<?php
if (isset($_GET['cls'])){
	$clase=$_GET['cls'];
 	include_once($clase.'/Controller'.$clase.'.php'); 
 	if (isset($_GET['fun']) && method_exists('Controller'.$clase,$_GET['fun'])){
		switch ($_GET['fun']) {
		    case "listar":
				listar($clase);
		        break;
		}
	} else {
  		echo 'Error: ¿Que es lo que intenta realizar G?';
	}
}else  if (isset($_POST['clas'])){
	$clase=$_POST['clas'];
 	include_once($clase.'/Controller'.$clase.'.php'); 
 	if (isset($_POST['fun']) && method_exists('Controller'.$clase,$_POST['fun'])){
		switch ($_POST['fun']) {
			
			case 'insDet':
        		insDet($clase,$_POST['datos']);
        		break;
			case 'ins':
        		insertar($clase,$_POST['datos']);
        		break;
			case 'cmbListar':
        		cmbListar($clase);
        		break;
			case 'listaTable':
        		listaTable($clase,$_POST['datos']);
        		break;
			case 'buscarXTipoHab':
        		buscar($clase,$_POST['datos']);
        		break;
			case 'buscar':
        		buscar($clase,$_POST['datos']);
        		break;
		}
	} else {
  		echo 'Error: ¿Que es lo que intenta realizar p?';
	}
}else{
	echo 'Error: ¿Que es lo que intenta realizar?'; 	
}
 
 function listar($clase){
	 $c='Controller'.$clase;
	 $view = new $c;
	 $lst=$view->$_GET['fun']();
	 echo ($lst);
 }
 
 function cmbListar($clase){
	 $c='Controller'.$clase;
	 $view = new $c;
	 $lst=$view->$_POST['fun']();
	 echo ($lst);
 }
 
 function listaTable($clase,$datos){
	 $c='Controller'.$clase;
	 $view = new $c;
	 $lst=$view->$_POST['fun']($datos);
	 echo ($lst);
 }
 function lst($clase){
	 $c='Controller'.$clase;
	 $view = new $c;
	 $lst=$view->$_GET['fun']();
	 echo ($lst);
 }

 function buscar($clase,$datos){
	 $c='Controller'.$clase;
	 $view = new $c;
	 $lst=$view->$_POST['fun']($datos);
	 echo ($lst);
 }

 function insertar($clase,$datos){
	  $c='Controller'.$clase;
	 $view = new $c;
	 $val=$view->$_POST['fun']($datos);
	 echo ($val);
 }
 function insDet($clase,$datos){
	  $c='Controller'.$clase;
	 $view = new $c;
	 $val=$view->$_POST['fun']($datos);
	 echo ($val);
 }
?>