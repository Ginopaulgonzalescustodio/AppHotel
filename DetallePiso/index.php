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
					<div class="panel-body"><br/>
						<form class="form-horizontal form">
						<div id="divHabitaciones">
						</div>
							<fieldset>
								<div class="form-group">
									<label class="col-sm-2 control-label" for="codigo"><?= $label?></label>
									<div class="col-sm-1">
										<input id="txtId" name="txtId" type="hidden" class="form-control" >
										<input id="txtNroPiso" name="txtNroPiso" autofocus="autofocus" type="text" class="form-control">
									</div>
									<label class="col-md-2 control-label" for="descripcion">Cant. Habitaciones</label>
									<div class="col-md-1">
										<input id="txtCantHab" name="txtCantHab" type="text" class="form-control">
									</div>
									<label class="col-md-2 control-label" for="descripcion">Nº Hab. Inicial</label>
									<div class="col-md-1">
										<input id="txtNHab" name="txtNHab" type="text" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12 ">
										<a href="#" class="btn btn-default btn-md pull-right btnReg" onclick="registrar('Piso')" >Registrar</a>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="js/<?='alquiler'?>.js"></script>