<?php
 include_once('DaoZona.php'); // Llamaos all DAo para  consultar a nuestra base de datos
 //Nuestra Clase Controllador: El controlador sirve para comunicar ala vista con el modelo  dao y luego reutilizar metodos  en otras clases  y no volver 
 // a programar lo mismo
 class Zona {
	
 function listar(){ //metodo para listar
	$dZona=new DaoZona();// instanciamos a la clase dao 
	$lst=$dZona->listar();// nos ubicamos en el metodo que deseamos en este caso el metodo de listar 
	return $lst; // y retronamos la vista
 }
 
 function insertar(){ //falta aun
	return null;
  }
  
 }// cerramos la clase
 
 //aqui se llaamra al contralodaro por medio de ruta 
 //a lde la que obtendra un parametro  lst el cual tendra como valor listar (el nombre de la funcion que llamremos) funciona de esta manera
 if (isset($_GET['lst']) && method_exists('Zona',$_GET['lst'])){
  $view = new Zona();
  $lst=$view->$_GET['lst']();
  echo ($lst);
} else {
  echo 'Function not found';
}
 
 
 

?>