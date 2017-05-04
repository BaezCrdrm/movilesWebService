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
    <?php
    require "../../scripts/service/queries.php";
    $consult="SELECT * FROM channels";
    $resultado= executeQuery($consult);
    echo "<table class='tabla'>  
          <tr>  
          <th>Id Channel</th>
          <th>Channel Name</th>  
          <th>Channel Abv</th>  
          <th></th>
          </tr>";
    while ($row = mysqli_fetch_row($resultado)){   
    echo "<tr>  
          <td>$row[0]</td>  
          <td>$row[1]</td>  
          <td>$row[2]</td>
          <td><img src='$row[3]'/></td>
          <td><a href='detalles.php?id=$row[0]'>Update</a></td>
          </tr>";
    }
    ?>

    </body>
</html>
<?php
}
else {
    header("Location:login.html");
}
?>