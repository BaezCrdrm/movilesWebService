<?php
$action = $_GET["formAction"];
$evName = $_GET["evName"];
$evSch = $_GET["evDateTime"];
$evSchEnd = $_GET["evDateTimeEnd"];
$evDes = $_GET["evDescription"];
$chChecked = $_GET["channels"];
$evType = $_GET["evType"];
$chId;

require "../service/queries.php";
if($action == "add")
{
    //Agregar evento
    $arrayd1 = explode("T", $evSch);
    $beginingDate = $arrayd1[0];
    $arrayd2 = explode("T", $evSchEnd);
    $endingDate = $arrayd2[0];

    $chId = generateId($beginingDate);

    $query = "INSERT INTO event (ev_id, ev_name, ev_sch, ev_sch_end, ev_des) ";
    $query .= "VALUES ('$chId', '$evName', '$beginingDate ".$arrayd1[1]."', '$endingDate ".$arrayd2[1]."', '$evDes')";

    if(createEvent($query, $chId, $chChecked, $evType))
    {
        echo "The new event has been successfully added.<br>";
    } else {
        echo "There has been a problem adding the new event.";
    }
}
else {
    $chId = trim($_GET["evId"]);
    // Modificar evento
    $query = "DELETE FROM event_channel WHERE ev_id='$chId'";
    if(executeQuery($query))
    {
        echo "The event has been successfully deleted";
    } else {
        echo "There has been a problem. The event hasn't been deleted";
    }
    // $array = explode("T", $evSch);
    // $date = $array[0];

    $arrayd1 = explode("T", $evSch);
    $beginingDate = $arrayd1[0];
    $arrayd2 = explode("T", $evSchEnd);
    $endingDate = $arrayd2[0];

    $query = "UPDATE event SET ev_name = '$evName', ";
    $query .= "ev_sch = '$beginingDate ".$arrayd1[1]."', ev_sch_end = '$endingDate ".$arrayd2[1]."', ";
    $query .= "ev_des = '$evDes' WHERE ev_id = '$chId'";

    if(updateEvent($query, $chId, $chChecked, $evType))
    {
        echo "<br>The new event has been successfully Updated";
    } else {
        echo "<br>There has been a problem Updating the new event";
    }
    
}
?>