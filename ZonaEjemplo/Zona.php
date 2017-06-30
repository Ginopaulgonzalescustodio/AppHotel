<?php
 include_once('ControllerZona.php'); 
 if (isset($_GET['fun']) && method_exists('ControllerZona',$_GET['fun'])){
	switch ($_GET['fun']) {
    case "listar":
		listar();
        break;
	case 'ins':
        insertar();
        break;
    case 2:
        echo "i es igual a 2";
        break;
}
  
} else {
  echo 'Error: ¿Que es lo que intenta realizar?';
}
 
 function listar(){
	 $view = new ControllerZona();
	 $lst=$view->$_GET['fun']();
	 echo ($lst);
 }

 function insertar(){
	 $datos=array($_POST['txtNombre'],$_POST['email']);
	 
	 $view = new ControllerZona();
	 $val=$view->$_GET['fun']($datos);
	 echo ($val);
 }
?>