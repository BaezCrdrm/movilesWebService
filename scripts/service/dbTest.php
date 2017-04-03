<?php
    require "connection.php";
    $query = "SELECT * FROM People";
    $c = mysqli_query($connection, $query);

    while($reg = mysqli_fetch_array($c, MYSQLI_NUM))
    {
        echo $reg[0];
    }
    echo "Fin";
?>