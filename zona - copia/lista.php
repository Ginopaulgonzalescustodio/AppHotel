
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CATALOGACION SISMED</title>

<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/datepicker3.css" rel="stylesheet">
<link href="../css/styles.css" rel="stylesheet">
<script src="../js/lumino.glyphs.js"></script>
<script src="../js/lumino.glyphs.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>SIS</span>CA</a>
			</div>						
		</div>
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> USUARIO <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
		<form role="search">
			<div class="form-group">
				
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="importar.html"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-app-window"></use></svg> Importar</a></li>
			<li><a href="lista.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-table"></use></svg> Listar</a></li>
			
			
		</ul>
		<div class="attribution">CENTRO DE SISTEMAS  DE INFORMACIÓN<a href="">CSI</a><br/><a href="" style="color: #333;">Copyright © 2017</a></div>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				
				<li class="active">	<img class="img-responsive" width="1083" height="149" src="img/logoDiremid.png" alt=""></center></a></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked email"><use xlink:href="#stroked-app-window"></use></svg> LISTA DE MEDICAMENTOS</div>
					<div class="panel-body">
					
						<table  id="table" data-toggle="table"   data-show-refresh="true" data-show-toggle="true"  data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
						   <!-- <tr>
						        <th data-field="codigosismed"  data-sortable="true">Cod. SISMED</th>
						        <th data-field="codigo_sig" data-sortable="true">Cod. SIGA</th>
								<th data-field="medic" data-sortable="true">Medicamento</th>
								<th data-field="tipo" data-sortable="true">Tipo</th>
								<th data-field="estado" data-sortable="true">Estado</th>
						    </tr>-->
						    </thead>
						</table>
					</div>
				</div>
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>

	<script src="../js/bootstrap-table.js"></script>	
	<!--data-url="listar.php"-->
	<script>
	
	$('#table').bootstrapTable({
	url: 'zona.php?lst=listar',
      columns: [{
        field: 'zonaid',
        title: 'Zona ID' //No se debe mostar
    }, {
        field: 'codigo',
        title: 'CodigoSunat'
    },{
        field: 'descripcion',
        title: 'Zona'
    }, {
        field: 'eliminado',
        title: 'Eliminado'
    },
	{
        field: 'fechar_registro',
        title: 'Fecha Registro'
    },
	{
                        field: 'estado',
                        title: 'Estado',
                        align: 'center',
                       // events: operateEvents,
                        formatter: operateFormatter
                    }
	],
});	
function operateFormatter(value, row, index) {
	var text='';
	(value=='ACTIVO')?
	 text="<span style='font-size: 12pt; font-weight: bold; color: green; text-align: center;'>"+value+"</span>"
	 
	 : text="<span style='font-size: 12pt; font-weight: bold; color: red; text-align: center;'>"+value+"</span>";
			
        return [
            text
            
        ].join(''); 
		
		
    }
</script>
</body>

</html>
