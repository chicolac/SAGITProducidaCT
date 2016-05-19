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
		<div id="contenedor">
			<header>
				<?php include("biblioteca.phtml") ?>
				<?php cabeceraPage() ?>				
				<nav>
					<?php elMenu() ?>
				</nav>
			</header>			
			<section>
			
				<article style="height:80em;">

					<h1>Modalidades de ingreso</h1>
					<p class="pCentral"> 
					Las modalidades de ingreso a la carrera son:</br></br>

					Examen de ingreso: Es un examen que contempla contenidos referentes a conocientos básicos que debe poseer el postulante para afrontar exitosamente la carrera. </br></br>
					Curso preparatorio: Es un curso que tiene una duración aproximada de un mes y permite al postulante nivelar sus conocimientos respecto a los que se precisan para iniciar el estudio en la carrera.</p>

				</article>
			</section>
			<footer>
				<?php piePage() ?>
			</footer>
		</div>
	</body>
</html>
