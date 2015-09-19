<?php

require_once "lib/nusoap.php";

$cliente = new nusoap_client("http://www.webservicex.net/globalweather.asmx?wsdl", 'wsdl');

$resultado = $cliente->call("GetCitiesByCountry", array("CountryName"=>"spain"));
var_dump($resultado);


/*
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
*/



?>
