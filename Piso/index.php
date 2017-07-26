<?php
$c=$_SERVER['SCRIPT_NAME'];
$e=explode("/",$c);
$e="/".$e[1];
$ruta='http://'.$_SERVER['SERVER_NAME']."".$e."/indexPrincipal.php?label=".$_GET['label'];
include $ruta;
?>
<script>
	$('#table').bootstrapTable({
	url: 'principal.php?fun=listar&cls=Piso',
      columns: [{
        field: 'zonaid',
        title: 'Piso ID' //No se debe mostar
    }, {
        field: 'codigo',
        title: 'N° Piso'
    },{
        field: 'descripcion',
        title: 'Cant. Hab.'
    }, {
        field: 'eliminado',
        title: 'N° Hab. Inicial'
    },
	{
        field: 'fechar_registro',
        title: 'Fecha Registro'
    },
	{
                        field: 'zonaid',
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