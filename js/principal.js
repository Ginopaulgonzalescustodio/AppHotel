function ruta(url){
	$("#divContent").load(url+'/index.html');
}
		
function nuevo(clas){
	$("#divContent").load(clas+'/form.php');
}

function registrar(){
	$.ajax({
		    async: true,
            type:'post',
            url:'principal.php',
            data: {"fun" : 'ins',"clas" : clas(),'datos':form()},
            success:function(msg)
            {   alert(msg);
				$("#divContent").load(clas()+'/index.html');
            }
        });

}
