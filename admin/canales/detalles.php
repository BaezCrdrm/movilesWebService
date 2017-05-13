<?php
session_start();
if($_SESSION["activeSession"] = true)
{
    $idconsult = trim($_GET["id"]);
    require "../../scripts/service/queries.php";
    $query = "SELECT * FROM channels WHERE ($idconsult=ch_id)";
    $consult=executeQuery($query);

    $name = "";
    $abreviatura = "";
    $url = "";
    while ($row = mysqli_fetch_row($consult)){
          $name = $row[1];
          $abreviatura = $row[2];
          $url = $row[3];
    }
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
        <form action="../../scripts/admin/addChannel.php" method="GET">
            <!--Esta página servirá como plantilla tanto para agregar como para modificar eventos-->
            <input type="hidden" name="chId"
            <?php
            $id = $_GET["id"];
            if($id != null){
                echo "value='$id'";
            }
            ?> />
            <!--Cambiar formAction dependiendo lo que se vaya a realizar-->
            <input type="hidden" name="formAction"
            <?php
            if($id != null){
                echo "value='update'";
            }else{
                echo "value='add'";
            }
            ?> />
            <label>Nombre de canal</label>
            <input type="text" placeholder="Nombre de canal" name="chName" required
            <?php
            if($id != null){
                echo "value='$name'";
            }
            ?>> <br>
            <label>Abreviatura del nombre de canal</label>
            <input type="text" placeholder="Abreviatura" maxlength="4" name="chAbv" required
            <?php
            if($id != null){
                echo "value='$abreviatura'";
            }
            ?>><br>
            <label>URL de ícono</label>
            <input type="url" placeholder="URL" name="chIconUrl"
            <?php
            if($id != null){
                echo "value='$url'";
            }
            ?>><br>
            <input type="submit" value="Aceptar"/>
        </form>
    </body>
</html>
<?php
}
else {
    header("Location:login.html");
}
?>