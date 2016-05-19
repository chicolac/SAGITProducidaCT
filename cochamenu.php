<?php

session_start();

/*
$_SESSION['usuario'] = "jocarsa";
$_SESSION['contrasena'] = "jocarsa";
*/

?>

<!DOCTYPE HTML>
<html>
	<head>
		<!-- start Mixpanel -->
		
		<title>Sitio Turismo Universidad Mayor de San Simón </title>

		<?php include("biblioteca.phtml") ?>
		<?php estilo() ?>

		<!-- end Mixpanel -->
		<style type="text/css">
			#pagina{
				width:940px;
				text-align:left;
			}
			#opciones{ background:#FFCF79;
				float:left;
				*width:329px;
				width:35%;
				*height:80px;
			}

			#mapita{ background:#CCFFBB;
				float:left;
				*width:611px;
				width:65%;
				height:784px;
				text-align: center;
			}

			#contenedor section article #opciones ul {
				list-style: none outside none;
				text-align: center;
			}

			#contenedor section article #opciones ul li a:link {
				text-decoration: none;
			}

			#contenedor section article #opciones ul li a {
				color: blue;
				font-size: 18px;
				font-family: 'Minimal', 'Helvetica Neue', Arial, Helvetica, sans-serif;
				font-weight: normal;
				color: #5F3711;
				text-decoration: none;
				line-height: 1.7em;
				margin: 0em 0.07em;
				padding: 0.1em 0.6em;
				background-color: #F6F6E2;
				border-radius: 7px;
				*text-transform: lowercase;
				box-shadow: 1px 1px 3px #5F3711 inset;
			}

			#contenedor section article #opciones ul li a:hover {
				text-decoration: underline;
				*color: red;
				background-color: #5F3711;
				color: #F6F6E2;
			}
/*			ul li a:hover,
			ul li a:focus {
				background-color: #5F3711;
				color: #F6F6E2;
				outline: none;
			}*/
		</style>
	</head>
	<body>
		<div id="contenedor">
			<header>
				<?php cabeceraPage() ?>				
				<nav>
					<?php elMenu() ?>
				</nav>
			</header>			
			<section>
			
				<article>

					<h2>Informaci&oacute;n tur&iacute;stica de Cochabamba producida por la Carrera de Turismo</h2>
					<div id="opciones">
						<ul>
							<li><a href="ubicacion3.php">Municipios</a></li>
							<li><a href="#">Actividades</a></li>
							<li><a href="navegar_por_el_catalogs/catalogo.php">Clasificaci&oacute;n de atractivos</a></li>
							
						</ul>
					</div>
					<div id="mapita">
						<a href="cochabamba.php">
							<img border="0" height="784" width="601" src="imagenes/cbba.jpg" usemap="#billar">
						</a>
						<map name="billar">
							<area alt="Si clícas aquí irás a la página de inicio del tutorial de html" shape="circle" coords="148,154,44" href="http://www.hazunaweb.com">
							<area alt="Si clías aquí irás a la página de inicio del tutorial de css" shape="poly" coords="466,656, 489,652, 516,668, 513,677, 517,692, 525,697, 526,706, 535,714, 533,723, 536,733, 529,737, 530,743, 550,751, 547,765, 547,778, 538,773, 532,771, 533,759, 523,747, 517,739, 502,734, 473,728, 463,729, 452,715, 460,710, 467,697, 461,689, 455,684, 454,669, 460,664, 475,671, 480,667" href="pocona.php">
							<area alt="Si clías aquí irás a la página de inicio del tutorial de php" shape="rect" coords="11,77,288,105" href="http://php.hazunaweb.com/">
						</map>
					</div>
				</article>
			</section>
			<footer>
				<?php piePage() ?>
			</footer>
		</div>
	</body>
</html>

