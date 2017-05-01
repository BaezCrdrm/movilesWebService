<?php
$action = $_GET["formAction"];
$chName = trim(strtoupper($_GET["chName"]));
$chAbv = trim(strtoupper($_GET["chAbv"]));
$chIcon = trim($_GET["chIconUrl"]);

require "../service/queries.php";

if($action == "add")
{
    //Agregar canal
    $query = "INSERT INTO channels (ch_name, ch_abv, ch_img) VALUES ('$chName', '$chAbv', '$chIcon')";

    if(executeQuery($query))
    {
        echo "The new channel has been successfully added";
    } else {
        echo "There has been a problem. The new channel hasn't been added";
    }
}
else {
    $chId = trim($_GET["chId"]);
    // Modificar canal
    $query = "UPDATE channels SET ch_name = '$chName', ch_abv = '$chAbv', ch_img='$chIcon' WHERE ch_id = '$chId'";
    if(executeQuery($query))
    {
        echo "The channel has been successfully modified";
    } else {
        echo "There has been a problem. The channel hasn't been modified";
    }
}
?>