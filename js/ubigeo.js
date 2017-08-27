function clas(){
  return "Ubigeo";
}

function form(){
  datos=[$("#departamento").val(),$("#provincia").val(),$("#distrito").val(),$("#txtId").val(),$("#txtPais").val()];
  return datos;
}
/*
$(document).ready(function(){
   $("#departamento").change(function () {
           $("#departamento option:selected").each(function () {
            elegido=$(this).val();
            $.post("form.php", { elegido: elegido }, function(data){
            $("#provincia").html(data);
            });            
        });
   })
});
*/