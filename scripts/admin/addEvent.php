<?php
$action = $_GET["formAction"];
$evName = $_GET["evName"];
$evSch = $_GET["evDateTime"];
$evDes = $_GET["evDescription"];
$chChecked = $_GET["channels"];
$evType = $_GET["evType"];
$chId;

require "../service/queries.php";
if($action == "add")
{
    //Agregar evento
    $array = explode("T", $evSch);
    $date = $array[0];
    $chId = generateId($date);

    $query = "INSERT INTO event (ev_id, ev_name, ev_sch, ev_des) VALUES ('$chId', '$evName', '$date ".$array[1]."', '$evDes')";

    if(createEvent($query, $chId, $chChecked, $evType))
    {
        echo "The new event has been successfully added";
    } else {
        echo "There has been a problem adding the new event";
    }
}
else {
    $chId = trim($_GET["evId"]);
    // Modificar evento
    $query = "DELETE FROM event_channel WHERE ev_id='$chId'";
    if(executeQuery($query))
    {
        echo "The event has been successfully delete";
    } else {
        echo "There has been a problem. The event hasn't been delete";
    }
    $array = explode("T", $evSch);
    $date = $array[0];

    $query = "UPDATE event SET ev_name = '$evName', ev_sch = '$date ".$array[1]."', ev_des = '$evDes' WHERE ev_id = '$chId'";

    if(updateEvent($query, $chId, $chChecked, $evType))
    {
        echo "  The new event has been successfully Update";
    } else {
        echo "  There has been a problem Updating the new event";
    }
    
}
?>