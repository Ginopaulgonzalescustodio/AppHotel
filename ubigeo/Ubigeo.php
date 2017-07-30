<?php
 include_once('ControllerUbigeo.php'); 
 if (isset($_GET['fun']) && method_exists('ControllerUbigeo',$_GET['fun'])){
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
	 $view = new ControllerUbigeo();
	 $lst=$view->$_GET['fun']();
	 echo ($lst);
 }

 function insertar(){
	 $datos=array($_POST['txtPais'],$_POST['departamento'],$_POST['provincia'],$_POST['distrito'],$_POST['txtId']);
	 $view = new ControllerUbigeo();
	 $val=$view->$_GET['fun']($datos);
	 echo ($val);
 }
?>