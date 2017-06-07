<?php
session_start();
if($_SESSION["activeSession"] = true)
{
    require "../../scripts/service/channel.php";
    require "../../scripts/service/event.php";

    $idConsult = $_GET["evid"];
    require_once "../../scripts/service/queries.php";

    if($idConsult != "null")
    {
        $query = "SELECT event.ev_id, event.ev_name, event.ev_sch, event.ev_sch_end, event.ev_des, type_event.tp_id "; 
        $query .= "FROM event INNER JOIN type_event ON event.ev_id = type_event.ev_id WHERE event.ev_id = '$idConsult'";

        $consult = executeQuery($query);

        $name = "";
        $sch = null;
        $type = 0;
        $details = "";

        while ($row = mysqli_fetch_row($consult))
        {
            $name = $row[1];
            $sch = $row[2];
            $sch_end = $row[3];
            $details = $row[4];
            $type = $row[5];
        }

        $query = "SELECT ch_id FROM event_channel WHERE ev_id = '$idConsult'";
        $consult = null;
        $consult = executeQuery($query);

        $channels = request($query);

        $sch = str_replace(" ", "T", $sch);
        $sch_end = str_replace(" ", "T", $sch_end);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Evento</title>

        <script src="../../scripts/service/scripts.js"></script>
        <style type="text/css">
            #divChannels {
                width:100%;
            }

            .divChannelSelectionList {
                width:300px;
                height:300px;
                overflow: scroll;
            }

                #divAllChannels{
                    float:left;
                }

                /*#divSelectedChannels{
                    float:right;
                }*/
        </style>
    </head>

    <body onload="onNewLoadEvent()">       
        <form action="../../scripts/admin/addEvent.php" method="GET">
            <!--Esta página servirá como plantilla tanto para agregar como para modificar eventos-->
            <input type="hidden" name="evId" 
            <?php
            if($idConsult != "null")
            {
                echo "value = '$idConsult'";
            }
            ?> />
            <input type="hidden" name="formAction"
            <?php
            if($idConsult != "null"){
                echo "value='update'";
            }else{
                echo "value='add'";
            }            
            ?> />

            <label>Nombre de evento</label>
            <input type="text" placeholder="Nombre de evento" name="evName" required 
            <?php
            if($idConsult != "null"){
                echo "value='$name'";
            }
            ?>><br>
            <label>Fecha y hora de inicio del evento</label>
            <input type="datetime-local" id="dtlDateTime" name="evDateTime" required 
            onchange="onDateTimePickerChange()" 
            <?php
            if($idConsult != "null"){
                echo "value='$sch'";
            }
            ?>
            ><br>

            <label>Fecha y hora de término del evento</label>
            <input type="datetime-local" id="dtlDateTimeEnd" name="evDateTimeEnd" required  
            <?php
            if($idConsult != "null"){
                echo "value='$sch_end'";
            }
            ?>
            ><br>
            
            <label>Canal del evento</label>
            <div id="divChannels">
                <div id="divAllChannels" class="divChannelSelectionList">
                    <h2>Todos los canales</h2>
                    <ul>
                        <!-- https://www.formget.com/php-checkbox/ -->
                        <?php
                            echo returnChannelName()
                        ?>
                    </ul>
                </div>
                <div id="divSelectedChannels" class="divChannelSelectionList">
                    <!--Sección informativa-->
                    <h2>Canales seleccionados</h2>
                    <ul id="ulSelectedChannels"></ul>
                </div>
                <br>
            </div>

            <label>Tipo de evento</label>
            <select id="slTypeEvent" name="evType">
                <?php                    
                    echo returnEventType($type);
                ?>
            </select><br>
            <label>Detalles del evento</label>
            <input type="textarea" placeholder="Detalles del evento" name="evDescription" 
            <?php
            if($idConsult != "null"){
                echo "value='$details'";
            }
            ?>
            ><br>
            <input type="submit" value="Aceptar" />
        </form>        
    </body>    
</html>
<?php
}
else {
    header("Location:login.html");
}
?>