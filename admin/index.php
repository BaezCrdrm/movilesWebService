<?php
session_start();
if($_SESSION["activeSession"] == true)
{
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Menú administración</title>
    </head>

    <body>
        <h1>Menú administrador</h1>
        <h3>Eventos</h3>
        <ul>
            <li><a href="eventos/listado.php">Listado de eventos</a></li>
            <li><a href="eventos/detalles.php?evid=null">Alta de evento</a></li>
        </ul>
        <h3>Canales</h3>
        <ul>
            <li><a href="canales/listado.php">Listado de canales</a></li>
            <li><a href="canales/detalles.php?id=null">Alta de canales</a></li>
            </ul>
    </body>
</html>
<?php
}
else {
    header("Location:login.html");
}
?>