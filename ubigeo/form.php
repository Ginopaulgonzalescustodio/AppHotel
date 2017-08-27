<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"><a href="javascript:ruta('ubigeo')">Ubigeo</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> Agregar Ubigeo</div>
                <div class="panel-body"><br/>

                    <form class="form-horizontal form">
                        <fieldset>
                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label" for="codigo">Ubigeo País</label>

                                <div class="col-md-9">
                                    <input id="txtId" name="txtId" type="hidden" class="form-control" >
                                    <input id="txtPais" name="txtPais" type="text" autofocus class="form-control" >
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-3 control-label" for="descripcion">Ubigeo Departamento</label>
                                <div class="col-md-9">
                                    <select name="departamento" id="departamento"  class="form-control">
                                        <option value="">::Seleccione un Departamento</option> 
                                        <option value="Amazonas">Amazonas</option>
                                        <option value="ANCASH">ANCASH</option>
                                        <option value="APURIMAC">APURIMAC</option>
                                        <option value="Lambayeque">Lambayeque</option>                                                                                 
                                        <option value="Pasco">Pasco</option>
                                        <option value="Lima">Lima</option>
                                        <option value="Tacna">Tacna</option> 
                                    </select> 
                                </div>
                            </div>
                             <div class="form-group col-md-6">
                                <label class="col-md-3 control-label" for="descripcion">Ubigeo Provincia</label>
                                <div class="col-md-9">
                                    <select name="provincia" id="provincia"  class="form-control">
                                                <option value="">::Seleccione una Provincia </option> 
                                               <option value="Chachapoyas">Chachapoyas</option>
                                                <option value="Huaraz">Huaraz</option>
                                                <option value="Aymaraes">Aymaraes</option>
                                                <option value="Bagua">Bagua</option>                                                                                 
                                                <option value="Bolognesi">Bolognesi</option>
                                                <option value="Chachapoyas">Chachapoyas</option>
                                                <option value="Abancay">Abancay</option>
                                            </select>   
                                </div>
                            </div>
                              <div class="form-group col-md-6">
                                <label class="col-md-3 control-label" for="descripcion">Ubigeo Distrito</label>
                                <div class="col-md-9">
                                     <select name="distrito" id="distrito"  class="form-control">
                                                <option value="">::Seleccione un Distrito</option> 
                                                <option value="Mi Perú">Mi Perú</option>
                                                <option value="Inncahuasi">Inncahuasi</option>
                                                <option value="Quichuas">Quichuas</option>
                                                <option value="Cosme">Cosme</option>                                                                                 
                                                <option value="Constitución">Constitución</option>
                                                <option value="Castillo Grande">Castillo Grande</option>
                                                <option value="El Porvenir">El Porvenir</option>
                                            </select>   
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
        </div>
    </div>
</div>
<script src="js/<?php echo 'ubigeo' ?>.js"></script>
<?php
/*$options="";*/
/*if ($_POST["elegido"]==Amazonas) {
    $options= '
    <option value="Chachapoyas">Chachapoyas</option>
    <option value="Bagua">Bagua</option>   
    ';    
}
if ($_POST["elegido"]==ANCASH) {
    $options= '
    <option value="Huaraz">Huaraz</option>
    <option value="Bolognesi">Bolognesi</option>    
    ';    
}
if ($_POST["elegido"]==APURIMAC) {
    $options= '
    <option value="Abancay">Abancay</option>
    <option value="Bolognesi">Bolognesi</option>    
    ';    
}

 /*echo $options; */
/*?>

<script language="javascript" src="js/jquery-1.11.1.min.js"></script>*/

