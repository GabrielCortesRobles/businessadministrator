<script>

$(document).ready(function()
{      
	$("#semana").click(function() { 	
        
		window.open("http://localhost:8080/systelecoms/index.php/ventas/Reporte_PDF_ventaultimasemana/ExportarPDF/", "width=380, height=500, top=85, left=50", true);		
		
	});
	
});
</script>

<fieldset class='form'>
		<br>
	<div align='center'>
	<h2>VENTAS DEL ULTIMA SEMANA</h2>
	</div>
	<hr>
	<div class="container-fluid">
	<div class="col-auto my-1">
            <input type="button" value="Reporte en PDF" class="btn btn-danger" name='semana' id="semana">
    </div>
		<br>
		
	<div class="col-sm-12 col-md-12 col-lg-12">
	<table class="table table-sm table-bordered">
	<thead>
    <tr class="bg-primary">
      <th scope="col">N. venta</th>
      <th scope="col">NOMBRE DEL CLIENTE</th>
      <th scope="col">NOMBRE DEL EMPLEADO</th>
	  <th scope="col">PRODUCTO</th>
	  <th scope="col">CANTIDAD</th>
	  <th scope="col">SUBTOTAL</th>
      <th scope="col">ESTADO</th>
      <th scope="col">FECHA</th>
      <th scope="col">HORA</th>
   </tr>
  </thead>
	<?php
	foreach ($res as $object){
		$id_venta=$object->id_venta;
		$cliente=$object->cliente;
		$empleado=$object->empleado;
		$nom_producto=$object->nom_producto;
		$cantidad=$object->cantidad;
		$subtotal=$object->subtotal;
		$estado=$object->estado;
		$fecha=$object->fecha;
		$hora_venta=$object->hora_venta;
		
		echo "<tbody>";
		echo "<tr>";
			echo "<td>".$id_venta."</td>";
			echo "<td>".$cliente."</td>";
			echo "<td>".$empleado."</td>";
			echo "<td>".$nom_producto."</td>";
			echo "<td>".$cantidad."</td>";
			echo "<td>".$subtotal."</td>";
			echo "<td>".$estado."</td>";
			echo "<td>".$fecha."</td>";
			echo "<td>".$hora_venta."</td>";
			echo "</tr>";
	echo "</tbody>";
	}
	?>
</table>
</div>
</div>
</fieldset>
