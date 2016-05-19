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
		<title> Inicia sesi&oacute;n para acceder a DISU </title>
		<?php include("biblioteca.phtml") ?>
		<?php //enelHead() ?>

		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
	        <title>Sitio Turismo Universidad Mayor de San Simón </title>
	        <link rel="shortcut icon" href="imagenes/favicon.ico">
	        <link rel="stylesheet" type="text/css" media="screen" href="css/en_original.css">
	        <link rel="stylesheet" type="text/css" media="screen" href="css/main_principal.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/menu.css">
		
	</head>
	<body onload="inicio()">
		<div id="contenedor">
			<header>
				<?php cabeceraPage() ?>				
				<nav>
					<?php elMenu() ?>
				</nav>
			</header>
			<div id="contenido">
				<div id="texto_central-rfo">
					<section>
						<article>
							<div id="cuadro_login">
								<div id="carita">
									<img id="profile-img" class="profile-img" alt="la fotito" src="images/photo.png">
								</div>
								<h3>
									Por favor inicia sesión para acceder a CT-UMSS
								</h3>
								<form action="usuarios/login.php" method="post">
									<h4>
										Usuario:<br />
									</h4>
									<input id="Passwd" class="" type="text" placeholder="Introduce tu nombre de usuario" name="usuario" width=50%><br />
									<h4>
										Contraseña:<br />
									</h4>
									<input id="Passwd" class="" type="password" placeholder="Contraseña" name="contrasena"><br /><br />
									<input type="submit" value="Entrar en SAGITProducidaCT">
								</form>							
							</div>
						</article>
						<!-- Ejemplo de columnas -->

						<!-- No me estan funcionando -->
						<aside>

						</aside>
					</section>
				</div>
				<div id="texto_imagen-central">
					<div id="funciones_objetivos">
						<div id="funciones">
						</div>
						<div id="objetivos">

						</div>
					</div>
					<div id="imagen_central-derecha">

					</div>
				</div>
			</div>
			<footer>
				<?php piePage() ?>
			</footer>
		</div>
		<!-- /container -->
	</body>
</html>
