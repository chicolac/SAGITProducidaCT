<?php
	session_start();

	//echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

	@$usuario = $_SESSION['usuario'];
	@$contrasena = $_SESSION['contrasena'];

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Sitio Turismo Universidad Mayor de San Simón </title>
		
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
			
						echo "<h1> Cat&aacute;logos</h1>";
			
						require "../mi_conexion2014/conexion.rts";
						$bd = new BD;
			
						$ssql = "select * from clasificacion where cod_categ='cat001';";
						$resultado = pg_query($ssql);
					?>		
		
					<div id="lateralIzq">
						<a  href="../cochamenu.php"><input type="button" value=" IR AL MEN&Uacute; PRINCIPAL "></a>

					</div>
			
					<table align="center" border="2">
			
						<tr>
							<th align="center"><b>Los cat&aacute;logos del primer nivel: </b></th>				
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
								<form action="sub_catalogo.php" method="post">
									<input type="hidden" name="catalogs" value="<?php echo $tupla['cod_clasif'] ?>">
									<input type="submit" value="Mostrar" />
								</form>
							</td>
						</tr>
						<?php
			
							}
						?>
			
					</table>
		
				</article>
			</section>
			<footer>
				<?php piePageIn() ?>
			</footer>
		</div>
	</body>
</html>


