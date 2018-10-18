$(document).ready(function(){
	$("#enviar_producto").on("click", function(){
		if(
		$("[name = nom_producto]").val()=="" | $("[name = marca]").val()=="" |
		$("[name = id_proveedor]").val()=="" | $("[name = codigo_int]").val()=="" |
		$("[name = codigo_sat]").val()=="" | $("[name = cantidad_prod]").val()=="" |
		$("[name = descripcion]").val()=="" | $("[name = precio_cu]").val()=="" |
		$("[name = precio_menudeo]").val()=="" | $("[name = precio_mayoreo]").val()=="" |
		$("[name = piezas_mediomayoreo]").val()=="" | $("[name = piezas_mayoreo]").val()==""
		)
		{
			alert("Algun campo requerido se encuentra vacío");
		}
		else
		{
			var nom_producto=$("[name = nom_producto]").val();
			var marca=$("[name = marca]").val();
			var id_proveedor=$("[name = id_proveedor]").val();
			var codigo_int=$("[name = codigo_int]").val();
			var codigo_sat=$("[name = codigo_sat]").val();
			var cantidad_prod=$("[name = cantidad_prod]").val();
			var descripcion=$("[name = descripcion]").val();
			var precio_adquisicion=$("[name = precio_adquisicion]").val();
			var precio_cu=$("[name = precio_cu]").val();
			var precio_menudeo=$("[name = precio_menudeo]").val();
			var precio_mayoreo=$("[name = precio_mayoreo]").val();
			var piezas_mediomayoreo=$("[name = piezas_mediomayoreo]").val();
			var piezas_mayoreo=$("[name = piezas_mayoreo]").val();
			var activo=document.getElementById('activo_prod1');
				if(activo_prod1.checked ==true)
				{
					activo="Si";
				}
				else
				{
					activo="No";
				}
			$.ajax({
				url: "http://localhost:8080/systelecoms/index.php/producto/Controller_producto/insertar_producto",
				data: {"nom_producto":nom_producto, "marca":marca, "id_proveedor":id_proveedor, "codigo_int":codigo_int,
				"codigo_sat":codigo_sat, "cantidad_prod":cantidad_prod, "descripcion":descripcion, "precio_adquisicion":precio_adquisicion, "precio_cu":precio_cu,
				"precio_menudeo":precio_menudeo, "precio_mayoreo":precio_mayoreo, "piezas_mediomayoreo":piezas_mediomayoreo,
				"piezas_mayoreo":piezas_mayoreo,"activo":activo},
				type: "POST", 		
				success: function(result){						
					var confirmacion = confirm("¿Desea registrar un nuevo proveedor?");
					if(confirmacion == true)
					{
						$('[name = nom_producto]').val("");
						$('[name = marca]').val("");
						$('[name = id_proveedor]').val("");
						$('[name = codigo_int]').val("");
						$('[name = codigo_sat]').val("");
						$('[name = cantidad_prod]').val("");
						$('[name = descripcion]').val("");
						$('[name = precio_adquisicion]').val("");
						$('[name = precio_cu]').val("");
						$('[name = precio_menudeo]').val("");
						$('[name = precio_mayoreo]').val("");
						$('[name = piezas_mediomayoreo]').val("");
						$('[name = piezas_mayoreo]').val("");
					}
					else
					{
						location.reload();
					}
				}
			});
		}
	});
});