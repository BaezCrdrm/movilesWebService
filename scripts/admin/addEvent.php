<?php
$action = $_GET["formAction"];
$evName = $_GET["evName"];
$evSch = $_GET["evDateTime"];
$evDes = $_GET["evDescription"];
$chChecked = $_GET["channels"];
$chId;

require "../service/queries.php";
if($action == "add")
{
    //Agregar evento
    $array = explode("T", $evSch);
    $date = $array[0];
    $chId = generateId($date);

    $query = "INSERT INTO event (ev_id, ev_name, ev_sch, ev_des) VALUES ('$chId', '$evName', '$date ".$array[1]."', '$evDes')";

    if(createEvent($query, $chId, $chChecked))
    {
        echo "The new event has been successfully added";
    } else {
        echo "There has been a problem adding the new event";
    }
}
else {
    $chId = $_GET["evId"];
    // Modificar evento
}
?>