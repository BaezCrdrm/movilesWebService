<?php
$action = $_GET["formAction"];
$evName = $_GET["evName"];
$evSch = $_GET["evDateTime"];
//Agregar canales del evento

$chId;

if($action == "add")
{
    //Agregar evento
    
}
else {
    $chId = $_GET["evId"];
    // Modificar evento
}
?>