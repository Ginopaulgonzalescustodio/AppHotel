<?php
 include_once('ControllerPrecioTipoHab.php'); 
 if (isset($_GET['fun']) && method_exists('ControllerPrecioTipoHab',$_GET['fun'])){
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
	 $view = new ControllerPiso();
	 $lst=$view->$_GET['fun']();
	 echo ($lst);
 }

 function insertar(){
	 $datos=array($_POST['txtId'],$_POST['txtNroPiso'],$_POST['txtCantHab'],$_POST['txtNHab']);
	 $view = new ControllerPiso();
	 $val=$view->$_GET['fun']($datos);
	 echo ($val);
 }
?>