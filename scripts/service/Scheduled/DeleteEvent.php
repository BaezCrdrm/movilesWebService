<?php
require "../queries.php";
$query = "SELECT ev_id, ev_sch_end FROM event";

$res = executeQuery($query);
date_default_timezone_set('America/Mexico_City');
$now = date("Y-m-d H:i:s");

foreach ($res as $row) {
    if($now >= $row['ev_sch_end'])
    {
        $query = "DELETE FROM event WHERE ev_id = '".$row['ev_id']."'"; 
        if(executeQuery($query)) {
            echo "The event has been succesfully deleted. Id: ".$row['ev_id'];
        }
        else {
            echo "There has been a problem while deleting the event. Id: ".$row['ev_id'];
        }
    }
}
?>