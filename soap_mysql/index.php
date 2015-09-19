<?php

require_once "lib/nusoap.php";

$cliente = new nusoap_client("http://localhost/soap_mysql/web_service_SOAP.php");

$platos = $cliente->call("muestraPlatos");

echo "<h2>Los platos</h2>";

echo "<ul>";
foreach ($platos as $item) {
	echo "<li>";
	echo "<b>".$item['nombre']."</b><br/>";
	echo $item['categoria'];
	echo "<br/>";
	echo "</li>";
	echo "<br/>";echo "<br/>";
}


echo "</ul>";



echo "<p>".$planetas."</p>";
echo $imagen;




?>