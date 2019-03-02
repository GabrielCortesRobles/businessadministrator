$(document).ready(function(){
	//BUSCA LOS DATOS EN LA BASE DE DATOS EN LA TABLA EMPLEADO
	$("[name=nom_empleado]").focusout(function(){
		var nom_empleado=$("#nom_empleado").val();
		var ap_empleado=$("#ap_empleado").val();
		$.ajax({
			url: "http://localhost:8080/systelecoms/index.php/empleado/Controller_buscar_empleado/buscar_empleado",
			data: {"nom_empleado":nom_empleado , "ap_empleado":ap_empleado},
			type: "POST",
			
			success: function(result){
				var $datos = $.parseJSON(result);
				$("#id_empleado").val($datos[0].id_empleado);
				$("#codigo_empleado").val($datos[0].codigo_empleado);
				$("#nom_empleado").val($datos[0].nom_empleado);
				$("#ap_empleado").val($datos[0].ap_empleado);
				$("#am_empleado").val($datos[0].am_empleado);
				
			}
		});
	});
	
	//LIMPIA LOS CAMPOS DEL APARTADO EMPLEADO EN EL MODULO DE VENTA
	$("#limpiar_empleado").on("click", function()
	{
				$("#codigo_empleado").val("");
				$("#id_empleado").val("");
				$("#nom_empleado").val("");
				$("#ap_empleado").val("");
				$("#am_empleado").val("");		
	});
});