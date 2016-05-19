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
	
				<!-- Esta parte también necesitó una manito con el ancho -->
				<article style="height:80em; width:940px;">

					<h2>Información turística de Bolivia producida por la Carrera de Turismo</h2> 
						<div style="text-align: center;"><img id="bolivia" src="fotos/dep_boliv.jpg" alt="Facultad" height="787" width="602" usemap="#billar"></div>

					<map name="billar">
	
						<area alt="Si clías aquí irás a la página de inicio del tutorial de css" shape="poly" coords="332,334, 336,266, 418,222, 458,298, 476,363, 560,375, 557,410, 566,530, 529,506, 483,496, 398,515, 373,554, 323,552, 315,491, 289,409, 268,334" href="santacruz.html">
						<area alt="Si clías aquí irás a la página de inicio del tutorial de css" shape="poly" coords="224,71, 246,140, 294,169, 401,220, 295,278, 298,304, 316,327, 234,326, 203,355, 150,293, 157,188, 190,106" href="beni.html">
						<area alt="Si clías aquí irás a la página de inicio del tutorial de css" shape="poly" coords="153,381, 161,386, 169,389, 177,396, 190,409, 218,409, 229,404, 235,394, 238,382, 251,381, 254,410, 247,424, 254,435, 276,451, 247,476, 254,487, 272,512, 246,505, 233,510, 200,481, 189,473, 158,488, 156,485, 158,473, 150,464, 155,459, 152,443, 147,435, 150,428, 158,426, 156,402, 151,389" href="principalCocha.php">
	
					</map>

				</article>
			</section>
			<footer>
				<?php piePage() ?>
			</footer>
		</div>
	</body>
</html>

