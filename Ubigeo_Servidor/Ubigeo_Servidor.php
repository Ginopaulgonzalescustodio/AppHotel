<?php
 include_once('ControllerUbigeo_Servidor.php'); 
 if (isset($_GET['fun']) && method_exists('ControllerUbigeo_Servidor',$_GET['fun'])){
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
	 $view = new ControllerUbigeo_Servidor();
	 $lst=$view->$_GET['fun']();
	 echo ($lst);
 }

 function insertar(){
	 $datos=array($_POST['txtdepartamento'],$_POST['txtprovincia'],$_POST['txtdistrito'],$_POST['txtId1'],$_POST['txtPais']);
	 $view = new ControllerUbigeo_Servidor();
	 $val=$view->$_GET['fun']($datos);
	 echo ($val);
 }
?>