<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active"><a href="javascript:ruta('Alquiler')">Alquiler</a></li>
		</ol>
	</div>
	<div class="row" >
		<form class="form-horizontal form">
			<div class="col-md-12">
					<div class="panel-heading">Habitacion: <?=$_GET['numero']." - ". $_GET['tipo']?> </div>
			</div>
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Cliente</div>
					<div class="panel-body">
						<!--<?php include_once('../Cliente/formDatos.php');?>-->
						<input id="txtEstadoHabitacion" name="txtEstadoHabitacion" type="hidden" class="form-control" value="<?=$_GET['estado']?>" >
						<input id="txtId" name="txtId" type="hidden" class="form-control" value="" >
						                            <div class="form-group col-md-4">
                                <label class="col-md-3 control-label" for="codigo">DNI</label>
                                <div class="col-md-9">
                                    <input id="txtIdCliente" name="txtIdCliente" type="hidden" class="form-control" >
                                    <input id="txtDNI"  name="txtDNI" type="text" minlength="8" maxlength="8" autofocus="autofocus" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group col-md-8">
                                <label class="col-md-3 control-label" for="descripcion">Cliente</label>
                                <div class="col-md-9">
									<input id="txtCliente" name="txtCliente" type="text" autofocus="autofocus" class="form-control" >
                                </div>
                            </div>
                             <div class="form-group col-md-4">
                                <label class="col-md-3 control-label" for="descripcion">Ciudad</label>
                                <div class="col-md-9">
								<input id="txtCiudad" name="txtCiudad" type="text" autofocus="autofocus" class="form-control" value="" >
                                    <!--<select name="provincia" id="provincia"  class="form-control">
                                                <option value="">::Seleccione Distrito </option> 
                                               <option value="Chachapoyas">Chachapoyas</option>
                                                <option value="Huaraz">Huaraz</option>
                                                <option value="Aymaraes">Aymaraes</option>
                                                <option value="Bagua">Bagua</option>                                                                                 
                                                <option value="Bolognesi">Bolognesi</option>
                                                <option value="Chachapoyas">Chachapoyas</option>
                                                <option value="Abancay">Abancay</option>
                                    </select>   -->
                                </div>
                            </div>
                              <div class="form-group col-md-8">
                                <label class="col-md-3 control-label" for="descripcion">Correo</label>
                                <div class="col-md-9">
									<input id="txtCorreo" name="txtCorreo" type="text" autofocus="autofocus" class="form-control" >
                                </div>
                            </div>
                        
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body tabs">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Habitacion</a></li>
							<li><a href="#tab2" data-toggle="tab">Productos</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1">
								<div class="form-group col-md-2 radio">
									<label  class="col-md-9 control-label">
									<input  type="radio" checked id="rbtTipoAlquilerM" name="rbtTipoAlquiler" value="N" onclick="turno('N')"> Noche</label>
								</div>
							
								<div class="form-group col-md-2 radio">
									<label  class="col-md-8 control-label"><input  type="radio" id="rbtTipoAlquilerH" name="rbtTipoAlquiler" value="H" onclick="turno('H')">Hora</label>
								</div>
								<div class="form-group col-md-1"></div>
								<div class="form-group col-md-7">
									<label  class="col-md-4 control-label">Cantidad</label>
									<div class="col-md-2">
										<input type="text" name="txtCantidad" id="txtCantidad" value="1" class="form-control">
									</div>
								</div>
									<!--<?php include_once('formDatos.php');?>-->
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
		<input type="time" name="horaIngreso" id="horaIngreso" value="<?= (str_pad($hoy['hours'], 2, "0", STR_PAD_LEFT). ":" . str_pad(date("i"), 2, "0", STR_PAD_LEFT) . ":" . str_pad(date("s"), 2, "0", STR_PAD_LEFT)); ?>"  step="1" class="form-control">
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
		<input type="time" name="horaSalida" id="horaSalida" value="12:30:00" max="23:59:59" min="01:00:00" step="1" class="form-control">
	</div>
</div> 
<div class="form-group col-md-4" id="tHoraSalida" style="display:none"> 
	<div class="col-md-6">
		<input type="time" name="horaSalidaHora" value="<?= (str_pad($hoy['hours'], 2, "0", STR_PAD_LEFT). ":" . str_pad(date("i"), 2, "0", STR_PAD_LEFT) . ":" . str_pad(date("s"), 2, "0", STR_PAD_LEFT)); ?>"  step="1" class="form-control">
	</div>
</div>

								
								<div class="form-group col-md-2 radio">
									<label  class="col-md-9 control-label">
									<input  type="radio" checked id="rbtTipoPagoM" name="rbtTipoPago" value="E"> Efectivo</label>
								</div>
							
								<div class="form-group col-md-2 radio">
									<label  class="col-md-12 control-label"><input  type="radio" id="rbtTipoPagoH" name="rbtTipoPago" value="T">Con tarjeta</label>
								</div>
								<div class="form-group col-md-8">
									<h3 align="right" >MONTO A PAGAR: <label id="lblPrecio" align="right" style="color:red" ></label></h3> 
									<input type="hidden" id="txtPrecioTotal" name="txtPrecioTotal" value="">
									<input type="hidden" name="txtPrecioHab" id="txtPrecioHab" value="" class="form-control">
								</div>
								
								<div class="form-group">
									<div class="col-md-12 ">
										<a href="#" class="btn btn-info btn-md pull-right btnReg" onclick="registrar('Alquiler')" >Registrar</a>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="tab2">
								<br/>
								<div class="form-group col-md-5">
									<label class="col-md-2 control-label" for="codigo">Producto</label>
									<div class="col-md-9">
										<input id="txtIdProducto" name="txtIdProducto" type="hidden" class="form-control" >
										<input id="txtPrecioProducto" name="txtPrecioProducto" type="hidden" class="form-control" >
										<input id="txtProducto"  name="txtProducto" type="text" minlength="2" maxlength="500" class="form-control"  value="">
									</div>
								</div>
								<div class="form-group col-md-4">
									<label class="col-md-3 control-label" for="descripcion">Cantidad</label>
									<div class="col-md-6">
										<input id="txtCantidadProd" name="txtCantidadProd" type="text" class="form-control" value="" >
									</div>
								
									
								</div>
								
									<div class=" form-group col-md-2 checkbox">
										<label>
											<input type="checkbox" name="chkCancelo" id="chkCancelo" value="true">Si Canceló
										</label>
									</div>
								<div class="col-md-12 ">
										<a href="#" class="btn btn-success btn-md pull-right btnReg" onclick="agregar()">Agregar Producto</a>
									</div>
								
								</br><br/>
								<div class="panel-body">
									<table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
										<thead>
											<tr>
											<th style=""><div class="th-inner sortable">Producto</div><div class="fht-cell"></div></th>
											<th style=""><div class="th-inner sortable">Cantidad</div><div class="fht-cell"></div></th>
											<th style=""><div class="th-inner sortable">Precio</div><div class="fht-cell"></div></th>
											<th style=""><div class="th-inner sortable">SubTotal</div><div class="fht-cell"></div></th>
											<th style=""><div class="th-inner sortable">Canceló</div><div class="fht-cell"></div></th></tr>
										</thead>
										<tbody id="tblProducto">
										</tbody>
										</table>
								</div>
							</div>
							
						</div>
					</div>
				</div><!--/.panel-->
			</div>
			<input type="hidden" name="txtIdTipoHabitacion" id="txtIdTipoHabitacion" value="<?=$_GET['id']?>" class="form-control">
			<input type="hidden" name="txtIdDetallePiso" id="txtIdDetallePiso" value="<?=$_GET['det_piso']?>" class="form-control">
			
			</div>
			</form>
		</div>
	</div>
</div>
<script src="js/alquiler_form.js"></script>

