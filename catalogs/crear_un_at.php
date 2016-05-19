<?php

session_start();

echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Atractivo Tur&iacute;stico</title>
		
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
		<?php
			require "../mi_conexion2014/conexion.rts";
			$bd = new BD;
			
			$clasificacion_base = $_POST["mi_hijo"];
			$clasificacion_jefe = $_POST["mi_jefe"];
			
			$tu_padre = htmlspecialchars($clasificacion_base);
			echo $tu_padre.'<br>';
			
			$tu_jefe = htmlspecialchars($clasificacion_jefe);
			echo $tu_jefe.'<br>';
		?>
		
		<?php
		  
			function lista_desplegable($id, $nombre, $tabla)
			{
				$consulta = "SELECT DISTINCT t.".$id.", t.".$nombre." FROM ".$tabla." as t;";
				echo $consulta;
				return pg_exec($consulta);

			}
		  
		?>
		
		
		<FORM METHOD="post" ACTION="ejecutar_registro_at.php" name="registro_parte" enctype="multipart/form-data">
			
			<table align="center" border="2">
				
				<tr>
					<th align="center"><b>Nombre del Atractivo Tur&iacute;stico</b></th>
					<td>
						<input id="ygmasrchquery" type="text" maxlength="100" name="at"/>
					</td>
				</tr>				
				<tr>
					<th align="center"><b>Detalles</b></th>
					<td>
						<textarea name="comentario" rows="10" cols="40" onClick="borrar_texto()" placeholder="Escribe el detalle...."></textarea>
					</td>
				</tr>
				<tr>
					<th align="center"><b>Fotograf&iacute;a</b></th>
					<td>
						<input name="archivo" type="file" size="35" />
					</td>
					
					<input name="action" type="hidden" value="upload" />     
				</tr>
				
			</table>
			
			
			
			<input type="hidden" name="mi_hijo" value="<?php echo $tu_padre ?>">
			<input type="hidden" name="mi_jefe" value="<?php echo $tu_jefe ?>">
						
			<table width="50%" border="0" align="center" cellpadding="10" cellspacing="0">
				<tr>
					<td><div align="center">
						<input type="submit" value="registrar atractivo tur&iacute;stico">
					</div></td>
					<td><div align="center">
						<input type="Reset" value="Borrar formulario">
					</div></td>
				</tr>
			</table>
		</FORM>
				</article>			
			</section>		
			<footer>
				<?php piePageIn() ?>
			</footer>
		</div>

	</body>
</html>
