<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">	
		<meta charset="utf-8">
	        <title>Sitio Turismo Universidad Mayor de San Simón </title>
	        <link rel="shortcut icon" href="imagenes/favicon.ico"> 
	        <link rel="stylesheet" type="text/css" media="screen" href="css/main_principal.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/menu.css">
		
		<script type="text/javascript" src="javascript/portada.js"></script>
		
		<style type="text/css">
			/*ya esta revisado 26 junio 2014*/			
			@font-face{
				font-family:ubuntuRegular;
				src: url(ttf/Ubuntu-R.ttf) format('truetype');
			}
			@font-face{
				font-family:ubuntuBold;
				src: url(ttf/Ubuntu-B.ttf) format('truetype');
			}
			@font-face{
				font-family:ubuntuBoldItalic;
				src: url(ttf/Ubuntu-BI.ttf) format('truetype');
			}
			@font-face{
				font-family:ubuntuItalic;
				src: url(ttf/Ubuntu-I.ttf) format('truetype');
			}
			@font-face{
				font-family:monaco;
				src: url(ttf/MONACO.ttf) format('truetype');
			}
			
			#foto {
			filter: alpha(opacity=100)
			}
			
			.cabeza1 {
				float:left;
				
			}
			
			.cabeza2 {
				float:left;
				font-family:arial, verdana, sans-serif;
				color: white;
				
			}
			
			.cabezota {
				padding-left:50px;
				padding-top:10px;
				/*font-family:arial, verdana, sans-serif;*/
				font-family:ubuntuBoldItalic;
				font-size:3.2em;
				color: #FFFFFF;
				text-shadow: 2px 2px 5px rgba(0,255,0,0.5);
				
			}
			
			.cabezita {
				padding-left:50px;
				padding-top:12px;
				font-family:arial, verdana, sans-serif;
				font-size:1.2em;
				color: white;
				
			}
			
			.languageOptionButton {
				background-color:#297a10;
				background:none,-khtml-gradient(linear,left top,left bottom,from(#6fb02f),to(#21630d));
				background:none,-moz-linear-gradient(top,red 0,#300CDF 100%);
				background:none,-webkit-gradient(linear,left top,left bottom,color-stop(0,#6fb02f),color-stop(100%,#21630d));
				background:none,-webkit-linear-gradient(top,red 0,#300CDF 100%);
				background:none,-o-linear-gradient(top,#6fb02f 0,#21630d 100%);background:none,-ms-linear-gradient(top,#6fb02f 0,#21630d 100%);background:none,linear-gradient(top,#6fb02f 0,#21630d 100%);color:#fff;border-top:1px solid #6fb02f;-webkit-box-shadow:0 1px 0 0 rgba(255,255,255,0.4) inset;-moz-box-shadow:0 1px 0 0 rgba(255,255,255,0.4) inset;box-shadow:0 1px 0 0 rgba(255,255,255,0.4) inset;-moz-text-shadow:0 -1px 0 rgba(0,0,0,0.4);-webkit-text-shadow:0 -1px 0 rgba(0,0,0,0.4);-khtml-text-shadow:0 -1px 0 rgba(0,0,0,0.4);text-shadow:0 -1px 0 rgba(0,0,0,0.4);-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;margin-left:8px;
				padding:2px 22px;
				text-decoration:none;
				font-family:Helvetica,Arial,sans-serif;
				font-size:22px;
				font-weight:600;
				display:inline-block;
				*vertical-align:60%;
			}
		</style>

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

					<h2>Información turística de Cochabamba producida por la Carrera de Turismo</h2> 
					<div style="text-align: center;"><img id="img_central" src="imagenes/el-cristo-de-la-concordia.jpg" alt="Facultad" height="438" width="650"></div>
					<h1><a id="WebLinkDescLink" href="http://127.0.0.1/Turismo/25072012/MOCEDADES" class="languageOptionButton">Sitio Turismo Universidad Mayor de San Simón 2013</a></h1>

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
