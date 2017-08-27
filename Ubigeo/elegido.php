<?php

$options = "";
if ($_POST["elegido"] == 'Amazonas') {
    $options = '
    <option value="Chachapoyas">Chachapoyas</option>
    <option value="Bagua">Bagua</option>   
    <option value="Bongara">Bongara</option>
    <option value="Utcubamba">Utcubamba</option>    
    ';
}
if ($_POST["elegido"] == 'ANCASH') {
    $options = '
    <option value="Huaraz">Huaraz</option>
    <option value="Aija">Aija</option>    
    <option value="Asuncion">Asuncion</option>
    <option value="Bolognesi">Bolognesi</option>
    <option value="Carhuaz">Carhuaz</option>
    <option value="Huaylas">Huaylas</option>
    <option value="Pallasca">Pallasca</option>    
    ';
}
if ($_POST["elegido"] == 'APURIMAC') {
    $options = '
    <option value="Abancay">Abancay</option>
    <option value="Antabamba">Antabamba</option>    
    <option value="Aymaraes">Aymaraes</option>      
    ';
}
if ($_POST["elegido"] == 'AREQUIPA') {
    $options = '
    <option value="Arequipa">Arequipa</option>
    <option value="Castilla">Castilla</option>    
    <option value="Caylloma">Caylloma</option>
    ';
}
if ($_POST["elegido"] == 'AYACUCHO') {
    $options = '
    <option value="Huamanga">Huamanga</option>
    <option value="La Mar">La Mar</option>    
    <option value="Lucanas">Lucanas</option>
    <option value="Parinacochas">Parinacochas</option>
    ';
}
if ($_POST["elegido"] == 'CAJAMARCA') {
    $options = '
    <option value="Cajamarca">Cajamarca</option>
    <option value="Celendin">Celendin</option>    
    <option value="Chota">Chota</option>
    <option value="Contumaza">Contumaza</option>
    <option value="Cutervo">Cutervo</option>
    <option value="Santa Cruz">Santa Cruz</option>
    ';
}
if ($_POST["elegido"] == 'CUSCO') {
    $options = '
   <option value="Cusco">Cusco</option>        
   <option value="Anta">Anta</option>
   <option value="Calcaz">Calca</option>
   <option value="Paruro">Paruro</option>
   <option value="Paucartambo">Paucartambo</option>                                                                                                                                    
    ';
}
if ($_POST["elegido"] == 'LA LIBERTAD') {
    $options = '
   <option value="Trujillo">Trujillo</option>
   <option value="Ascope">Ascope</option>
   <option value="Bolivar">Bolivar</option>                                    
   <option value="Chepen">Chepen</option>                                     
  <option value="Julcan">Julcan</option>                                      
  <option value="Otuzco">Otuzco</option>                                      
  <option value="Pacasmayo">Pacasmayo</option>                                                                                                                                                                                                               
    ';
}
if ($_POST["elegido"] == 'LAMBAYEQUE') {
    $options = '
  <option value="Chiclayo">Chiclayo</option>
  <option value="Ferreñafe">Ferreñafe</option>                                                                                                                                                                                                                
    ';
}

echo $options;
?>
