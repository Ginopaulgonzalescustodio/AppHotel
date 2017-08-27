<?php date_default_timezone_set('America/Lima'); 
 $hoy = getdate();
?>
<div class="form-group col-md-3" id="ingreso" >
    <label class="col-md-3 control-label" for="fechaIngreso">Ingreso</label>
    <div class="col-md-9">
		<input type="date" name="txtFechaIngreso" id="txtFechaIngreso" value="<?= (date("Y") . "-" . date("m") . "-" . date("d")); ?>" class="form-control"/>
	</div>
</div>
<div class="form-group col-md-2"> 
	<div class="col-md-12">
		<input type="time" name="horaIngreso" value="<?= (str_pad($hoy['hours'], 2, "0", STR_PAD_LEFT). ":" . str_pad(date("i"), 2, "0", STR_PAD_LEFT) . ":" . str_pad(date("s"), 2, "0", STR_PAD_LEFT)); ?>"  step="1" class="form-control">
	</div>
</div>      
<div class="form-group col-md-4" id="salida">
    <label class="col-md-4 control-label" for="fechaSalida">Salida</label>
    <div class="col-md-8">
		<input type="date" name="txtFechaSalida" id="txtFechaSalida"  value="<?= (date("Y") . "-" . date("m") . "-" . date("d")); ?>" class="form-control"/>
	</div>
</div>
<div class="form-group col-md-4" id="tNocheSalida"> 
	<div class="col-md-6">
		<input type="time" name="horaSalida" value="12:30:00" max="23:59:59" min="01:00:00" step="1" class="form-control">
	</div>
</div> 
<div class="form-group col-md-4" id="tHoraSalida" style="display:none"> 
	<div class="col-md-6">
		<input type="time" name="horaSalidaHora" value="<?= (str_pad($hoy['hours'], 2, "0", STR_PAD_LEFT). ":" . str_pad(date("i"), 2, "0", STR_PAD_LEFT) . ":" . str_pad(date("s"), 2, "0", STR_PAD_LEFT)); ?>"  step="1" class="form-control">
	</div>
</div>
