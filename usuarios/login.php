<?php

session_start();

//obtener variables
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];

//Crearemos conexion
	require "../mi_conexion2014/conexion.rts";
	$bd = new BD;
			
//Consulta
	$ssql = "select * from usuario;";

//Lanzar la consulta
	$resultado = pg_query($ssql);

//Repasar los resultados
	while ($tupla = pg_fetch_array($resultado))
	{
		echo 'entre al while';
		$usuariobasedatos = trim($tupla['usuario']);
//		echo $usuariobasedatos."fin";
		$contrasenabasedatos = trim($tupla['contrasena']);
		
		if ($usuario == $usuariobasedatos &
			$contrasena == $contrasenabasedatos)
		{
			echo 'entre en el if';
//Si el resultado es positivo, entonces asignar
			$_SESSION['usuario'] = $usuario;
			$_SESSION['contrasena'] = $contrasena;
			
			echo '
<html>
	<head>
		<meta http-equiv="REFRESH" content="0;url=../principal.php">
	</head>
</html>

			';
		}else{
//Si el resultado es negativo, entonces nada
		}
	}
//Cerramos base de datos

?>
