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
		<title>Sitio Turismo Universidad Mayor de San Simón </title>

		<?php include("biblioteca.phtml") ?>
		<?php estilo() ?>
		
		<script type="text/javascript" src="javascript/portada.js"></script>
		
		<!-- start Mixpanel --><!-- end Mixpanel -->


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
			
				<article style="height:80em;">
					
					<br>

					<h2>Información turística de Cochabamba producida por la Carrera de Turismo</h2>
					<br>
					<br>

					<div style="text-align: center;"><img id="img_central" src="imagenes/el-cristo-de-la-concordia.jpg" alt="Facultad" height="438" width="650"></div>
					<h1><a id="WebLinkDescLink" href="cochamenu.php" class="languageOptionButton">Sitio Turismo Universidad Mayor de San Simón 2015</a></h1>

					<h1>Visión</h1>
					<p class="pCentral">Ser una unidad académica acreditada y  comprometida con el desarrollo de la  sociedad boliviana, que ejerza liderazgo en la formación de profesionales y en la construcción de conocimientos en el campo del Turismo.</p>
					<h1>Misión</h1>
					<p class="pCentral">Formar profesionales idóneos, críticos y emprendedores  en el campo del turismo, respetuosos  del patrimonio cultural  y natural, comprometidos  con la conservación del medio ambiente,  contribuyentes con el desarrollo sostenible de la sociedad boliviana a través de la investigación y la participación comprometida de las organizaciones relacionadas con las actividades turísticas.</p>

				</article>
			</section>
			<footer>
				<?php piePage() ?>
			</footer>
		</div>
	</body>
</html>
