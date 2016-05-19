<?php
	session_start();

	//echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

	@$usuario = $_SESSION['usuario'];
	@$contrasena = $_SESSION['contrasena'];
		 
	require "../mi_conexion2014/conexion.rts";
	$bd = new BD;
	
	@$clasificacion_base = $_POST["mi_hijo"];
	@$clasificacion_jefe = $_POST["mi_jefe"];
	
	$tu_padre = htmlspecialchars($clasificacion_base);
//	echo $tu_padre.'<br>';
	
	$tu_jefe = htmlspecialchars($clasificacion_jefe);
//	echo $tu_jefe.'<br>';
			
	echo ("<br />");
    echo ("<br />");
	
	$ssql = "select * from incluye where cod_categ='$tu_jefe' and cod_clasif='$tu_padre';";
	$resultado = pg_query($ssql);
	if( pg_num_rows($resultado) != 0 ){
		echo $resultado;
		// echo pg_num_rows($resultado);
	}
?>
	
<!DOCTYPE HTML>
<html>
	<head>
		<title>sub-cat&aacute;logo </title>
		
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
				<h1> La lista de atractivos turísticos</h1>
				<br>
				<br>
				<table align="center" border="2">
		
					<tr>
						<th align="center"><b>Cat&aacute;logo</b></th>
						<th align="center"><b>Nombre del atractivo</b></th>
						<th align="center"><b>Ubicaci&oacute;n</b></th>
					</tr>				
					<?php
		
						while ($tupla = pg_fetch_array($resultado))
						{

					?>

					<tr>
						<td align="center">
							<?php 
								$clasif = $tupla['cod_clasif'];
								$categ = $tupla['cod_categ'];
					
								$ssql = "select * from clasificacion where cod_categ='$categ' and cod_clasif='$clasif';";
								$resulsql = pg_query($ssql);
								if(pg_num_rows($resulsql)!=0){
									//echo $resulsql;
								}
					
								$registro = pg_fetch_array($resulsql);
								$nombre_categ = $registro['nombre_cla'];
							?>
							<?php echo $nombre_categ ?>
						</td>
						<td align="center">
							<?php

							$at = $tupla['cod_at'];
			
							$ssql = "select * from atractivo_turistico where cod_at=$at;";
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

							$atractivo = $fila['cod_at'];
							//echo $atractivo."---,";

							$ssql = "select distinct cod_at, id_ubicacion from se_encuentra where cod_at = $atractivo;";
							$resulsql = pg_query($ssql);
							if(pg_num_rows($resulsql)!=0){
								$muchos_muni = pg_num_rows($resulsql);
								echo $muchos_muni;
							}

							$tuplaUbi = pg_fetch_array($resulsql);
							$ubicacion = $tuplaUbi['id_ubicacion'];

							if ($ubicacion != "")
				                        {
								$usql = "select distinct m.cod_municipio from ubicacion AS u, municipio AS m where u.cod_municipio = m.cod_municipio and u.id_ubicacion = $ubicacion;";
								$resulsql = pg_query($usql);
								if(pg_num_rows($resulsql)!=0){
									$tuplaMuni = pg_fetch_array($resulsql);
									$municipio = $tuplaMuni['cod_municipio'];
								}
							}

							?>
						</td>
						<?php
						if (@$muchos_muni > 1)
						{
						?>
						<td>
							<FORM METHOD="POST" ACTION="escoger_muni.php" name="atractivo">
								<input type="hidden" name="id_atractivo" value="<?php echo $atractivo ?>">

								<input type="submit" value=">>VER<<">
							</FORM>
						</td>
						<?php
						} else {
							echo "<td>";
							if (isset($muchos_muni)) {
						?>
						
							<FORM METHOD="POST" ACTION="la_ficha.php" name="atractivo">
								<input type="hidden" name="id_atractivo" value="<?php echo $atractivo ?>">
								<input type="hidden" name="id_municipio" value="<?php echo $municipio ?>">
								<input type="submit" value=">>VER<<">
							</FORM>
						
						<?php
							}
							echo "</td>";
						}

						unset($muchos_muni);

						?>
			
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


