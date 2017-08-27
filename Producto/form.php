<?php $form="Producto"?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active"><a href="javascript:ruta('<?=$form?>')"><?=$form?></a></li>
			</ol>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"> Agregar <?=$form?></div>
					<div class="panel-body"><br/>
						<form class="form-horizontal form">
							<fieldset>
							<div class="form-group col-md-6">
                                <label class="col-md-3 control-label" for="descripcion">Categoria</label>
                                <div class="col-md-9">
                                    <select name="cmbCategoria" id="cmbCategoria"  class="form-control" autofocus="autofocus">
                                                <option value="">::Seleccione Categoria </option> 
                                               <option value="1">Ducles</option>
                                                <option value="2">Higiene</option>
                                    </select>   
                                </div>
                            </div>
							<div class="form-group col-md-7">
                                <label class="col-md-3 control-label" for="descripcion"></label>
                                <div class="col-md-9">
									
                                </div>
                            </div>
							<div class="form-group col-md-6">
                                <label class="col-md-3 control-label" for="codigo"><?=$form?></label>
                                <div class="col-md-9">
                                    <input id="txtId" name="txtId" type="hidden" class="form-control" value="" >
                                    <input id="txtDescripcion"  name="txtDescripcion" type="text"  class="form-control" value="" >
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-md-3 control-label" for="descripcion">Precio</label>
                                <div class="col-md-9">
									<input id="txtPrecio" name="txtPrecio" type="text" autofocus="autofocus" class="form-control" value="" >
                                </div>
                            </div>
								<div class="form-group">
									<div class="col-md-12 ">
										<a href="#" class="btn btn-default btn-md pull-right btnReg" onclick="registrar('<?=$form?>')" >Registrar</a>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="js/<?=strtolower($form)?>.js"></script>