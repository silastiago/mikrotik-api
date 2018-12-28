<?php

/* 3 step action 
   1) fetch all static dns hosts
   2) remove all static dns hosts
   3) add example host
*/

require('../routeros_api.class.php');
$API = new RouterosAPI();

if ($API->connect('IP MIKROTIK', 'LOGIN', 'PASSWORD')) {
   # Get all current hosts
	$ARRAY = $API->comm("/interface/wireless/registration-table/print", array(
      ".proplist"=> ".id",
      "?mac-address" => "58:10:8C:70:E7:9E",
   ));

	$ID=$ARRAY[0]['.id'];

	$API->write('/interface/wireless/registration-table/remove', false);
	$API->write('=.id='.$ID);


	$ARRAY = $API->read();
	print_r($ARRAY);
	$API->disconnect();
}
