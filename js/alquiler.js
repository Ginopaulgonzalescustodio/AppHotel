$(document).ready(function(){
	habitaciones();
});
function habitaciones(){
	$.ajax({
		    async: true,
            type:'get',
            url:'principal.php',
            data: {"fun" : 'listar',"cls" : clas(),'datos':form()},
			beforeSend: function () {$('#divCarga').html('<center><img src="img/loading.gif"/>Cargando</center>');},
            success:function(msj)
			{	//var content=JSON.parse(msj);				
				$("#divHabitaciones").html(msj);
				//$("#divContent").load(clas()+'/index.php?label=Alquiler');
				/*alerta="";
				if(content.err==0){
					alerta='<div class="alert bg-success" role="alert">'
					+'<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>'
					+content.texto+'</div>';
				}else{
					alerta='<div class="alert bg-danger" role="alert">'
					+'<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>'
					+'Codigo error:'+content.err+"</br>"
					+content.texto+'</div>';
				}*/
				
				//$("#divHabitaciones").html(msj);
				
				//setTimeout(function(){$("#msj").hide()}, 8000);
			}
		});
}

$(window).load(function(){
	alert("aqui");
});

function clas(){
  return "Alquiler";
}

function form(){
  datos=[$("#txtId").val(),$("#txtNroPiso").val(),$("#txtCantHab").val(),$("#txtNHab").val()];
  return datos;
}
