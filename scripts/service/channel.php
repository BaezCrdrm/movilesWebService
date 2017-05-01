<?php
function returnChannelName()
{
    require_once "queries.php";
    $query = "SELECT ch_id, ch_name FROM channels";
    $c = executeQuery($query);
    $opt = "";

    while($reg = mysqli_fetch_array($c, MYSQLI_NUM))
    {
        //Cambiar de ser necesario
        $opt .= "
        <li><input type='checkbox' alt='".$reg[1]."' onchange='checkedChange(this)' id='ch_".$reg[0]."' name='channels' value='".$reg[0]."'>".$reg[1]."</input></li>";
    }
    return $opt;
}
?>