<?php

require_once "lib/nusoap.php";

$cliente = new nusoap_client("http://localhost/soap_basico/web_service_SOAP.php?wsdl&debug=0", 'wsdl');

$planetas = $cliente->call("muestraPlanetas");
$imagen = $cliente->call("muestraImagen", array("categoria"=>"espacio"));

echo "<h2>Los planetas</h2>";
echo "<p>".$planetas."</p>";
echo $imagen;




?>