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
				}
				else 
				{
					if ($datos1[0].precio_menudeo)
					{
						$("#prec").val($datos1[0].precio_menudeo);
					}
					else
					{
						$("#prec").val($datos1[0].precio_mayoreo);
					}
				}				
				
				//$("#prec").val($datos1[0].precio_menudeo);
				//$("#prec").val($datos1[0].precio_mayoreo);
			}
		});
	});
});