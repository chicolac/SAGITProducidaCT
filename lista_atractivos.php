<?php

session_start();

//echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

@$usuario = $_SESSION['usuario'];
@$contrasena = $_SESSION['contrasena'];

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Sitio Turismo Universidad Mayor de San Simón </title>
		
		<?php include("biblioteca.phtml") ?>
		<?php estilo() ?>		
		
		<!-- start Mixpanel -->
		<!-- end Mixpanel -->
	</head>
	<body onload="inicio()">
		<div id="contenedor">
			<header>
				<?php cabeceraPage() ?>
				<nav>
					<?php elMenu();
						$codigo_municipio = $_GET['codigo_municipio'];
						
						require "mi_conexion2014/conexion.rts";
						$bd = new BD;

						// buscamos la ubicacion con el codigo del municipio
						$consulta = "select id_ubicacion from ubicacion where cod_municipio = $codigo_municipio;";
						$resultado = pg_exec($consulta);

						$tupla = pg_fetch_array($resultado);
						$id_ubicacion = utf8_encode($tupla['id_ubicacion']);
						
						//$resultado = lista_desplegable('id_pisoeco', 'nom_pisoeco', 'piso_ecologico');
						$consulta = "select distinct cod_at from se_encuentra where id_ubicacion = $id_ubicacion;";
						$resultado = pg_exec($consulta);
						
						// var_dump($resultado);
					?>
				</nav>
			</header>			
			<section>
			
				<article >

					<div id="mapas">
					<br>
					<br>
					<div id="el_titulo"><h2>Lista de atractivos turísticos del Municipio de 
						<?php
						
						$consulta_nm = "select nombre_mun from municipio where cod_municipio = $codigo_municipio;";
						$resultado_nm = pg_exec($consulta_nm);

						$tupla_nm = pg_fetch_array($resultado_nm);
						$nombre_muni = utf8_encode($tupla_nm['nombre_mun']);
						echo $nombre_muni;

						?>
</h2></div>
					<br>
					<br>
				<div id="opciones">
					<?php 
						while ($tupla = pg_fetch_array($resultado))
						{
							//$resultado = lista_desplegable('id_pisoeco', 'nom_pisoeco', 'piso_ecologico');
							$consulta = "select nombre_at, cod_at as codigo, direc_foto from atractivo_turistico where cod_at = $tupla[cod_at];";
							$resultadoAT = pg_exec($consulta);

							$tupla = pg_fetch_array($resultadoAT);
							
						?>
						<div class="menu12">
							<div class="la_opcion"><h3><a href="navegar_por_el_catalogs/la_ficha.php?codigo_at=<?php echo $tupla['codigo'] ?>&municipio=<?php echo $codigo_municipio ?>"><?php echo $tupla['nombre_at'] ;?></a></h3>
							</div>
							<div class="la_imagen"><a href="navegar_por_el_catalogs/la_ficha.php?codigo_at=<?php echo $tupla['codigo'] ?>"><img src=<?php echo "files/".$tupla['direc_foto'] ?> width="82" height="82" border="0"></a></div>
						</div>
						<?php
						}
						?>

						<div class="menu12">
							<div class="la_opcion"><h3><a href="la_ficha.php">Atractivo turístico 2</a></h3></div>
							<div class="la_imagen"><img src="fotos/atrac2.JPG" width="82" height="82" border="0"></div>
						</div>
						<div class="menu12">
							<div class="la_opcion"><h3><a href="la_ficha.php">Atractivo turístico 3</a></h3></div>
							<div class="la_imagen"><img src="fotos/atrac1.jpg" width="82" height="82" border="0"></div>
						</div>
						<div class="menu12">
							<div class="la_opcion"><h3><a href="la_ficha.php">Atractivo turístico 4</a></h3></div>
							<div class="la_imagen"><img src="fotos/atrac2.JPG" width="82" height="82" border="0"></div>
						</div>
						<div class="menu12">
							<div class="la_opcion"><h3><a href="la_ficha.php">Atractivo turístico 5</a></h3></div>
							<div class="la_imagen"><img src="fotos/atrac1.jpg" width="82" height="82" border="0"></div>
						</div>
						<div class="menu12">
							<div class="la_opcion"><h3><a href="la_ficha.php">Atractivo turístico 6</a></h3></div>
							<div class="la_imagen"><img src="fotos/atrac2.JPG" width="82" height="82" border="0"></div>
						</div>
						
					</div>
					<div class="por_categoria">
						<b><a id="WebLinkDescLink" href="turismo.html" class="optionButton">Por categoría o clasificación</a></b>
					</div>
				    	
				</div>

				</article>
			</section>
			<footer>
				<?php piePage() ?>
			</footer>
		</div>
	</body>
</html>

