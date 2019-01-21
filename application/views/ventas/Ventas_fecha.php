<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type = "text/javascript" src = "http://localhost:8080/systelecoms/assets/js/reporte_fecha.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas por fecha</title>
</head>
<body>
<br>
    <div class='container-fluid'>
        <div class='row justify-content-md-center'>
            <label>Desde:</label>
            <div class='col-md-2'>
                <input type="date" class='form-control' name="fecha1" id="fecha1" autofocus>
            </div>
            <label>Hasta:</label>
            <div class='col-md-2'>
                <input type="date" class='form-control' name="fecha2" id="fecha2">
            </div>
            <form>
                <div class="col-auto my-1">
                    <input type='button' class='btn btn-primary' value='Enviar' id='rfecha'>
                </div>
            </form>
        </div>
        <br>
        <div class='row'>
            <div class='col-md-12' id='contenido'>

            </div>
        </div>
    </div>
</body>
</html>