<?php

session_start();

//echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

@$usuario = $_SESSION['usuario'];
@$contrasena = $_SESSION['contrasena'];

?>

<?php

	require "mi_conexion2014/conexion.rts";
	$bd = new BD;

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Sitio Turismo Universidad Mayor de San Simón Elegir ubicaci&oacute;n</title>
		
		<?php include("biblioteca.phtml") ?>
		<?php estilo() ?>
		
		<!--<link rel="STYLESHEET" type="text/css" href="catalogs/estiloVerdad.css">-->
		 <link rel="STYLESHEET" type="text/css" href="css/estilo-left.css"> 
		
		<script type="text/javascript" src="javascript/jquery-2.1.0.js"></script>
		<script type="text/javascript" src="javascript/filtro.js"></script>
		
		<!-- start Mixpanel -->
		<!-- end Mixpanel -->
	</head>
	<body onload="inicio()">
		<div id="contenedor">
		<header>
			<?php cabeceraPage() ?>
			<nav>
				<?php elMenu() ?>
			</nav>
		</header>			
		<section>
			<article>
			
				<h2>Información turí­stica de Cochabamba por municipio</h2>

				<p><input type="text" id="search_string" placeholder="municipio.." /></p>
		
				<TABLE id="municipios">
					<tr>
						<th>PROVINCIA</th>
						<th>MUNICIPIO</th>
						<th>Cantidad de AT</th>
						<th>información turí­stica</th>
					</tr>

					<?php 
					?>
			
					<?php
						
						$consulta = "SELECT DISTINCT cod_municipio, cod_provincia, nombre_mun, descripcion_mun FROM municipio;";
						$resultado = pg_exec($consulta);

						echo "<br>";

						echo $resultado;

					?>

					<?php
						$counter=0;

						while ($tupla = pg_fetch_array($resultado))
						{
							echo "<tr>";
							// en checkbox debemos guardar el id
							if ($counter % 2 == 0)
								$suave = 'suave';
							else
								$suave = 'oscuro';
					?>

						<td >
						        <div id= "<?php echo $suave ?>" >
						                <?php 
						                        $municipio = utf8_encode($tupla['cod_municipio']);
									if ($municipio != "")
						                        {
										$consultaP = "SELECT nombre_provincia FROM provincia p, municipio m WHERE p.cod_provincia = m.cod_provincia AND m.cod_municipio = $municipio;";
										$resultadoP = pg_exec($consultaP);
										$tuplaP = pg_fetch_array($resultadoP);
										//echo utf8_encode($tuplaP['nombre_provincia']);
										echo $tuplaP['nombre_provincia'];
						                        }else{ echo "( Vac&iacute;o )"; }
					
						                ?>
						        </div>
						</td>
						<td class="nombre" align="center">
						        <div id= "<?php echo $suave ?>" >
						                <?php 
									if ($municipio != "")
						                        {
										//$municipio = utf8_encode($tupla['cod_municipio']);
										$consultaM = "SELECT nombre_mun FROM municipio WHERE cod_municipio = $municipio;";
										$resultadoM = pg_exec($consultaM);
										$tuplaM = pg_fetch_array($resultadoM);
										//echo utf8_encode($tuplaM['nombre_mun']);
										echo $tuplaM['nombre_mun'];
									}else{ echo "( Vac&iacute;o )"; }
						                ?>
						        </div>
						</td>
						<td align="center">
							<?php 
								$consulta_cAT = "SELECT distinct SE.cod_at, SE.id_ubicacion
								FROM se_encuentra AS SE
								WHERE SE.id_ubicacion IN (
									SELECT U.id_ubicacion
									FROM municipio AS M, ubicacion AS U
									WHERE M.cod_municipio = $municipio
									AND M.cod_municipio = U.cod_municipio
								);";
								$resultado_cAT = pg_exec($consulta_cAT);
								//$tupla_cAT = pg_fetch_array($resultado_cAT);
								echo pg_num_rows($resultado_cAT);
					                ?>
						</td>
						<td>
							<a href='municipio.php?codigo_municipio=<?php echo $tupla['cod_municipio'] ?>' style="color:brown; text-align:none"><----- ver -----></a>
						</td>
		
				<?php
					$counter++;
					echo "</tr>";

					}

				?>
				</TABLE>
				</article>
			</section>
			<footer>
				<?php piePage() ?>
			</footer>
		</div>
	</body>
</html>

