<?php
session_start();
if($_SESSION["activeSession"] = true)
{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Evento</title>
    </head>

    <body>
        

        <form>
            <!--Esta página servirá como plantilla tanto para agregar como para modificar eventos-->
            <label>Nombre de evento</label>
            <input type="text" placeholder="Nombre de evento" name="evName"><br>
            <label>Fecha y hora de evento</label>
            <input type="datetime-local" ame="evDateTime"><br>
            <label>Canal del evento</label>
            <!--Llenar con los canales cargados desde la base de datos-->
            <select id="slnChannel" namespace="evChannel" placeholder="Canal">
            </select><br>
            <label>Detalles del evento</label>
            <input type="textarea" placeholder="Detalles del evento" name="evDescription"><br>
            <input type="submit" value="Aceptar" />
        </form>
    </body>
</html>
<?php
}
else {
    header("Location:login.html");
}
?>