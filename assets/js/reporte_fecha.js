$(document).ready(function()
{
	$("#rfecha").click(function()
	{
        var fecha1=$("#fecha1").val();
        var fecha2=$("#fecha2").val();
        $.ajax({
            url: "http://localhost:8080/systelecoms/index.php/ventas/Controller_reporteventas/buscarventas",
            data: { "fecha1":fecha1,"fecha2":fecha2},
            type: "POST", 		
            success: function(result){						
                $("#contenido").html(result);
            
            }
        });
    });
});