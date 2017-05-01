<?php
//// En este Script van todas las funciones no relacionadas directamente
//// a los formularios del administrador acerca de Eventos
function returnEventType()
{
    require_once "queries.php";
    $query = "SELECT tp_id, tp_name FROM types";
    $c = executeQuery($query);
    $opt = "";

    while($reg = mysqli_fetch_array($c, MYSQLI_NUM))
    {
        //Cambiar de ser necesario
        $opt .= "
        <option value='".$reg[0]."'>".$reg[1]."</option>";
    }
    return $opt;
}
?>