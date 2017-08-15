<?php
$c=$_SERVER['SCRIPT_NAME'];
$e=explode("/",$c);
$e="/".$e[1];
$label=$_GET['label'] . " de Habitaciones";
//$ruta='http://'.$_SERVER['SERVER_NAME']."".$e."/indexPrincipal.php?label=".$_GET['label'];
//include $ruta;
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active"><?=$label?></li>
			</ol>
		</div>	
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?=$label?></div>
					<div class="panel-body">
						<form class="form-horizontal form">
						<div id="divHabitaciones">
						<div id="divCarga"></div>
						</div>					
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="js/<?='alquiler'?>.js"></script>