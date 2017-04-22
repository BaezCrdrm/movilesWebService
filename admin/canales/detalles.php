<?php
session_start();
if($_SESSION["activeSession"] = true)
{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Canales</title>
    </head>

    <body>
        <h3>Abrir en:</h3>
        <ul>
            <li>Microsoft edge</li>
            <li>Google chrome</li>
            <li>Opera (Escritorio)</li>
            <li>Firefox</li>
        </ul>
        <form>
            <!--Esta página servirá como plantilla tanto para agregar como para modificar eventos-->
            <label>Nombre de canal</label>
            <input type="text" placeholder="Nombre de canal" name="chName"><br>
            <label>Abreviatura del nombre de canal</label>
            <input type="text" placeholder="Abreviatura" name="chAbv"><br>
            <label>URL de ícono</label>
            <input type="url" placeholder="URL" name="chIconUrl"><br>
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