var datosProductos="";
var datosClientes="";

$(document).ready(function(){
	clientes();
	$("#txtDNI").focus(function () {
	$("#txtDNI").autocomplete({
		minLength: 1,
		dataType:'json',
		source:  JSON.parse(datosClientes),
		select: function (event, ui) {
			event.preventDefault();
			$("#txtIdCliente").val(ui.item.value);
			$(this).val(ui.item.label);
			$("#txtCliente").val(ui.item.cliente);
			$("#txtCorreo").val(ui.item.email);
			return false;
		},	
		open: function (event, ui) {
			$(txtIdCliente).val('');
		},
		focus: function (event, ui) {
			$(this).val(ui.item.label);
			return false;
		}

	});
});
	fecha($('input:radio[name=rbtTipoAlquiler]:checked').val());
	$("input[name='txtFechaSalida']").change(function() {
		var fechaInicio = new Date($("#txtFechaIngreso").val()).getTime();
		var fechaFin    = new Date($("#txtFechaSalida").val()).getTime();
		var diff = fechaFin - fechaInicio;
		var diasDif=diff/(1000*60*60*24);
		if(diasDif<=0){
				bootbox.alert('La fecha de Salida debe ser igual o mayor a la fecha ingreso');
				 inputVal();  
		}
	});	
	
	if($("#txtEstadoHabitacion").val()=="L"){
	precio();
	}else{
		cargarDatosAlquiler();
	}
	productos();
	
});


function cargarDatosAlquiler(){
	var options = {
		async: true,
		type: 'POST',
		url: 'principal.php',
		data: {"fun" : 'buscar',"clas" : clasOtro(0),'datos':formOtros(3)},
		dataType: 'json',
		success: function (response) {
			var content = JSON.parse(response);
		   $("#txtId").val(content[0].id_alquiler);
		   listaProducto(); 
		   $("#txtFechaIngreso").val(content[0].fecha_ingreso);
		   $("#txtCantidad").val(content[0].cantidad);
		   $("#horaIngreso").val(content[0].hora_ingreso);
		   $("#txtFechaSalida").val(content[0].fecha_salida);
		   $("#horaSalida").val(content[0].hora_salida);
		   $("#txtCliente").val(content[0].cliente);
		   $("#txtDNI").val(content[0].dni);
		   $("#txtCorreo").val(content[0].correo);
		   $("#lblPrecio").text(content[0].precio_total);
		   $("#txtPrecioHab").val(content[0].precio_unitario);
		   
		   
			  
			//alert(newData); 
			  /*var content = JSON.parse(msj);
			 datosProductos = content;
			alert(datosProductos);*/
			}
		}
	$.ajax(options);
}


function clientes(){

	var options = {
		async: true,
		type: 'POST',
		url: 'principal.php',
		data: {"fun" : 'cmbListar',"clas" : clasOtro(3),'datos':""},
		dataType: 'json',
		success: function (response) {
			datosClientes = JSON.stringify(response);
			//alert(newData); 
			  /*var content = JSON.parse(msj);
			 datosProductos = content;
			alert(datosProductos);*/
			}
		}
	$.ajax(options);
}


function productos(){
	var options = {
		async: true,
		type: 'POST',
		url: 'principal.php',
		data: {"fun" : 'cmbListar',"clas" : clasOtro(2),'datos':""},
		dataType: 'json',
		/*beforeSend: function () 
		{$('#divCarga').html('<center><img src="img/loading.gif"/>Cargando</center>');},*/
		success: function (response) {
			datosProductos = JSON.stringify(response);
			//alert(newData); 
			  /*var content = JSON.parse(msj);
			 datosProductos = content;
			alert(datosProductos);*/
			}
		}
	$.ajax(options);
}

$("#txtDNI").focus(function () {
	$("#txtDNI").autocomplete({
		minLength: 1,
		dataType:'json',
		source:  JSON.parse(datosClientes),
		select: function (event, ui) {
			event.preventDefault();
			$("#txtIdCliente").val(ui.item.value);
			$(this).val(ui.item.label);
			$("#txtCliente").val(ui.item.cliente);
			$("#txtCorreo").val(ui.item.email);
			return false;
		},	
		open: function (event, ui) {
			$(txtIdCliente).val('');
		},
		focus: function (event, ui) {
			$(this).val(ui.item.label);
			return false;
		}

	});
});


$("#txtProducto").focus(function () {
	$("#txtProducto").autocomplete({
		minLength: 1,
		dataType:'json',
		source:  JSON.parse(datosProductos),
		select: function (event, ui) {
			event.preventDefault();
			$("#txtIdProducto").val(ui.item.value);
			$('#txtProducto').val(ui.item.label);
			$("#txtPrecioProducto").val(ui.item.precio);
			return false;
		},	
		open: function (event, ui) {
			$("#txtIdProducto").val('');
		},
		focus: function (event, ui) {
			$(this).val(ui.item.label);
			return false;
		}

	});

});

function agregar(){
	if($("#txtId").val()>0){
	var options = {
		async: true,
		type: 'POST',
		url: 'principal.php',
		data: {"fun" : 'insDet',"clas" : clasOtro(0),'datos':formOtros(2)},
		dataType: 'json',
		success: function (response) {
			
			//var content= $.parseJSON(response);				
			/*alert(content[0].err);
				if(content[0].err==0){*/
			bootbox.alert("Registrado Correctamente");		
					listaProducto();
				/*}else{
			bootbox.alert('<div class="alert bg-danger" role="alert">'
					+'<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>'
					+'Codigo error:'+content[0].err+"</br>"
					+content[0].texto+'</div>');
				}*/
			}
		}
	$.ajax(options);
	}else{
		bootbox.alert("Debe registrar los datos de la habitación");		
	}
}

function listaProducto(){
	var options = {
		async: true,
		type: 'POST',
		url: 'principal.php',
		data: {"fun" : 'listaTable',"clas" : clasOtro(0),'datos':formOtros(0)},
		//dataType: 'json',
		success: function (response) {
			//alert(formOtros(0));
				$("#tblProducto").html(response);
			}
		}
	$.ajax(options);
}

function turno(val){

	if(val=="N"){
	precio();
		$("#tHoraSalida").hide();
		$("#tNocheSalida").show();
		
	}else{
		$("#txtCantidad").val(1);
	precio();
		$("#tHoraSalida").show();
		$("#tNocheSalida").hide();
	$("#txtFechaSalida").val($("#txtFechaIngreso").val());
	
	}
}


function fecha(turno){
$("input[name='txtCantidad']").keyup(function() {
		if($("input[name='txtCantidad']" ).val().length>0){
		 if($("input[name='txtCantidad']" ).val().length>0&&$("input[name='txtCantidad']" ).val()>0){
			 valor = $("input[name='txtCantidad']" ).val();
			 if($('input:radio[name=rbtTipoAlquiler]:checked').val()=="N"){
				 $("#lblPrecio").text("S/. " + (parseFloat(valor*$("#txtPrecioHab").val())));
				 $("#txtPrecioTotal").val( parseFloat(valor*$("#txtPrecioHab").val()));
				 fechaIncrementada(valor)
			 }else{
				 if(valor.length>0&&valor<=3){
					 $("#lblPrecio").text("S/. " + (parseFloat(valor*$("#txtPrecioHab").val())));
					$("#txtPrecioTotal").val( parseFloat(valor*$("#txtPrecioHab").val()));	
				 }else{
					bootbox.alert('El valor no debe ser mayor a 3 horas');
					valor=$("input[name='txtCantidad']" ).val(3);
					$("#lblPrecio").text("S/. " + (parseFloat(3*$("#txtPrecioHab").val())));
					$("#txtPrecioTotal").val( parseFloat(3*$("#txtPrecioHab").val()));	
				 }
			 }
		}else{
			bootbox.alert('El valor no debe ser menor de 0');
			 inputVal();
		}
	  }else{
		 inputVal();  
	  }
	});
}

function fechaIncrementada(valor){
	
	var fecha=$("#txtFechaIngreso").val();
			fecha=fecha.split("-");
			var d = new Date(fecha[2],fecha[1],fecha[0]);
			var fecha = new Date(fecha[0],fecha[1],fecha[2]),
			dia = fecha.getDate(),
			mes = fecha.getMonth(),
			anio = fecha.getFullYear(),
			tiempo = valor//prompt("Ingrese la cantidad de días a añadir"),
			addTime = tiempo * 86400; 
			fecha.setSeconds(addTime); 
			var mes="0", dia="0";
			if((fecha.getMonth() + 1)<10){
				mes="0"+(fecha.getMonth());
			}else{
				mes=(fecha.getMonth());
			}
			if((fecha.getDate())<10){
				dia="0"+(fecha.getDate());
			}else{
				dia=fecha.getDate();
			}
			$("input[name='txtFechaSalida']").val(fecha.getFullYear() +"-"+mes+"-"+ dia);
}
function inputVal(){
	$("#txtFechaSalida").val($("#txtFechaIngreso").val());
	$("#txtPrecioTotal").val($("#txtPrecioHab").val());
	$("#lblPrecio").text("S/. "+$("#txtPrecioHab").val());
}
	

function precio(){
	$.ajax({
		    async: true,
            type:'post',
			dateType:'json',
            url:'principal.php',
            data: {"fun" : 'buscarXTipoHab',"clas" : clasOtro(0),'datos':formOtros(1)},
			beforeSend: function () 
			{$('#divCarga').html('<center><img src="img/loading.gif"/>Cargando</center>');},
            success:function(msj)
			{ 
			 var content = JSON.parse(msj);
			 $("#txtPrecioHab").val(content[0].precio);
			 $("#lblPrecio").text("S/. " + $("#txtCantidad").val()*$("#txtPrecioHab").val());
			 $("#txtPrecioTotal").val($("#txtCantidad").val()*$("#txtPrecioHab").val());
            //console.log(content)
			//alert(content[0].precio);
			}
		});
}



function clasOtro(cod){
	var clase="";
	switch (cod){
		case 0:clase="Alquiler";break;
		case 1:clase="PrecioTipoHab";break;
		case 2:clase="Producto";break;
		case 3:clase="Cliente";break;
	}
  return clase;
}

function clas(){
	clase="Alquiler";
  return clase;
}

function formOtros(cod){
	var datos="";
	switch (cod){
		case 0://Alquiler
		datos=[$("#txtId").val()];break;
		case 1:
			datos=[$("#txtIdTipoHabitacion").val(),$('input:radio[name=rbtTipoAlquiler]:checked').val()];break;
		case 2://AlquilerDetalle
			datos=[$("#txtIdProducto").val(),$("#txtProducto").val(),$("#txtPrecioProducto").val(),$("#txtCantidadProd").val(),$('input:checkbox[name=chkCancelo]:checked').val(),$("#txtId").val()];break;
		case 3://Cargar Datos de alquiler
		datos=[$("#txtIdDetallePiso").val()];break;
	}
  return datos;
}

function form(){
	datos=[$("#txtIdCliente").val(),$("#txtDNI").val(),$("#txtCiudad").val()
	,$("#txtCorreo").val(),$('input:radio[name=rbtTipoAlquiler]:checked').val(),$("#txtCantidad").val()
	,$("#txtFechaIngreso").val(),$("#horaIngreso").val(),$("#txtFechaSalida").val()
	,$("#horaSalida").val(),$('input:radio[name=rbtTipoPago]:checked').val()
	,$("#txtPrecioTotal").val(),$("#txtPrecioHab").val(),$("#txtIdTipoHabitacion").val()
	,$("#txtIdDetallePiso").val(),$("#txtId").val(),$("#txtCliente").val()];
	return datos;
}

