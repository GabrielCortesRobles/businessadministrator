$(document).ready(function(){
	//INSERTA LA VENTA EN LA TABLA VENTAS
$("#enviar_venta").click(function(){	
			var id_cliente=$("#mvid_cliente").val();
			var id_empleado=$("#id_empleado").val();
			var total=$("#total").val();
			var recibido_venta=$("#recibido_venta").val();
			var cambio_venta=$("#cambio_venta").val();
			var datos = [];
			$("table tr:gt(1)").each(function(){
					var id_producto = $(this).find("td:eq(0)").text();
					var cant = $(this).find("td:eq(6)").text();
					var subt 	= $(this).find("td:eq(7)").text();
					item = {};
					item ["id_producto"]= id_producto;
					item ["cant"]= cant;
					item ['subt']= subt;
					datos.push(item);
					//alert(item['id_producto']);
					//alert(item['cant']);
					//alert(item['subt']);
				});
				INFO 	= new FormData();
				aInfo 	= JSON.stringify(datos);
				INFO.append('datos', aInfo);
				INFO.append('id_cliente',id_cliente);
				INFO.append('id_empleado',id_empleado);
				INFO.append('total',total);
				INFO.append('recibido_venta',recibido_venta);
				INFO.append('cambio_venta',cambio_venta);
			$.ajax({
				data: INFO,
				type: "POST",
				url: "http://localhost:8080/systelecoms/index.php/ventas/Controller_ventas/insertar_venta",
				contentType: false,
				processData: false,
				success: function(result){						
					alert("Inserción Exitosa!");
					location.reload();
				}
			});
		
	});
	
	$("#facturar").click(function(){
		$("#cliente").removeAttr('hidden');
		$("#nofacturar").removeAttr('hidden');
		$("#facturar").attr('hidden',true);
	});

	$("#nofacturar").click(function(){
		$("#cliente").attr('hidden',true);
		$("#facturar").removeAttr('hidden',true);
		$("#nofacturar").attr('hidden',true);
	});
	
});