<?php
	session_start();

	//echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];
	echo "Tu usuario es: ".@$_SESSION['usuario']."<br />";

	@$usuario = $_SESSION['usuario'];
	@$contrasena = $_SESSION['contrasena'];
	
	// Variables GET
	@$cod_atractivoGet = $_GET['codigo_at'];
	@$codigo_municipioGet = $_GET['municipio'];

	@$cod_atractivoPost = $_POST['id_atractivo'];
	@$codigo_municipioPost = $_POST['id_municipio'];
	//echo $atractivo;
	
	require "../mi_conexion2014/conexion.rts";
	$bd = new BD;

	// Vemos si llegó por Get o Post y asignamos
	if (isset($cod_atractivoGet) && isset($codigo_municipioGet)) {
		$atractivo = $cod_atractivoGet;
		$codigo_municipio = $codigo_municipioGet;
	} else {
		$atractivo = $cod_atractivoPost;
		$codigo_municipio = $codigo_municipioPost;
	}

	$ssql = "select * from atractivo_turistico where cod_at=$atractivo;";
	$resulsql = pg_query($ssql);
	if(pg_num_rows($resulsql)!=0){
		echo $resulsql;
	}
	
	$fila = pg_fetch_array($resulsql);
	// modificar del que copie las comillitas
	$nombre_foto = $fila['direc_foto'];
	
	// mover la carpeta files al root
	//echo $nombre_foto;
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Ficha del atractivo tur&iacute;stico</title>
		
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
				</br>
				<h2>FICHA DEL ATRACTIVO TURÍSTICO</h2>

				</br>
				<div id="ficha">
		
					<div id="cabeza">
						<div id="nombre">
					    	<table width="410px" border=”1” > 
						    <tr> 
							<th align="center"><b> NOMBRE DEL ATRACTIVO </b></th> 
						    </tr> 
						    <tr> 
							<td align="center">
								<div id="nameat"><?php echo $fila['nombre_at'] ?></div>
							</td> 
						    </tr> 
						 </table >
					    </div>
					    <div id="codigo">
								<table width="500px" border=”1” > 
						    <tr> 
							<th align="center"><b> CODIGO </b></th> 
							<th align="center"><b> JERARQUIA </b></th> 
						    </tr> 
						    <tr> 
							<td align="center"> 01.04.02. </td> 
							<td align="center"> II </td> 
						    </tr> 
						 </table >
					    </div>
					</div>
					<div id="cuerpo">
						<div id="dato">
					    	<table width="410px" border=”1” > 
						    <tr> 
							<th align="center"><b> REFERENCIAS DE LOCALIZACION </b></th> 
						    </tr>
								</table >
								<table width="410px" border=”1” > 
						    <tr> 
							<td><b> PROVINCIA </b></td> 
							<td> <?php 
			$consultaP = "SELECT nombre_provincia FROM provincia p, municipio m WHERE p.cod_provincia = m.cod_provincia AND m.cod_municipio = $codigo_municipio;";
			@$resultadoP = pg_exec($consultaP);

			@$tuplaP = pg_fetch_array($resultadoP);
			$provincia = $tuplaP['nombre_provincia'];

			echo $provincia;

							?>
							</td> 
						    </tr>
						    <tr> 
							<td><b> MUNICIPIO </b></td> 
							<td> <?php 
			//$resultado = lista_desplegable('id_pisoeco', 'nom_pisoeco', 'piso_ecologico');
			$consulta = "SELECT DISTINCT cod_municipio, cod_provincia, nombre_mun, descripcion_mun FROM municipio WHERE cod_municipio=$codigo_municipio;";
			@$resultado = pg_exec($consulta);

			@$tupla = pg_fetch_array($resultado);
			$municipio = $tupla['nombre_mun'];

			echo $municipio;

							?>
							</td> 
						    </tr> 
						    <tr> 
							<td><b> LUGAR </b></td> 
							<td> Huari Pucara </td> 
						    </tr>
						    <tr> 
							<td><b> ALTITUD </b></td> 
							<td> 4.200 m.s.n.m. </td> 
						    </tr> 
								</table >
								<table width="410px" border=”1” > 
						    <tr> 
							<th align="center"><b> ACCESIBILIDAD </b></th> 
						    </tr>
								</table >
								<table width="410px" border=”1” > 
						    <tr> 
							<td><b> TIPO DE VIA </b></td> 
							<td> Ripio </td> 
						    </tr> 
						    <tr> 
							<td><b> ESTADO DE V&Iacute;A </b></td> 
							<td> Malo </td> 
						    </tr>
								</table >
								<table width="410px" border=”1” > 
						    <tr> 
							<th align="center"><b> DISTANCIA </b></th> 
						    </tr>
								</table >
								<table width="410px" border=”1” > 
						    <tr> 
							<td><b> EN KMS. </b></td> 
							<td> 74 Km. </td> 
						    </tr>
						    <tr> 
							<td><b> DESDE: </b></td> 
							<td> Tiquipaya </td> 
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
					    </div>
					    <div id="imagen">
								<img src="<?php echo "../files/".$nombre_foto ?>" width="350" height="350" border="0">
					    </div>
					</div>
					<div id="detalle">
						<table width="100%"  align="center" cellpadding="4" cellspacing="2">
								<tr class="titulo_tabla">
								   <th>descripcion de las caracteristicas</th>
								</tr>
						<tr class="titulo_tabla">
								   <td>
						   		<div id="descripcion"><?php echo $fila['descripcion'] ?>.</div>
						   </td>
								</tr>
					    </table>
					</div>
					<div id="sugerencia">
						<div id="izquierda">
					    	<table width="410px" border=”1” > 
						    <tr> 
							<th align="center"><b> ACTIVIDADES TUR&Iacute;STICAS PERMITIDAS </b></th> 
						    </tr> 
						    <tr> 
							<td> Row 2, Column 1 </td> 
						    </tr> 
						 </table >
					    </div>
					    <div id="derecha">
								<table width="500px" border=”1” > 
						    <tr> 
							<th align="center"><b> RESTRICCIONES A LA ACTIVIDAD </b></th> 
						    </tr> 
						    <tr> 
							<td> Row 2, Column 1 </td> 
						    </tr> 
						 </table >
					    </div>
					</div>
					<div id="pie">
						<div id="fuente">
					    	<table width="410px" border=”1” > 
						    <tr> 
							<th align="center"><b> FUENTE </b></th> 
						    </tr> 
						    <tr> 
							<td> Row 2, Column 1 </td> 
						    </tr> 
						 </table >
					    </div>
					    <div id="estacionalidad">
								<table width="500px" border=”1” > 
						    <tr> 
							<th align="center"><b> ESTACIONALIDAD </b></th> 
						    </tr>
								</table >
								<table width="500px" border=”1” > 
						    <tr> 
							<td><b> TEMPORADAS DE VISITA </b></td> 
							<td> Esta laguna se encuentra al lado de Tiquipaya. Es una de las m&aacute;s grandes de la regi&oacute;n; y sirve como reservorio de agua para el ganado de la regi&oacute;n; es una de la tres lagunas comunitarias de Huari Pukara y se est&aacute; practicando la psicultura en pequeña cantidad por el momento, ya que es apta para esta actividad por la gran cantidad de nutrientes que posee, adem&aacute;s que se constituye en un excelente espejo de agua, y favorece a la riqueza paisaj&iacute;stica del lugar. </td> 
						    </tr> 
					   		</table >
					    </div>
					</div>
				    </div>

				</article>
			</section>
					<br />
					<br />
					<br />
			<footer>
				<?php piePageIn() ?>
			</footer>
		</div>
	</body>
</html>


