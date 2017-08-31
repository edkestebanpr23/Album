<?php
	
	include "conexion.php";
	$conexion = mysqli_connect($host, $user, $pass, $db);
	if(!$conexion) {
		echo "<script>console.log('Error al conectarse a la base de datos');</script>";
	} else {
		echo "<script>console.log('Conexión establecida');</script>";

		// Recibir datos
		$name = 'Mario';
		$nickname = 'Gonorrea';
		$avatar = 'Lámpara :D';
		$pass = 'password';

		// Comprobar datos

		$query = "INSERT INTO user (name, nickname, pass, avatar) VALUES ('$name', '$nickname', '$pass', '$avatar');";
		$query_gonorrea = mysqli_query($conexion, $query);
		if ($query_gonorrea) {
			echo "<script>console.log('Usuario registrado correctamente');</script>";
		} else {
			echo "<script>console.log('Usuario no registrado');</script>";
		}

	}

?>