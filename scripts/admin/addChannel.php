<?php
$action = $_GET["formAction"];
$chName = $_GET["chName"];
$chAbv = $_GET["chAbv"];
$chIcon = $_GET["chIconUrl"];

$chId;

if($action == "add")
{
    //Agregar canal
    
}
else {
    $chId = $_GET["chId"];
    // Modificar canal
}
?>