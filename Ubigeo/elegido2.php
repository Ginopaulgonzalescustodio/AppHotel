<?php

$options = "";
if ($_POST["elegido"] == 'Chachapoyas') {
    $options = '
    <option value="Chachapoyas">Chachapoyas</option>
                                        <option value="Asuncion">Asuncion</option>
                                        <option value="Chuquibamba">Chuquibamba</option>
                                        <option value="Granada">Granada</option>                                                                                 
                                        <option value="Magdalena">Magdalena</option>
                                        <option value="Molinopampa">Molinopampa</option>
                                        <option value="Montevideo">Montevideo</option>
    ';
}
if ($_POST["elegido"] == 'Bagua') {
    $options = '
    <option value="La Peca">La Peca</option>
                                        <option value="Aramango">Aramango</option>
                                        <option value="Copallin">Copallin</option>
                                        <option value="El Parco">El Parco</option>
                                        <option value="Imaza">Imaza</option>
    ';
}
if ($_POST["elegido"] == 'Bongara') {
    $options = '
<option value="Jumbilla">Jumbilla</option>
                                        <option value="Chisquilla">Chisquilla</option>
                                        <option value="Churuja">Churuja</option>
                                        <option value="Corosha">Corosha</option>
                                        <option value="Cuispes">Cuispes</option>
                                        <option value="Florida">Florida</option>
                                        <option value="Jazan">Jazan</option>
                                        <option value="Recta">Recta</option>
                                        <option value="Longar">Longar</option>
                                        <option value="Mariscal Benavides">Mariscal Benavides</option>
                                        <option value="Milpuc">Milpucs</option>
                                        <option value="Omia">Omia</option>
                                        <option value="Totora">Totora</option>
                                        <option value="Vista Alegre">Vista Alegre</option>     
    ';
}
/*if ($_POST["elegido"] == 'AREQUIPA') {
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
}*/

echo $options;
?>
