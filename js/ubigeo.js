$(document).ready(function(){
   $("#departamento").change(function () {
           $("#departamento option:selected").each(function () {
            elegido=$(this).val();
            $.post("ubigeo/elegido.php", { elegido: elegido }, function(data){
            $("#provincia").html(data);
            });            
        });
   })
   $("#provincia").change(function () {
           $("#provincia option:selected").each(function () {
            elegido=$(this).val();
            $.post("ubigeo/elegido2.php", { elegido: elegido }, function(data){
            $("#distrito").html(data);
            });            
        });
   })
});
function clas(){
  return "Ubigeo";
}

function form(){
  datos=[$("#departamento").val(),$("#provincia").val(),$("#distrito").val(),$("#txtId").val(),$("#txtPais").val()];
  return datos;
}


