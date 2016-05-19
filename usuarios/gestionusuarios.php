<?php

	//include("log.php");
	session_start();

	echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

	echo "<br/>Pulsa <a href='unlog.php'>AQUI</a> para cerrar tu sesion<br/>";
	
	//Crear conexion
	require "../mi_conexion2014/conexion.rts";
	$bd = new BD;


	//ESTABLECER una consulta

	$consulta = "SELECT * FROM usuario;";

	//Ejecutar la consulta
	$resultado = pg_query($consulta);

//Imprimir la consulta

echo "
<table border=1 width=100%>
<tr>
<td>Usuario</td>
<td>Contraseña</td>
<td>Nombre</td>
<td>Apellido</td>
<td>Edad</td>
<td>Permiso</td>
<td></td>
<td></td>
</tr>
";

	while ($fila = pg_fetch_array($resultado))
	{
echo "<tr><td>".$fila['usuario']."</td><td>".$fila['contrasena']."</td><td>".$fila['nombre']."</td><td>".$fila['apellido']."</td><td>".$fila['edad']."</td><td><a href='eliminarusuario.php?titulo=".$fila['usuario']."&direccion=".$fila['contrasena']."&categoria=".$fila['nombre_u']."&comentario=".$fila['apellido_u']."&valoracion=".$fila['edad_u']."'>Eliminar</a></td><td><a href='formularioactualizarusuario.php?titulo=".$fila['usuario']."&direccion=".$fila['contrasena']."&categoria=".$fila['nombre']."&comentario=".$fila['apellido']."&valoracion=".$fila['edad']."'>Actualizar</a></td></tr>";
}

//Añadir un registro

echo "
<tr>
	<td>
		Añadir un registro
	</td>
</tr>
<tr>
	<form action='crearfavorito.php' method='POST'>
	<td><input type='text' name='usuario'></td>
	<td><input type='text' name='contrasena'></td>
	<td><input type='text' name='nombre'></td>
	<td><input type='text' name='apellido'></td>
	<td><input type='text' name='edad'></td>
	<td><select name='permisos'>
		<option value='1'>Administrador</option>
		<option value='2'>Controlador</option>
		<option value='3'>Usuario registrado</option>
		<option value='4'>Usuario invitado</option>
	</td>
	<td><input type='submit'></td><td></td>
</tr>

";


echo "</table>";

	//Cerramos la conexion

	$bd->cerrar();



?>

