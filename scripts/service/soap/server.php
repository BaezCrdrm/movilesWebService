<?php

class server 
{
    private $con;
    public function __construct()
    {
        $this->con = (is_null($this->con)) ? self::connect() : $this->con;
    }

    static function connect()
    {
        $con = mysql_connect('localhost', 'root', '');
        $db = mysql_select_db('broadcaster', $con);

        return $con;
    }

    public function getEventDetails($id_array)
    {

        $id = $id_array;
        $query = "SELECT event.ev_id, event.ev_name, event.ev_sch";
        if($id != null && $id != "null")
        {
            $query .= ", types.tp_name, types.tp_img FROM event INNER JOIN type_event ";
            $query .= "ON type_event.ev_id = event.ev_id INNER JOIN types ON type_event.tp_id = types.tp_id ";
            $query .= "WHERE event.ev_id = '$id'";
        }
        else {
            $query .= " FROM event";
        }

        $res = mysql_fetch_array(mysql_query($query, $this->con));

        return $res['ev_name'];
    }

    public function getEventList($type)
    {

    }

    public function testServerConnection()
    {
        return true;
    }
}

$params = array('uri' => '192.168.1.64/MovilesWebService/scripts/service/soap/server.php');
$server = new SoapServer(NULL, $params);
$server -> setClass('server');
$server -> handle();
?>