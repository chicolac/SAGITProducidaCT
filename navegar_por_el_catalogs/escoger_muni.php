<?php
	session_start();

	//echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

	@$usuario = $_SESSION['usuario'];
	@$contrasena = $_SESSION['contrasena'];
		 
	require "../mi_conexion2014/conexion.rts";
	$bd = new BD;

	@$cod_atractivoPost = $_POST['id_atractivo'];
	
	echo ("<br />");
	echo ("<br />");
	
	$ssql = "select distinct cod_at, id_ubicacion from se_encuentra where cod_at = $cod_atractivoPost;";
	$resulsql_ubi = pg_query($ssql);
	if(pg_num_rows($resulsql_ubi)!=0){
		echo $muchos_muni = pg_num_rows($resulsql_ubi);
	}
?>
	
<!DOCTYPE HTML>
<html>
	<head>
		<title>ubicaciones </title>
		
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
				<br>
				<h1> Lugares donde se encuentra</h1>
				<br>
				<br>
				<table align="center" border="2">
		
					<tr>
						<th align="center"><b>Nombre del atractivo tur&iacute;stico</b></th>
						<th align="center"><b>Municipio</b></th>
						<th align="center"><b>Su ficha</b></th>
					</tr>				
					<?php
		
						while ($tuplaUbi = pg_fetch_array($resulsql_ubi))
						{

					?>

					<tr>
						<td align="center">
							<?php

							$ssql = "select * from atractivo_turistico where cod_at=$cod_atractivoPost;";
							$resulsql = pg_query($ssql);
							if(pg_num_rows($resulsql)!=0){
								//echo $resulsql;
							}
				
							$fila = pg_fetch_array($resulsql);
							$nombre_at = $fila['nombre_at'];
						
							?>
							<?php echo $nombre_at ?>
						</td>
						<td align="center">
							<?php

							$ubicacion = $tuplaUbi['id_ubicacion'];

							if ($ubicacion != "")
				                        {
								$usql = "select distinct m.cod_municipio from ubicacion AS u, municipio AS m where u.cod_municipio = m.cod_municipio and u.id_ubicacion = $ubicacion;";
								$resulsql = pg_query($usql);
								if(pg_num_rows($resulsql)!=0){
									$tuplaMuni = pg_fetch_array($resulsql);
									$municipio = $tuplaMuni['cod_municipio'];
								}
								
								$msql = "select nombre_mun from municipio where cod_municipio = $municipio";
								$resulsql_m = pg_query($msql);
								$tuplita = pg_fetch_array($resulsql_m);
								echo $tuplita['nombre_mun'];
							}

							?>
						</td>
						<td align="center">
							<FORM METHOD="POST" ACTION="la_ficha.php" name="atractivo">
								<input type="hidden" name="id_atractivo" value="<?php echo $cod_atractivoPost ?>">
								<input type="hidden" name="id_municipio" value="<?php echo $municipio ?>">
								<input type="submit" value=">>VER<<">
							</FORM>
						</td>
					</tr>
					<?php

						}
					?>
				</table>
		
				</article>
			</section>
			<footer>
				<?php piePageIn() ?>
			</footer>
		</div>
	</body>
</html>


