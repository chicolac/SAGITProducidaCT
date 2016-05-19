<?php

session_start();

echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Atractivo Tur&iacute;stico</title>
		
		<?php include("../biblioteca.phtml") ?>
		<?php estiloAdentro() ?>		
		
		<!-- start Mixpanel -->
		<!-- end Mixpanel -->
	</head>
	<body onload="inicio()">
		<div id="contenedor">
		<header>
			<?php cabeceraPageIn() ?>
			<nav>
				<?php elMenuIn() ?>
			</nav>
		</header>			
		<section>
			<article>

<?php
		 
	require "../mi_conexion2014/conexion.rts";
	$bd = new BD;
	$nombre_at = $_POST["at"];
	$descrip_at = $_POST["comentario"];
	
	$clasificacion_base = $_POST["mi_hijo"];
	$clasificacion_jefe = $_POST["mi_jefe"];
	
	$tu_padre = htmlspecialchars($clasificacion_base);
	echo $tu_padre.'<br>';
	
	$tu_jefe = htmlspecialchars($clasificacion_jefe);
	echo $tu_jefe.'<br>';
			
	echo $nombre_at = htmlspecialchars($nombre_at);
	echo ("<br />");
	echo $descrip_at = htmlspecialchars($descrip_at);
	echo ("<br />");

	echo ("<br />");
    echo ("<br />");

	$mi_con = "select MAX(cod_at) from atractivo_turistico;";
	$resulsqlcon = pg_query($mi_con);
	
	//$resulsqlcon = 10;

	$tupla = pg_fetch_array($resulsqlcon);
        //echo $tupla;
	$resulsqlcon = $tupla['max'] + 1;
    echo $resulsqlcon;
	echo ("<br />");


	if ($_POST["action"] == "upload") {
				
		// obtenemos los datos del archivo
		$temporal = $_FILES["archivo"]['tmp_name'];
		echo $temporal.'<br>';
		// El tama�o en bytes del archivo subido.
		$tamano = $_FILES["archivo"]['size'];
		echo $tamano.'<br>';
		// El tipo MIME del archivo, por ejemplo text/plain o image/gif
		$tipo = $_FILES["archivo"]['type'];
		echo $tipo.'<br>';
		// C�digo de error si se ha producido alg�n error
		$fallo = $_FILES["archivo"]['error'];
		echo $fallo.'<br>';
		// El nombre del archivo en el sistema del usuario
		$archivo = $_FILES["archivo"]['name'];
		$prefijo = substr(md5(uniqid(rand())),0,6);
		
		// Esta funci�n devuelve TRUE si el archivo est� en el directorio temporal del servidor
		if (is_uploaded_file($_FILES['archivo']['tmp_name']))
		{
		   echo 'El archivo se ha subido con �xito<br>';
		}
		
		// Comprobando que el fichero no sobrepasa el tama�o permitido
		if( $_FILES['archivo']['size']<(5*1024*1024) )
		{
		   echo 'El archivo No sobrepasa el tama�o m�ximo: 5MB'.'<br>';
		} else {
			echo 'El archivo sobrepasa el tama�o m�ximo: 5MB'.'<br>';
		}
		
		// Para comprobar si el fichero tiene una extensi�n permitida basta con comprobar el tipo MIME del fichero
		if( $_FILES['archivo']['type']=='image/jpeg')
		{
			echo 'La extensi�n JPEG est� permitida'.'<br>';
		} else {
			echo 'El archivo No tiene la extensi�n JPEG'.'<br>';
		}

		if ($archivo != "") {
			
			// guardamos el archivo a la carpeta files
			$destino = "../files/".$prefijo."_".$archivo;
			$nombre_archivo = $prefijo."_".$archivo;
			if (copy($_FILES['archivo']['tmp_name'],$destino)) {
				$status = "Archivo subido: <b>".$archivo."</b>";
			} else {
				$status = "Error al subir el archivo";
			}
		} else {
			$status = "Error al subir archivo";
		}
		
		echo $status.'<br>';
		
		// El n�mero aleatorio rand entre 1000 y 999999 lo utilizamos para prevenir la sobreescritura de ficheros con el mismo nombre
		/*$rand = rand(1000,999999);
		$origen = $_FILES['archivo']['tmp_name'];
		$destino = 'uploads/'.$rand.$_FILES['archivo']['name'];
		move_uploaded_file($origen, $destino);*/
	}
	
	$ssql = "INSERT INTO atractivo_turistico (cod_at, nombre_at, descripcion, fotos, coordenadas, direc_foto) VALUES ('$resulsqlcon', '$nombre_at', '$descrip_at', '7', '1022', '$nombre_archivo')";
	$resulsql = pg_query($ssql);
	if(pg_num_rows($resulsql)!=0){
		echo $resulsql;
	}
	
	$ssql_incluir = "INSERT INTO incluye (cod_categ, cod_clasif, cod_at) VALUES ('$tu_jefe', '$tu_padre', '$resulsqlcon')";
	$resulsql = pg_query($ssql_incluir);
	if(pg_num_rows($resulsql)!=0){
		echo $resulsql;
	}
?>
	
<FORM METHOD="POST" ACTION="ubicacion2.php" name="ubicar_atractivo">
	<input type="hidden" name="atractivo" value="<?php echo $resulsqlcon ?>">
	
	<input type="submit" value=" UBICAR EL ATRACTIVO TUR&Iacute;STICO ">

</FORM>

				</article>			
			</section>		
			<footer>
				<?php piePageIn() ?>
			</footer>
		</div>

	</body>
</html>

