$(document).ready(function(){
	$("#cobrar_venta").click(function(){
		var id_venta=$("#id_venta").val();
		var recibido_venta=$("#recibido_venta").val();
		var cambio_venta=$("#cambio_venta").val();
		if(cambio_venta == 0)
		{
			alert("Varifique la cantidad recibida, por favor");
		}
		else
		{
			var confirmacion = confirm("¿esta seguro de realizar este cobro?");
			if(confirmacion == true)
			{
				$.ajax({
					url: "http://localhost:8080/systelecoms/index.php/ventas/Controller_caja/insertar_cobro",
					data: {"id_venta":id_venta,"recibido_venta":recibido_venta,"cambio_venta":cambio_venta},
					type: "POST", 	
					success: function(result){
						alert("cobro realizado con exito")
						location.reload();
					}
				});
			}
			else
			{
				
			}
		}
		});
});