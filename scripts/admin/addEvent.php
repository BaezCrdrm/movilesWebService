<?php
$action = $_GET["formAction"];
$evName = $_GET["evName"];
$evSch = $_GET["evDateTime"];
//Agregar canales del evento

//Arreglo que contiene los elementos seleccionados
$chChecked = $_GET[""];

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