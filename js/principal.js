$(function() {
 $(document).keydown(function(e){
  var code = (e.keyCode ? e.keyCode : e.which);
  if(code == 116) {
   e.preventDefault();
ruta($("#liLabel").text());

  }
 });
});

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	
    results = regex.exec(location.search);
	alert(regex);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	
}

function ruta(url){
	$("#msj").hide();
	/*$.ajax({
		    async: true,
            type:'get',
            url:url2+'/index.php',
            data: {"label" : +url2},

            success:function(msj)
			{	
				$("#divContent").html(msj);
			}
		});*/
	$("#divContent").load(url+'/index.php?label='+url);
}
		
function nuevo(clas){
	$("#msj").hide();
	$("#divContent").load(clas+'/form.php');
}

function nuevoForm(clas,id,numero,tipo,det_piso, estado){//alquiler
	$("#msj").hide();
	$("#divContent").load(clas+'/form.php?id='+id+"&numero="+numero+"&tipo="+tipo+"&det_piso="+det_piso+"&estado="+estado);
}


function registrar(label){
	$.ajax({
		    async: true,
            type:'post',
            url:'principal.php',
            data: {"fun" : 'ins',"clas" : clas(),'datos':form()},
			beforeSend: function () {$('#divContent').html('<center><img src="img/loading.gif"/>Cargando</center>');},
            success:function(msj)
			{	var content=JSON.parse(msj);				
				$("#msj").show();
				$("#divContent").load(clas()+'/index.php?label='+label);
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