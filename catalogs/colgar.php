<?php

session_start();

echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Nueva Clasificaci&oacute;n</title>
		
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
			
			$clasif_father = $_POST["mi_hijo"];
			$categ_father = $_POST["mi_jefe"];
			
			$tu_padre = htmlspecialchars($clasif_father);
			echo "Es la clasificaci&oacute;n de su padre?: ";

			$ssql = "select * from clasificacion where cod_clasif='$tu_padre';";
			$resultado = pg_query($ssql);
			if(pg_num_rows($resultado)!=0){
				$tupla = pg_fetch_array($resultado);
				echo $tupla['nombre_cla'].'<br>';
			}

			$tu_jefe = htmlspecialchars($categ_father);
			echo "Es la categor&iacute;a de su padre?: ";
			
			$ssql = "select * from categorizacion where cod_categ='$tu_jefe';";
			$resultado = pg_query($ssql);
			if(pg_num_rows($resultado)!=0){
				$tupla = pg_fetch_array($resultado);
				echo $tupla['nombre_cat'].'<br> <br>';
			}
		?>
		
		
		<FORM METHOD="post" ACTION="registrar_colgado.php" name="registro_parte">
			
			<table align="center" border="2">
				
				<tr>
					<th align="center"><b>Nueva Clasificaci&oacute;n</b></th>
					<td>
						<input id="ygmasrchquery" type="text" maxlength="100" name="nuevo"/>
					</td>
					<td>
						<input type="hidden" name="mi_padre" value="<?php echo $tu_padre ?>">
						<input type="hidden" name="mi_jefe" value="<?php echo $tu_jefe ?>">
					</td>
				</tr>				
								
			</table>
			
			<table width="50%" border="0" align="center" cellpadding="10" cellspacing="0">
				<tr>
					<td><div align="center">
						<input type="submit" value="colgar nueva clasificaci&oacute;n">
					</div></td>
					<td><div align="center">
						<input type="Reset" value="Borrar formulario">
					</div></td>
				</tr>
			</table>
		</FORM>
		
		<?php 
			$consulta = "select * from clasificacion where cla_cod_clasif='$tu_padre' AND cla_cod_categ='$tu_jefe';";
			$resultado = pg_query($consulta);
			
			while ($tupla = pg_fetch_array($resultado))
			{
				echo $tupla['nombre_cla']." - ";
				echo $tupla['cod_clasif'].'<br>';
			}
		?>
		
				</article>			
			</section>		
			<footer>
				<?php piePageIn() ?>
			</footer>
		</div>

	</body>
</html>
