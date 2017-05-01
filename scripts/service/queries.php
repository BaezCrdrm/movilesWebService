<?php
//// En este archivo se encontrarán las funciones que
//// permiten la comunicación con la base de datos

function executeQuery($query)
{
    require "connection.php";

    $result = mysqli_query($connection, $query);
    return $result;
}

function generateId($sch)
{
    $array = explode("-", $sch);
    $year = $array[0];
    $month = $array[1];
    $day = $array[2];
    $idYear = str_split($year);  
    $tid = $idYear[2].$idYear[3].$month.$day;

    do {
        $rand = strval(substr(md5(microtime()),rand(0,26),5));      
        $id = $tid.$rand;
    } while (checkEventId($id) == true); 

    return $id; 
}

function createEvent($query, $id, $chs)
{
    $retValue = true;
    if(executeQuery($query))
    {
        for ($i=0; $i < count($chs); $i++) { 
            $query = "INSERT INTO event_channel (ev_id, ch_id) VALUES ('$id', ".$chs[0].")";
            executeQuery($query);
        }
        return true;
    }
}

function checkEventId($id)
{
    $query = "SELECT * FROM event WHERE ev_id = '$id'";
    $c = executeQuery($query);
    $reg = mysqli_fetch_array($c, MYSQLI_NUM);
    if($reg == null)
    {
        return false;
    } else {
        return true;
    }
}
?>