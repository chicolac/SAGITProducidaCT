<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
	        <title>Sitio Turismo Universidad Mayor de San Sim�n </title>
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
			
				<article style="height:50em; width:940px;">

					<div id="mapas">
					<div id="el_titulo"><h2>Mapas</h2></div>
				<div id="opciones">
						<div class="menu12">
							<div class="la_opcion"><h3><a href="mapas_pocona.php">Mapa de servicios tur�sticos</a></h3></div>
							<div class="la_imagen"><img src="fotos/imagen_mapa.JPG" width="82" height="82" border="0"></div>
						</div>
						<div class="menu12">
							<div class="la_opcion"><h3><a href="mapas_pocona.php">Rutas o v�as de acceso</a></h3></div>
							<div class="la_imagen"><img src="fotos/imagen_mapa1022.JPG" width="82" height="82" border="0"></div>
						</div>
						<div class="menu12">
							<div class="la_opcion"><h3><a href="mapas_pocona.php">L�mites</a></h3></div>
							<div class="la_imagen"><img src="fotos/imagen_mapa.JPG" width="82" height="82" border="0"></div>
						</div>
						<div class="menu12">
							<div class="la_opcion"><h3><a href="mapas_pocona.php">Situaci�n astron�mica</a></h3></div>
							<div class="la_imagen"><img src="fotos/imagen_mapa1022.JPG" width="82" height="82" border="0"></div>
						</div>
						<div class="menu12">
							<div class="la_opcion"><h3><a href="mapas_pocona.php">Unidad fisiogr�fica</a></h3></div>
							<div class="la_imagen"><img src="fotos/imagen_mapa.JPG" width="82" height="82" border="0"></div>
						</div>
						<div class="menu12">
							<div class="la_opcion"><h3><a href="mapas_pocona.php">Otros mapas</a></h3></div>
							<div class="la_imagen"><img src="fotos/imagen_mapa1022.JPG" width="82" height="82" border="0"></div>
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

