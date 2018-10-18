$(document).ready(function(){
	
	//BUSCA LOS DATOS EN LA BASE DE DATOS EN LA TABLA PRODUCTO  
	$("[name=nom_producto]").focusout(function(){
		var cod_int=$("#cod_int").val();
		var nom_producto=$("#nom_producto").val();
		$.ajax
		({
			url: "http://localhost:8080/systelecoms/index.php/ventas/Controller_ventas/buscar_producto",
			data: { "cod_int":cod_int , "nom_producto":nom_producto},
			type: "POST",
			success: function(result)
			{
				var $datos = $.parseJSON(result);
				$("#id_producto").val($datos[0].id_producto);
				$("#nom_producto").val($datos[0].nom_producto);
				$("#cod").val($datos[0].codigo_sat);
				$("#cod_int").val($datos[0].codigo_int);
				$("#desc").val($datos[0].descripcion);
				$("#cantidad_prod").val($datos[0].cantidad_prod);
				//$("#prec").val($datos[0].precio_cu);
				$("#cant").val($datos[0].cantidad);
			}
		});
	});	
});