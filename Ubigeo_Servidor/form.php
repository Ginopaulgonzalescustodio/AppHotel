<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"><a href="javascript:ruta('ubigeo_servidor')">Ubigeo_Servidor</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Agregar Ubigeo1</div>
                <div class="panel-body"><br/>

                    <form class="form-horizontal form">
                        <fieldset>
                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label" for="codigo">Ubigeo País</label>

                                <div class="col-md-9">
                                    <input id="txtId1" name="txtId1" type="hidden" class="form-control" >
                                    <input id="txtPais" name="txtPais" type="text" autofocus class="form-control" >
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label" for="descripcion">Ubigeo Departamento</label>
                                <div class="col-md-9">
                                    <input id="txtdepartamento" name="txtdepartamento" type="text" class="form-control" >
                                </div></div>
                                <div class="form-group col-md-6">
                                    <label class="col-md-3 control-label" for="descripcion">Ubigeo Provincia</label>
                                    <div class="col-md-9">
                                        <input id="txtprovincia" name="txtprovincia" type="text" class="form-control" >

                                    </div></div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-3 control-label" for="descripcion">Ubigeo Distrito</label>
                                        <div class="col-md-9">
                                            <input id="txtdistrito" name="txtdistrito" type="text" class="form-control" >
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <div class="col-md-12 ">
                                                <a href="#" class="btn btn-default btn-md pull-right btnReg" onclick="registrar('Ubigeo_Servidor')" >Registrar</a>
                                            </div>
                                        </div>
                                        </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>

                            <script src="js/<?php echo 'ubigeo_servidor' ?>.js"></script>



