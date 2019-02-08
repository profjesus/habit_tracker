<?php
	// Credenciais base de datos
	$url = getenv('JAWSDB_URL') ?: 'mysql://alan:turing@localhost:3306/ENIGMA';
	$dbparts = parse_url($url);
	$servername = $dbparts['host'];
	$username = $dbparts['user'];
	$password = $dbparts['pass'];
	$database = ltrim($dbparts['path'],'/');

	// Crear conexion MySQL
	$conn = mysqli_connect($servername, $username, $password, $database);

	// Comprobar conexion, se falla mostrar erro
	if (!$conn) {
		die('<p>Fallou a conexion coa base de datos: </p>' . mysqli_connect_error());
	}
?>
