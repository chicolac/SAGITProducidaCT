<?php
	//Obtendre las variables
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$edad = $_POST['edad'];
	//$usuario = $_POST['usuario'];
	
	//Conexion
	require "../mi_conexion2014/conexion.rts";
	$bd = new BD;

	/*Privilegios son:
	1 = administrador
	2 = controlador
	3 = usuario registrado
	4 = usuario invitado

	*/
	
	//Antes de insertar necesito generar la llave para insertar
	$consulta = "select * from usuario order by cod_usuario;";
	$resultado = pg_query($consulta);
	
	while ($tupla = pg_fetch_array($resultado))
	{
		echo $tupla['cod_usuario'].'<br>';
		$falta_identificador = $tupla['cod_usuario'];
	}
	
	$primera_parte = substr($falta_identificador,0,3);
	echo "Yo soy lo que queda: ".$primera_parte.'<br>';
	
	$sumar = substr($falta_identificador,3,9);
	echo "Antes de sumar a la otra parte: ".$sumar.'<br>';
	$sumar = $sumar + 1;
	echo "Despues de sumar 1 a la otra parte: ".$sumar.'<br>';
	
	$falta_identificador = $primera_parte.$sumar;
	echo $falta_identificador;

	//Consulta
	$ssql = 	

	<<<SQL
	INSERT INTO usuario VALUES('$falta_identificador', '$usuario', '$contrasena', '$nombre', '$apellido', '$edad', 3)
	
SQL;

	//Ejecutar
	$resultado = pg_query($ssql);

	//Cerrar
	$bd->cerrar();

?>

