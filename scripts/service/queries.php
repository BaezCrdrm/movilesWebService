<?php
//// En este archivo se encontrarán las funciones que
//// permiten la comunicación con la base de datos
function executeQuery($query)
{
    require "connection.php";

    $result = mysqli_query($connection, $query);
    return $result;
}
?>