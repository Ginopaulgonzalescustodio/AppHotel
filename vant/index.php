<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Registro Zona</h3>
<div class="row"><div class="col-lg-11"><div id="ok"></div>
           <form  id="frmzona" role="form" method="post" name="frmzona">
    <table class="responsive table table-striped table-bordered table-hover table-condensed col-lg-8"><div class="errorMessage"></div>
    <tr><td><label for="descripcion" class="col-xs-2 col-form-label">Descripcion</label></td><td colspan="3"><input type="hidden" id="idsele" name="idsele" value=""><input type="text" class="form-control" name="txtdes" placeholder="ingrese descripcion-zona" id="dessele" value=""></td>
        <td><label>Eliminado<input type="checkbox" id="cbox1" value=""></label</td>  
        <td><label for="fecreg" class="col-xs-2 col-form-label">FechaReg</label></td><td colspan="3"><input type="date" id="txtfecreg" class="form-control" name="txtfecreg" value=""></td></tr>
    </tr>
    <tr>
  <td  colspan="3"><button type="button" id="btnLimpiar"  value="Nuevo" aria-label="left align" >Nuevo</button></td>
  <td colspan="3"><button type="button" value="Registrar" aria-label="left align"  id="btnregistrar">Registrar</button></td>
  <td colspan="3"><button type="button" id="btnActualizar"  value="Actualizar" aria-label="left align" >Actualizar</button></td>
</tr>
        <?php
        // put your code here
        ?>
    </body>
</html>
