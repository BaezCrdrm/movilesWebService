<?php
session_start();
if($_SESSION["activeSession"] = true)
{
    require "../../scripts/service/channel.php";
    require "../../scripts/service/event.php";
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

                # divSelectedChannels{
                    float:right;
                }
        </style>
    </head>

    <body onload="onNewLoadEvent()">       
        <form action="../../scripts/admin/addEvent.php" method="GET">
            <!--Esta página servirá como plantilla tanto para agregar como para modificar eventos-->
            <input type="hidden" name="evId"/>
            <!--Cambiar formAction dependiendo lo que se vaya a realizar-->
            <input type="hidden" name="formAction" value="add"/>

            <label>Nombre de evento</label>
            <input type="text" placeholder="Nombre de evento" name="evName" required><br>
            <label>Fecha y hora de evento</label>
            <input type="datetime-local" id="dtlDateTime" name="evDateTime" required><br>
            
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
            <select>
                <?php                    
                    echo returnEventType();
                ?>
            </select><br>
            <label>Detalles del evento</label>
            <input type="textarea" placeholder="Detalles del evento" name="evDescription"><br>
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