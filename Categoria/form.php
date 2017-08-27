	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active"><a href="javascript:ruta('Categoria')">Categoria</a></li>
			</ol>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Agregar Categoria</div>
					<div class="panel-body"><br/>
					
						<form class="form-horizontal form">
							<fieldset>
								<div class="form-group col-md-8">
									<label class="col-md-3 control-label" for="codigo">Descripcion</label>
									<div class="col-md-9">
									<input id="txtId" name="txtId" type="hidden" class="form-control" >
										<input id="txtDescripcion" name="txtDescripcion" type="text" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12 ">
										<a href="#" class="btn btn-default btn-md pull-right btnReg" onclick="registrar('Categoria')" >Registrar</a>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="js/<?php echo 'Categoria' ?>.js"></script>