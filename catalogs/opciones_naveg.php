<?php

session_start();

echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

?>


<?php
	$atractivo = $_POST['atractivo'];
	echo $atractivo;
?>
<HTML>
	<HEAD>
		
	<TITLE>Turismo-UMSS</TITLE>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>

		<STYLE TYPE="TEXT/CSS">
			BODY     { margin:0; }
			TD       { font-family:verdana,arial; font-size:15px; }
			A        { text-decoration:underline; font-size:17px;; }
		</STYLE>
		<link rel="STYLESHEET" type="text/css" href="estilo.css">

	</HEAD>
	<BODY>
			
		<div id="pagina"> 
			
			<div id="cabecera">
				
				<?php include("libreria01.phtml") ?>
				<?php cabeceraPage() ?>
			</div>
			
			<div id="contenedor">
				
				<div id="lateralIzq">
					<a  href="../index.htm"><input type="button" value=" REGRESAR AL CONTENIDO PRINCIPAL "></a>
	
				</div>
				
				<div id="contenido" align="center">
				
					Contenido principal
					<table width="310" cellspacing="1" cellpadding="2" border="0">
						
						<tr>
							<th bgcolor="#aa0000">Opciones de navegaci&oacute;n</th>
						</tr>
						<tr> 
							<td bgcolor="#66ccdd">
								<FORM METHOD="POST" ACTION="Ubicando_atractivo/los_municipios.php" name="ubicar_atractivo" target="contenido_f">
									<input type="hidden" name="atractivo" value="<?php echo $atractivo ?>">
									
									<input type="submit" value=" 1.- Colgar atractivo por municipio ">

								</FORM>
							</td>
						</tr>
						<tr>
							<td bgcolor="#66ccdd">
								<FORM METHOD="POST" ACTION="Ubicando_atractivo/las_regiones.php" name="ubicar_atractivo" target="contenido_f">
									<input type="hidden" name="atractivo" value="<?php echo $atractivo ?>">
									
									<input type="submit" value=" 2.- Colgar atractivo por regiones ">

								</FORM>
							</td>
						</tr>
						
					</table>
					<iframe name="contenido_f" width="750" height="755" frameborder="0"  src="" ></iframe>	
					
					<div id="fotoCentral">
						

					</div>
					<div id="detalle">El detalle</div>
					
					
	
				</div>
				
			</div>
			
			<div id="pie">
				<?php piePage() ?>
			</div>
				
		</div> 

	</BODY>
</HTML>
