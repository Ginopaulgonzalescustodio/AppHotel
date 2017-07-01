	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Agregar Zona</div>
					<div class="panel-body"><br/>
						<form class="form-horizontal form">
							<fieldset>
								<div class="form-group col-md-6">
									<label class="col-md-3 control-label" for="name">Nombre</label>
									<div class="col-md-9">
									<input id="txtNombre" name="txtNombre" type="text" class="form-control">
									</div>
								</div>
								<div class="form-group col-md-6">
									<label class="col-md-3 control-label" for="email">Your E-mail</label>
									<div class="col-md-9">
										<input id="email" name="email" type="text" placeholder="Your email" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12 ">
										<a href="#" class="btn btn-default btn-md pull-right btnReg" onclick="registrar()" >Registrar</a>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
	<script src="js/<?php echo 'zona' ?>.js"></script>	
</body>

</html>
