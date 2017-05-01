<?php
function executeQuery($query)
{
    require "connection.php";

    $result = mysqli_query($connection, $query);
    return $result;
}
?>