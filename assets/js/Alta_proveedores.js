$(document).ready(function(){
	$("#enviar_proveedor").on("click", function(){
		if($("[name = rfc_proveedor]").val()=="")
		{
			alert("El campo rfc esta vacio");
		}
		else
		{
			var rfc_proveedor=$("#rfc_proveedor").val();
			var nom_empresa=$("#nom_empresa").val();
			var nom_producto=$("#nom_producto").val();
			var direccion=$("#direccion").val();
			var correo=$("#correo").val();
			var telefono=$("#telefono").val();
			var cant_surt=$("#cant_surt").val();
			var precio=$("#precio").val();
			var activo=document.getElementById('activo_prov1');
				if(activo_prov1.checked ==true)
				{
					activo="Si";
				}
				else
				{
					activo="No";
				}		   
			$.ajax({
				url: "http://localhost:8080/systelecoms/index.php/proveedor/Controller_proveedor/insertar_proveedor",
				data: { "rfc_proveedor":rfc_proveedor,"nom_empresa":nom_empresa,"nom_producto":nom_producto, 
				"direccion":direccion, "correo":correo, "telefono":telefono , 
				"cant_surt":cant_surt, "precio":precio ,"activo":activo},
				type: "POST", 	
				success: function(result){
					var confirmacion = confirm("¿Desea registrar un nuevo proveedor?");
					if(confirmacion == true)
					{
						$('[name = rfc_proveedor]').val("");
						$('[name = nom_empresa]').val("");
						$('[name = nom_producto]').val("");
						$('[name = direccion]').val("");
						$('[name = correo]').val("");
						$('[name = telefono]').val("");
						$('[name = cant_surt]').val("");
						$('[name = precio]').val("");
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