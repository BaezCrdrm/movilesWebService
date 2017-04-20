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
        <ul>
            <li><a href="#">Listado de eventos</a></li>
            <li><a href="#">Alta de evento</a></li>
            <li><a href="#">Baja de evento</a></li>
            <li><a href="#">Modificación de evento</a></li>
        </ul>
    </body>
</html>
<?php
}
else {
    header("Location:login.html");
}
?>