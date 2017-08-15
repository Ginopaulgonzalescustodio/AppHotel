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
  		echo 'Error: ¿Que es lo que intenta realizar GET?';
	}
 }else  if (isset($_POST['clas'])){
	$clase=$_POST['clas'];
 	include_once($clase.'/Controller'.$clase.'.php'); 
 	if (isset($_POST['fun']) && method_exists('Controller'.$clase,$_POST['fun'])){
		switch ($_POST['fun']) {
			case 'ins':
        		insertar($clase,$_POST['datos']);
        		break;
    		case 'lst':
        		lst($clase);
        		break;
		}
  
	} else {
  		echo 'Error: ¿Que es lo que intenta realizar pOST?';
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
 
 function lst($clase){
	 $c='Controller'.$clase;
	 $view = new $c;
	 $lst=$view->$_GET['fun']();
	 echo ($lst);
 }

 function insertar($clase,$datos){
	  $c='Controller'.$clase;
	 $view = new $c;
	 $val=$view->$_POST['fun']($datos);
	 echo ($val);
 }
 
?>