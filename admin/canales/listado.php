<?php
session_start();
if($_SESSION["activeSession"] = true)
{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Listado de canales</title>
    </head>

    <body>
        <h1>Canales</h1>

        <p><i><b>Nota:</b> Aquí habrá que listar TODOS
            los eventos e ir haciendo filtros</i>
        </p>
    </body>
</html>
<?php
}
else {
    header("Location:login.html");
}
?>