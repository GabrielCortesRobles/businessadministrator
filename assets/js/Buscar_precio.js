$(document).ready(function(){	
	
	//BUSCA LOS PRECIOS DEPENDIENDO DE LA CANTIDAD EN LA BASEDE DATOS EN LA PRODUCTO  
	$(document).on('keyup', '#cant', function(){
		var id_producto=$("#id_producto").val();
		var cant=$("#cant").val();
		$.ajax
		({
			url: "http://localhost:8080/systelecoms/index.php/ventas/Controller_precios/precios",
			data: { "cant":cant, "id_producto":id_producto},
			type: "POST",
			success: function(result)
			{
				var $datos1 = $.parseJSON(result);
				if ($datos1[0].precio_cu)
				{
					$("#prec").val($datos1[0].precio_cu);
					var pcu = Number($datos1[0].precio_cu);
					var cantidadp = Number(cant);
					var totalp = (pcu * cantidadp);
					$('#totalprod').val(new Intl.NumberFormat('es-MX').format(totalp));
				}
				else 
				{
					if ($datos1[0].precio_menudeo)
					{
						$("#prec").val($datos1[0].precio_menudeo);
						var pmen = Number($datos1[0].precio_menudeo);
						var cantidadp = Number(cant);
						var totalp = (pmen * cantidadp);
						$('#totalprod').val(new Intl.NumberFormat('es-MX').format(totalp));
					}
					else
					{
						$("#prec").val($datos1[0].precio_mayoreo);
						var pmay = Number($datos1[0].precio_mayoreo);
						var cantidadp = Number(cant);
						var totalp = (pmay * cantidadp);
						$('#totalprod').val(new Intl.NumberFormat('es-MX').format(totalp));
					}
				}				
				
				//$("#prec").val($datos1[0].precio_menudeo);
				//$("#prec").val($datos1[0].precio_mayoreo);
			}
		});
	});
});