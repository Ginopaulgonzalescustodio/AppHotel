<?php
$c=$_SERVER['SCRIPT_NAME'];
$e=explode("/",$c);
$e="/".$e[1];
$ruta='http://'.$_SERVER['SERVER_NAME']."".$e."/indexPrincipal.php?label=".$_GET['label'];
include $ruta;
?>
<script>
	$('#table').bootstrapTable({
	url: 'principal.php?fun=listar&cls=<?=$_GET['label']?>',
      columns: [
	  
	{
        field: 'dni',
        title: 'DNI'
    },
	{
        field: 'cliente',
        title: 'Cliente' //No se debe mostar
    },
	
	{
                        field: 'personaid',
                        title: 'Acciones',
                        align: 'center',
                       // events: operateEvents,
                        formatter: operateFormatter
                    }
	],
});	
		function operateFormatter(value, row, index) {
	var text="<a href='#' onclick='edit("+value+")'><img src='img/editar.png' alt='Editar' title='Editar' width='20px' height='20px' /></a>"
	+"<a href='#' onclick='edit("+value+")'><img src='img/eliminar.png' alt='Eliminar' title='Eliminar' width='20px' height='20px' /></a>";
			
        return [
            text
            
        ].join(''); 
		
		
    }
</script>