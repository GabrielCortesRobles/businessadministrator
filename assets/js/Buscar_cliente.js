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
	$("#mvid_cliente").focusout(function(){
		var id_cliente=$("#mvid_cliente").val();
	//		alert(nom_cliente);
	//	var am_cliente=$("#am_cliente").val();
	//	var ap_cliente=$("#ap_cliente").val();
		$.ajax({
			url: "http://localhost:8080/systelecoms/index.php/cliente/Controller_buscar_cliente/buscar_cliente",
			data: {"id_cliente":id_cliente},
			type: "POST",
			
			success: function(result){
				var $datos = $.parseJSON(result);
			
				$("#mvid_cliente").val($datos[0].id_cliente);
				$("#mvnom_cliente").val($datos[0].nom_cliente);
				$("#mvap_cliente").val($datos[0].ap_cliente);
				$("#mvam_cliente").val($datos[0].am_cliente);
				$("#mvrfc_cliente").val($datos[0].rfc_cliente);
				
			}
		});
	});
	
	//LIMPIA LOS CAMPOS DEL APARTADO CLIENTE EN EL MODULO DE VENTA
	$("#limpiar_cliente").on("click", function()
	{
				$("#mvid_cliente").val("1");
				$("#mvrfc_cliente").val("XAXX010101");
				$("#mvnom_cliente").val("");
				$("#mvap_cliente").val("");
				$("#mvam_cliente").val("");		
	});
 });