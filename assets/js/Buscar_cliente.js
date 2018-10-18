$(document).ready(function(){
	//REALIZA LA OPERACION PARA DETERMINAR EL TOTAL DE LA VENTA
    $("#recibido").focusout(function(){
		var recibido=$("[name=recibido]").val();
		var total=$("[name=total]").val();
		
		if(recibido < total)
		{
			alert("cantidad incorrecta");
			$("[name=cambio]").val("0.00");
			$("[name=recibido]").val("");
		}
		else
		{
			var cambio = recibido - total;
			$("[name=cambio]").val(cambio);
		}
    });
	
	//REFRESCA LA PAGINA
	$("#cancelar").click(function(){
		location.reload();
    });
	//BUSCA LOS DATOS EN LA BASE 
	$("#buscar").click(function(){
		var ap_cliente=$("#ap_cliente").val();
		var am_cliente=$("#am_cliente").val();
		$.ajax({
			url: "http://localhost:8080/systelecoms/index.php/ventas/Controller_caja/buscar_cliente",
			data: {"ap_cliente":ap_cliente , "am_cliente":am_cliente},
			success: function(result){
				var $datos = $.parseJSON(result);
				$("#am_cliente").val($datos[0].am_cliente);
				$("#ap_cliente").val($datos[0].ap_cliente);
				$("#nom_cliente").val($datos[0].nom_cliente);
				$("#rfc_cliente").val($datos[0].rfc_cliente);
				$("#id_producto").val($datos[0].id_producto);
				$("#nom_prod").val($datos[0].nom_prod);
				$("#precio").val($datos[0].precio);
				$("#cantidad_prod").val($datos[0].cantidad_prod);
				$("#total").val($datos[0].total);
			}
		});
	});
			  
		   $(document).on("click",".eli", function(){
		   $(this).parents("tr").remove();
		   var sb = $(this).parents("tr").find("td").eq(4).html();
		   tot = tot-sb;
		   $("#total").text("Total = " + tot);
		   });
		   
	//BUSCA LOS DATOS EN LA BASE EN LA BASE DE TADOS EN LA TABLA CLIENTE
	$("[name=nom_cliente]").focusout(function(){
		var nom_cliente=$("#nom_cliente").val();
		var am_cliente=$("#am_cliente").val();
		var ap_cliente=$("#ap_cliente").val();
		$.ajax({
			url: "http://localhost:8080/systelecoms/index.php/cliente/Controller_buscar_cliente/buscar_cliente",
			data: {"nom_cliente":nom_cliente, "am_cliente":am_cliente, "ap_cliente":ap_cliente},
			type: "POST",
			
			success: function(result){
				var $datos = $.parseJSON(result);
				$("#id_cliente").val($datos[0].id_cliente);
				$("#nom_cliente").val($datos[0].nom_cliente);
				$("#ap_cliente").val($datos[0].ap_cliente);
				$("#am_cliente").val($datos[0].am_cliente);
				$("#rfc_cliente").val($datos[0].rfc_cliente);
				
			}
		});
	});
	
	//LIMPIA LOS CAMPOS DEL APARTADO CLIENTE EN EL MODULO DE VENTA
	$("#limpiar_cliente").on("click", function()
	{
				$("#id_cliente").val("");
				$("#rfc_cliente").val("");
				$("#nom_cliente").val("");
				$("#ap_cliente").val("");
				$("#am_cliente").val("");		
	});
 });