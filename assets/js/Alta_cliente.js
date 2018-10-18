$(document).ready(function(){
	$("#enviar_cliente").click(function(){
		if($("[name = nom_cliente]").val()=="")
		{
			alert("El campo nombre del producto esta vacio");
		}
		else
		{
	
			var rfc_cliente=$("#rfc_cliente").val();
			var nom_cliente=$("#nom_cliente").val();
			var ap_cliente=$("#ap_cliente").val();
			var am_cliente=$("#am_cliente").val();
			var curp_cliente=$("#curp_cliente").val();
			var fecha_nacimiento=$("#fecha_nacimiento").val();
			var calle=$("#calle").val();
			var numero_interior=$("#numero_interior").val();
			var numero_exterior=$("#numero_exterior").val();
			var colonia=$("#colonia").val();
			var municipio=$("#municipio").val();
			var cp=$("#cp").val();
			var correo=$("#correo_cli").val();
			var telefono=$("#telefono_cli").val();
			var sexo=document.getElementById('sexo_cli1');
				if(sexo_cli1.checked ==true)
				{
					sexo="Hombre";
				}
				else
				{
					sexo="Mujer";
				}
			var activo=document.getElementById('activo_cli1');
				if(activo_cli1.checked ==true)
				{
					activo="Si";
				}
				else
				{
					activo="No";
				}
			$.ajax({
				url: "http://localhost:8080/systelecoms/index.php/cliente/Controller_cliente/insertar_cliente",
				data: {"rfc_cliente":rfc_cliente, "nom_cliente":nom_cliente, "ap_cliente":ap_cliente, "am_cliente":am_cliente, "curp_cliente":curp_cliente,
						"fecha_nacimiento":fecha_nacimiento,"calle":calle, "numero_interior":numero_interior, "numero_exterior":numero_exterior, "colonia":colonia,
				"municipio":municipio, "cp":cp, "correo":correo, "telefono":telefono, "sexo":sexo, "activo":activo},
				type: "POST", 		
				success: function(result){						
					var confirmacion = confirm("¿Desea registrar un nuevo cliente?");
					if(confirmacion == true)
					{
						$('[name = rfc_cliente]').val("");
						$('[name = nom_cliente]').val("");
						$('[name = ap_cliente]').val("");
						$('[name = am_cliente]').val("");
						$('[name = curp_cliente]').val("");
						$('[name = fecha_nacimiento]').val("");
						$('[name = calle]').val("");
						$('[name = numero_interior]').val("");
						$('[name = numero_exterior]').val("");
						$('[name = colonia]').val("");
						$('[name = municipio]').val("");
						$('[name = cp]').val("");
						$('[name = correo_cli]').val("");
						$('[name = telefono_cli]').val("");
						$('[name = sexo]').val("");
						$('[name = activo]').val("");
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