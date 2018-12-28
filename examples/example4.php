<?php

/* Example of finding registration-table ID for specified MAC */

require('../routeros_api.class.php');

$API = new RouterosAPI();

$API->debug = true;

if ($API->connect('IP MIKROTIK', 'LOGIN', 'PASSWORD')) {

   $ARRAY = $API->comm("/interface/wireless/registration-table/print", array(
      ".proplist"=> ".id",
      "?mac-address" => "58:10:8C:70:E7:9E",
   ));
	
   print_r($ARRAY);

   $API->disconnect();

}

?>
