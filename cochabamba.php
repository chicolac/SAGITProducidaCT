<?php

session_start();

	//echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

	@$usuario = $_SESSION['usuario'];
	@$contrasena = $_SESSION['contrasena'];

?>

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
			
				<article style="height:90em; width:940px;">

					<h2>Informaci&oacute;n tur&iacute;stica de Cochabamba producida por la Carrera de Turismo</h2> 
					<div style="text-align: center;"><img id="cochabamba" src="fotos/cbba.jpg" alt="Facultad" height="1152" width="882" usemap="#billar"></div>
	
					<map name="billar">
						<area alt="Si clícas aquí irás a la página de inicio del tutorial de html" shape="circle" coords="148,154,44" href="http://www.hazunaweb.com">
						<area alt="Si clías aquí irás a la página de inicio del tutorial de css" shape="poly" coords="466,656, 489,652, 516,668, 513,677, 517,692, 525,697, 526,706, 535,714, 533,723, 536,733, 529,737, 530,743, 550,751, 547,765, 547,778, 538,773, 532,771, 533,759, 523,747, 517,739, 502,734, 473,728, 463,729, 452,715, 460,710, 467,697, 461,689, 455,684, 454,669, 460,664, 475,671, 480,667" href="ubicacion3.php">
						<area alt="Si clías aquí irás a la página de inicio del tutorial de php" shape="rect" coords="11,77,288,105" href="http://php.hazunaweb.com/">
					</map>

				</article>
			</section>
			<footer>
				<?php piePage() ?>
			</footer>
		</div>
	</body>
</html>
