<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
	        <title>Sitio Turismo Universidad Mayor de San Simón </title>
	        <link rel="shortcut icon" href="imagenes/favicon.ico">
	        <link rel="stylesheet" type="text/css" media="screen" href="css/en_original.css">
	        <link rel="stylesheet" type="text/css" media="screen" href="css/main_principal.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/menu.css">
		
		<script type="text/javascript" src="javascript/portada.js"></script>
		
		

<!-- start Mixpanel --><!-- end Mixpanel -->


	</head>
	<body onload="inicio()">
		<?php 
			$codigo_municipio = $_GET['codigo_municipio'];
			echo "El c&oacute;digo de municipio es: $codigo_municipio";

			require "mi_conexion2014/conexion.rts";
			$bd = new BD;

			//$resultado = lista_desplegable('id_pisoeco', 'nom_pisoeco', 'piso_ecologico');
			$consulta = "SELECT DISTINCT cod_municipio, cod_provincia, nombre_mun, descripcion_mun FROM municipio WHERE cod_municipio=$codigo_municipio;";
			$resultado = pg_exec($consulta);

			echo "<br>";

			echo $resultado;
			$tupla = pg_fetch_array($resultado);
			$municipio = utf8_encode($tupla['nombre_mun']);

			$consultaP = "SELECT nombre_provincia FROM provincia p, municipio m WHERE p.cod_provincia = m.cod_provincia AND m.cod_municipio = $codigo_municipio;";
			$resultadoP = pg_exec($consultaP);
			$tuplaP = pg_fetch_array($resultadoP);
			//echo utf8_encode($tuplaP['nombre_provincia']);
			
		?>
		<div id="contenedor">
			<header>
				<?php include("biblioteca.phtml") ?>
				<?php cabeceraPage() ?>				
				<nav>
					<?php elMenu() ?>
				</nav>
			</header>			
			<section>
			
				<article style="height:63em; width:940px;">

					<div id="municipio">
		
						<div id="izquierda">
							
							<div id="titulo_municipio">
								<h2>Mapa del Municipio de <?php echo $municipio ?></h2>
							</div>
							<div id="imagen_mapa">
								<img src="fotos/municipio_general.JPG" width="408" height="533" border="0">
							</div>
				
							 
				
						</div>
						<div id="derecha">
							
							<div id="info_general">
								<table width="500px" border=”1” > 
									<tr> 
										<th align="center"><b> INFORMACION GENERAL </b></th> 
									</tr>
								</table >
								<table width="500px" border=”1” > 
									<tr> 
										<td><b> PROVINCIA </b></td> 
										<td> <?php echo $tuplaP['nombre_provincia'] ?> </td> 
									</tr>
									<tr> 
										<td><b> MUNICIPIO </b></td> 
										<td> <?php echo $municipio ?> </td> 
									</tr> 
									<tr> 
										<td><b> Sección </b></td> 
										<td> 1ra </td> 
									</tr>
									<tr> 
										<td><b> Lugar </b></td> 
										<td> Centro poblado </td> 
									</tr>
									<tr> 
										<td><b> Sitio </b></td> 
										<td> Pueblo </td> 
									</tr>
									<tr> 
										<td><b> Toponimia </b></td> 
										<td>  </td> 
									</tr>
									<tr> 
										<td><b> Población </b></td> 
										<td> 75.000 </td> 
									</tr>
									<tr> 
										<td><b> Altitud </b></td> 
										<td> 4.200 m.s.n.m. </td> 
									</tr>
									<tr> 
										<td><b> Superficie </b></td> 
										<td> 25000 K2 </td> 
									</tr> 
									<tr> 
										<td><b> Densidad </b></td> 
										<td>  </td> 
									</tr>
									<tr> 
										<td><b> Clima </b></td> 
										<td> Templado </td> 
									</tr>
									<tr> 
										<td><b> Temperatura </b></td> 
										<td> 25 grados centigrados </td> 
									</tr>
									<tr> 
										<td><b> Precipitacion Pluvial </b></td> 
										<td> 20 </td> 
									</tr>
									<tr> 
										<td><b> Vientos </b></td> 
										<td> Ligeros </td> 
									</tr> 
								</table >
								<table width="500px" border=”1” > 
									<tr> 
										<th align="center"><b> ACCESIBILIDAD </b></th> 
									</tr>
								</table >
								<table width="500px" border=”1” > 
									<tr> 
										<td><b> TIPO DE VIA </b></td> 
										<td> Ripio </td> 
									</tr> 
									<tr> 
										<td><b> ESTADO DE V&Iacute;A </b></td> 
										<td> Malo </td> 
									</tr>
								</table >
								<table width="500px" border=”1” > 
									<tr> 
										<th align="center"><b> DISTANCIA </b></th> 
									</tr>
								</table >
								<table width="500px" border=”1” > 
									<tr> 
										<td><b> EN KMS. </b></td> 
										<td> 74 Km. </td> 
									</tr>
									<tr> 
										<td><b> DESDE: </b></td> 
										<td> Cochabamba </td> 
									</tr> 
									<tr> 
										<td><b> EN TIEMPO </b></td> 
										<td> 4 Horas </td> 
									</tr>
									<tr> 
										<th align="center"><b> COORDENADA X </b></th>
										<th align="center"><b> COORDENADA Y </b></th> 
									</tr>
									<tr> 
										<td> 799960 </td> 
										<td> 8092415 </td> 
									</tr> 
								</table >
					
								<div id="detalle">
									<table width="500px" border="1" >
										<tr class="titulo_tabla">
										   <th>TRANSPORTE</th>
										</tr>
										<tr class="titulo_tabla">
										   <td>
												<div id="descripcion">Tipo de servicio:
												-	Trufis
												-	Taxis
												Frecuencia: De lunes a domingo cada que se llena
												Lugar de salida: Av. 6 de agosto y república
												Precio:
												-	6 Bs. taxi
												-	5 Bs. trufi
												</div>
										   </td>
										</tr>
									</table>
								</div>
							</div>
							<div id="las_opciones">
								<div class="opcion">
									<b><a id="WebLinkDescLink" href="fotos_pocona.php" class="optionButton">Fotograf&iacute;as</a></b>
								</div>
								<div class="opcion">
									<b><a id="WebLinkDescLink" href="lista_atractivos.php?codigo_municipio=<?php echo $codigo_municipio ?>" class="optionButton">Información de Atractivos</a></b>
								</div>
								<div class="opcion">
									<b><a id="WebLinkDescLink" href="los_mapas.php" class="optionButton">Mapas</a></b>
								</div>
								<div class="opcion">
									<b><a id="WebLinkDescLink" href="mapas_pocona.php" class="optionButton">Servicios Turísticos</a></b>
								</div>			
							</div>
				
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

