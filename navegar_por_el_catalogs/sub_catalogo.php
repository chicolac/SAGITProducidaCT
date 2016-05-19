<?php
	session_start();

	//echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

	@$usuario = $_SESSION['usuario'];
	@$contrasena = $_SESSION['contrasena'];
		 
	require "../mi_conexion2014/conexion.rts";
	$bd = new BD;
	$soy_tu_padre = $_POST["catalogs"];
	

	$tu_padre = htmlspecialchars($soy_tu_padre);
	echo $tu_padre.'<br>';
	
	
	$ssql = "select * from clasificacion where cla_cod_clasif = '$tu_padre';";
	$resultado = pg_query($ssql);
	if(pg_num_rows($resultado)!=0){
		echo $resultado;
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>sub-catálogo </title>
		
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
				<br>
				<br>
				<br>
					<div id="lateralIzq">
						<a  href="catalogo.php"><input type="button" value=" VOLVER AL CAT&Aacute;LOGO PRINCIPAL "></a>

					</div>
				<br>
	
					<table align="center" border="2">
			
						<tr>
							<th align="center"><b>Los cat&aacute;logos del primer nivel: </b></th>				
							<td>
								cantAT
							</td>
							<td align="center">
								Ver sub-cat&aacute;logos
							</td>
						</tr>				
						<?php
			
							while ($tupla = pg_fetch_array($resultado))
							{

						?>
			
						<tr>
							<td>
								<h3><?php echo $tupla['nombre_cla'] ?></h3>
							</td>
							<td>
								<h3><?php 
									$ssql = "select * from incluye where cod_categ = '$tupla[cod_categ]' and cod_clasif = '$tupla[cod_clasif]';";
									$result_cant = pg_query($ssql);
									echo pg_num_rows($result_cant);

								?></h3>
							</td>
							<td align="center">
								<form action="sub_catalogo.php" method="post">
									<input type="hidden" name="catalogs" value="<?php echo $tupla['cod_clasif'] ?>">
									<input type="submit" value="Mostrar" />
								</form>
							</td>
							<td>
								<form action="ver_atrac.php" method="post">
									<input type="hidden" name="mi_hijo" value="<?php echo $tupla['cod_clasif'] ?>">
									<input type="hidden" name="mi_jefe" value="<?php echo $tupla['cod_categ'] ?>">
									<input type="submit" value="ver atractivos" />
								</form>
							</td>
						</tr>
			
						<?php
			
							}
						?>
						<tr >
							<th >
								<input type=button value="[ REGRESAR A LA P&Aacute;GINA ANTERIOR ]" onclick="history.go(-1)">
							</th>
						</tr>
					</table>
		
				</article>
			</section>
			<footer>
				<?php piePageIn() ?>
			</footer>
		</div>
	</body>
</html>


