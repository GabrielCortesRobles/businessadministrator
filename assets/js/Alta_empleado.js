$(document).ready(function(){
	$("#enviar_empleado").on("click", function(){
		if($("[name = nom_empleado]").val()=="")
		{
			alert("El campo nombre del producto esta vacio");
		}
		else
		{
			var nom_empleado=$("[name = nom_empleado]").val();
			var ap_empleado=$("[name = ap_empleado]").val();
			var am_empleado=$("[name = am_empleado]").val();
			var curp_empleado=$("[name = curp_empleado]").val();
			var rfc_empleado=$("[name = rfc_empleado]").val();
			var fecha_nacimiento=$("[name = fecha_nacimiento]").val();
			var calle=$("[name = calle]").val();
			var numero_interior=$("[name = numero_interior]").val();
			var numero_exterior=$("[name = numero_exterior]").val();
			var colonia=$("[name = colonia]").val();
			var municipio=$("[name = municipio]").val();
			var cp=$("[name = cp]").val();
			var correo=$("[name = correo]").val();
			var telefono=$("[name = telefono]").val();
			var id_tipoempleado=$("[name = id_tipoempleado]").val();
			var sexo=document.getElementById('sexo1');
				if(sexo1.checked ==true)
				{
					sexo="Hombre";
				}
				else
				{
					sexo="Mujer";
				}
			var activo=document.getElementById('activo1');
				if(activo1.checked ==true)
				{
					activo="Si";
				}
				else
				{
					activo="No";
				}
			var contrasena=$("[name = contrasena]").val();
			var privilegio_venta = document.getElementById('privilegio_venta');
				if(privilegio_venta.checked ==true)
				{
					privilegio_venta=1;
				}
				else
				{
					privilegio_venta=0;
				}
			var privilegio_almacen = document.getElementById('privilegio_almacen');
				if(privilegio_almacen.checked ==true)
				{
					privilegio_almacen=1;
				}
				else
				{
					privilegio_almacen=0;
				}
			var privilegio_caja = document.getElementById('privilegio_caja');
				if(privilegio_caja.checked ==true)
				{
					privilegio_caja=1;
				}
				else
				{
					privilegio_caja=0;
				}
			
			$.ajax({
				url: "http://localhost:8080/systelecoms/index.php/empleado/Controller_empleado/insertar_empleado",
				data: {"nom_empleado":nom_empleado, "ap_empleado":ap_empleado, "am_empleado":am_empleado, "curp_empleado":curp_empleado,
				"rfc_empleado":rfc_empleado, "fecha_nacimiento":fecha_nacimiento, "calle":calle,"numero_interior":numero_interior,
				"numero_exterior":numero_exterior, "colonia":colonia, "municipio":municipio, "cp":cp, "correo":correo, "telefono":telefono, 
				"id_tipoempleado":id_tipoempleado, "sexo":sexo, "activo":activo, "contrasena":contrasena, 
				"privilegio_venta":privilegio_venta, "privilegio_almacen":privilegio_almacen, "privilegio_caja":privilegio_caja},
				type: "POST", 		
				success: function(result){						
					var confirmacion = confirm("¿Desea registrar un nuevo empleado?");
					if(confirmacion == true)
					{
						$("[name = nom_empleado]").val("");
						$("[name = ap_empleado]").val("");
						$("[name = am_empleado]").val("");
						$("[name = curp_empleado]").val("");
						$("[name = rfc_empleado]").val("");
						$("[name = fecha_nacimiento]").val("");
						$("[name = calle]").val("");
						$("[name = numero_interior]").val("");
						$("[name = numero_exterior]").val("");
						$("[name = colonia]").val("");
						$("[name = municipio]").val("");
						$("[name = cp]").val("");
						$("[name = correo]").val("");
						$("[name = telefono]").val("");
						$("[name = id_tipoempleado]").val("");
						$("[name = sexo]").val("");
						$("[name = activo]").val("");
						$("[name = contrasena]").val("");
						$("[name = privilegio_venta]").val("");
						$("[name = privilegio_almacen]").val("");
						$("[name = privilegio_caja]").val("");
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