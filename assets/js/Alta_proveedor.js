$(document).ready(function(){
	$("#enviar_proveedor").click(function(){
		if($("[name = rfc_proveedor]").val()=="")
		{
			confirm("El campo  esta vacio");
		}
		else
		{
		
			var rfc_proveedor=$("[name = rfc_proveedor]").val();
			  var nom_empresa=$("[name = nom_empresa]").val();
			    var direccion=$("[name = direccion]").val();
			       var correo=$("[name = correo]").val();
			     var telefono=$("[name = telefono]").val();
			       var activo=$("[name = activo]").val();
			$.ajax({
				url: "http://localhost:8080/systelecoms/index.php/proveedor/Controller_proveedor/insertar_proveedor",
				data: { "rfc_proveedor":rfc_proveedor,"nom_empresa":nom_empresa, "direccion":direccion, "correo":correo, "telefono":telefono , 
				"activo":activo},
				type: "POST", 		
				success: function(result){						
					alert("Inserción Exitosa!");
					$('[name = rfc_proveedor]').val("");
					$('[name = nom_empresa]').val("");
					$('[name = direccion]').val("");
					$('[name = correo]').val("");
					$('[name = telefono]').val("");
					$('[name = activo]').val("");
				
				}
			});
		}
	});
});