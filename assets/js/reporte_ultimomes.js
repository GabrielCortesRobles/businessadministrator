$(document).ready(function()
{
	$("#rfecha").click(function()
	{
        $.ajax({
            url: "http://localhost:8080/systelecoms/index.php/ventas/Controller_reporteventas/ventasultimomes",
            data: { "fecha1":fecha1,"fecha2":fecha2},
            type: "POST", 		
            success: function(result){						
                $("#contenido").html(result);
            
            }
        });
    });
});