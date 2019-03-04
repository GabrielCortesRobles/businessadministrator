$(document).ready(function(){
	var tot=0;
	//AGREGA EL PRODUCTO A LA TABLA DEL MODULO DE VANTA 
    $("#agregar").on("click",function(){
		var cantidad_prod = Number( $('#cantidad_prod').val());
		var cant=Number( $("#cant").val());
		//var res = (cant < cantidad_prod );
		//alert(res);
		if( cant <= cantidad_prod )
		{
			/*------------------------------------------------------------ Inicia la ejecucion de ajax para la actualizacion de la existenca del producto ------------------------------------------------------------*/
			var id_producto=$("[name=id_producto]").val();
			//alert(cant);
			$.ajax({
				url: "http://localhost:8080/systelecoms/index.php/ventas/Controller_ventas/actualizar_prod",
				data: {"id_producto":id_producto, "cant":cant},
				type: "POST",
				success: function(result){						
					
					}
				});
					var nom_producto=$("#nom_producto").val();
					var desc=$("[name=desc]").val();
					var prec=$("[name=prec]").val();
					var cod =$("[name=cod]").val();
					var cod_int=$("[name=cod_int]").val();
					var subt= prec*cant;
					$("#mitabla").append("<tr align='center'><td>"+id_producto+"</td><td>"+cod_int+"</td><td>"+nom_producto+"</td><td>"+cod+"</td><td>"+desc+"</td><td>"+prec+"</td><td>"+cant+"</td><td>"
					+subt+"</td>"+"<td><input type='button' value='Eliminar' name='eliminar' class='eli'/></td></tr>");
						tot = tot+subt;
						$("#total").val(tot);
						$("#id_producto").val("");
						$("#cod").val("");
						$("#nom_producto").val("");
						$("#cod_int").val("");
						$("#desc").val("");
						$("#cantidad_prod").val("");
						$("#prec").val("");
						$("#cant").val("");
						$("#totalprod").val("");
		}
		else
		{
			alert('ohoh!, No hay suficientes productos')
		}

	});
	
	//ELIMINNA LAS FILAS DE LA TABLA 
	$(document).on("click",".eli", function(){
			 $(this).parents("tr").remove();
			 var id_producto = $(this).parents("tr").find("td").eq(0).html();
			 var cant = $(this).parents("tr").find("td").eq(6).html();

			 $.ajax({
				url: "http://localhost:8080/systelecoms/index.php/ventas/Controller_ventas/actualizar_prod2",
				data: {"id_producto":id_producto, "cant":cant},
				type: "POST",
				success: function(result){						
					
					}
				});
		   var sb = $(this).parents("tr").find("td").eq(7).html();
		   tot = tot-sb;
		   $("#total").val(tot);
	});
	
	//REFRESCA LA PAGINA
	$("#cancelarventa").click(function(){
		Location.reload();
	});

	$("#ticket").click(function(){
				$.ajax({
					url: 'http://localhost:8080/systelecoms/assets/Ticket_venta.php',
					type: 'POST',
					success: function(response){
							if(response==1){
									alert('Imprimiendo....');
							}else{
									alert('Error');
							}
					}
			}); 
    });
	
	//PERMITE COBRAR EN EL MODULO DE VETAS SI SE TIENE EL USUARIO CAJA ACTIVADO
	$("[name = cobrar]").one("click", function()
	{
		$("#cobro").removeAttr("hidden");
		$("#cobrar").attr("hidden",true);
	});
	
	//REALIZA LA OPERACION PARA DETERMINAR EL TOTAL DE LA VENTA
    $("[name=recibido_venta]").focusout(function(){
		var recibido_venta=$("#recibido_venta").val();
		var total=$("#total").val();
		var cambio_venta = recibido_venta - total;
		
		if(cambio_venta < 0)
		{
			alert("Varifique la cantidad recibida, por favor");
			$("[name=cambio_venta]").val("0");
			$("[name=recibido_venta]").val("");
		}
		else
		{
			var cambio_venta = recibido_venta - total;
			//$("[name=cambio_venta]").val(cambio_venta);
			$('#cambio_venta').val(new Intl.NumberFormat('es-MX').format(cambio_venta));
		}
    });
});