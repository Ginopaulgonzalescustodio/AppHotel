function ruta(url){
	$("#msj").hide();
	$("#divContent").load(url+'/index.php?label='+url);
}
		
function nuevo(clas){
	$("#msj").hide();
	$("#divContent").load(clas+'/form.php');
}

function registrar(){
	$.ajax({
		    async: true,
            type:'post',
            url:'principal.php',
            data: {"fun" : 'ins',"clas" : clas(),'datos':form()},
			beforeSend: function () {$('#divContent').html('<center><img src="img/loading.gif"/>Cargando</center>');},
            success:function(msj)
			{	var content=JSON.parse(msj);
				
				$("#msj").show();
				$("#divContent").load(clas()+'/index.php');
				alerta="";
				if(content.err==0){
					alerta='<div class="alert bg-success" role="alert">'
					+'<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg>'
					+content.texto+'</div>';
				}else{
					alerta='<div class="alert bg-danger" role="alert">'
					+'<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>'
					+'Codigo error:'+content.err+"</br>"
					+content.texto+'</div>';
				}
				$("#msj").html(alerta);
				setTimeout(function(){$("#msj").hide()}, 8000);
			}
		});
}