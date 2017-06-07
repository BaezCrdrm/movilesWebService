<?php
class client
{
	public function __construct()
	{
		$params = array('location' => 'http://192.168.1.64/MovilesWebService/scripts/service/soap/server.php',
			'uri' => 'urn://192.168.1.64/MovilesWebService/scripts/service/soap/server.php',
			'trace' => 1);

		$this -> instance = new SoapClient(NULL, $params);
	}

	public function getEvent($id_array)
	{
		return $this->instance->__soapCall('getEventDetails', $id_array);
	}
}

$client = new client;
?>