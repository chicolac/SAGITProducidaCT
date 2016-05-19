<?php

	$atractivo = $_POST['id_atractivo'];
	echo $atractivo;
	
	require "../mi_conexion2014/conexion.inc";
	$bd = new BD;
	
	$ssql = "select * from atractivo_turistico where cod_at=$atractivo;";
	$resulsql = pg_query($ssql);
	if(pg_num_rows($resulsql)!=0){
		echo $resulsql;
	}
	
	$fila = pg_fetch_array($resulsql);
	// modificar del que copie las comillitas
	$nombre_at = $fila['direc_foto'];
	
	// mover la carpeta files al root
	echo $nombre_at;
?>

<html>
	<head>
		<title>atractivo</title>
		<link rel="STYLESHEET" type="text/css" href="estilo.css">
	</head>
	<body>
		<?php include("libreria01.phtml") ?>
		<?php cabeceraPage() ?>
	
		<table align="center" border="2">
			<tr>
				<th>
					<h1><?php echo $fila['nombre_at'] ?></h1>
				</th>
			</tr>
			<tr>
				<td>
					<img width="496" height="275" border="0" src="<?php echo $nombre_at ?>">
				</td>
			</tr>
			<tr>
				<td>
					<b>Descripci&oacute;n.- </b><?php echo $fila['descripcion'] ?>
				</td>
			</tr>
		</table>
		<div id="lateralIzq">
			<a  href="catalogo.php"><input type="button" value=" IR AL CAT&Aacute;LOGO PRINCIPAL "></a>

		</div>
		
		<?php piePage() ?>
	</body>
</html>