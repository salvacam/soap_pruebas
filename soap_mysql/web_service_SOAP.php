<?php

require_once "lib/nusoap.php";

$usuario = "userphp";
$password = "clavephp";
$hostname = "localhost";
$baseDatos = "bdphp";


$dbhandle = mysql_connect($hostname, $usuario, $password) 
	or die("no conexion bbdd");

$seleccion = mysql_select_db($baseDatos) 
	or die("base de datos no disponible");

function muestraPlatos() {
	$resultado = mysql_query("SELECT * FROM rest_plato");

	while ( $row = mysql_fetch_array($resultado) ) {
		$all[] = $row;
	}

	return $all;
}

if ( !isset( $HTTP_RAW_POST_DATA ) ) {
	$HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
}

$server = new soap_server();
$server->register("muestraPlatos");
$server->service($HTTP_RAW_POST_DATA);

exit();
?>