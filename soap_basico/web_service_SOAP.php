<?php

require_once "lib/nusoap.php";

function muestraPlanetas() {
	$planetas ="planetas del sistema solar";

	return $planetas;
}

function muestraImagen($categoria) {
	if ( $categoria == "espacio" ) {
		$imagen = "imagen.jpg";
	} else {
		$imagen = "imagen2.jpg";
	}

	$resultado = '<img src="img/'.$imagen.'" >';
	return $resultado;
}

if ( !isset( $HTTP_RAW_POST_DATA ) ) {
	$HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );
}

$server = new soap_server();
$server->configureWSDL("Info blog", "url:infoblog");
$server->register("muestraPlanetas",
	array(), //parametros
	array("return"=> "xsd:string"), //respuesta
	"urn:infoBlog", //namespace
	"urn:infoBlog#muestraPlanetas", //accion
	"rpc",
	"encoded",
	"Muestra el contenido para el blog"); //descripcion
$server->register("muestraImagen",
	array("categoria"=>"xsd:string"), //parametros
	array("return"=> "xsd:string"), //respuesta
	"urn:infoBlog", //namespace
	"urn:infoBlog#muestraImagen", //accion
	"rpc",
	"encoded",
	"Muestra una imagen variable"); //descripcion);


$server->service($HTTP_RAW_POST_DATA);

?>