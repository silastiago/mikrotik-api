<?php

require('../routeros_api.class.php');

$API = new RouterosAPI();

$API->debug = true;

if ($API->connect('IP MIKROTIK', 'LOGIN', 'PASSWORD')) {

   $API->write('/interface/getall');

   $READ = $API->read(false);
   $ARRAY = $API->parseResponse($READ);

   print_r($ARRAY);

   $API->disconnect();

}

?>
