<?php

session_start();

echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

?>


<?php
		 
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
		<title>sub-cat&aacute;logo </title>
		
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

					<div id="lateralIzq">
						<a  href="catalogo.php"><input type="button" value=" VOLVER AL CAT&Aacute;LOGO PRINCIPAL "></a>

					</div>

					<table align="center" border="2">
					
						<tr>
							<th align="center"><b>Los cat&aacute;logos del nivel: </b></th>				
							<td>
								<?php 
								    $dell_nom_cat = "co-creations";

								    // Buscado el código de la categoría del padre para encontrar el nombre de la categoría de los hijos
								    $ssql_cod_cat = "select * from clasificacion where cod_clasif = '$tu_padre';";
								    $resultado_cc = pg_query($ssql_cod_cat);

								    if(pg_num_rows($resultado_cc)!=0){
									while ($tupla = pg_fetch_array($resultado_cc))
									{
										$buscando_nc = $tupla['cod_categ'];

										// El código de la categoría de los hijos
										$sql_nom_cat = "select * from categorizacion where cod_categ = '$buscando_nc';";
										$resultado_nc = pg_query($sql_nom_cat);
										while ($registro = pg_fetch_array($resultado_nc))
											$dell_nom_cat = $registro['cat_cod_categ'];
											echo $dell_nom_cat;
									}
								    }
								
									if ( $dell_nom_cat != "co-creations" ) {
									
										// Ahora encontramos el nombre de la categoría de los hijos, abQuintanilla blanco y negro
										// $sql_name_cat = "select * from categorizacion where cat_cod_categ = '$dell_nom_cat';";
										$sql_name_cat = "select * from categorizacion where cod_categ = '$dell_nom_cat';";
										$resultado_nam_c = pg_query($sql_name_cat);
										while ($registro = pg_fetch_array($resultado_nam_c))
											echo ' / '.$registro['nombre_cat'];
									}
									
								?>
							</td>
						</tr>				
						<?php
					
							while ($tupla = pg_fetch_array($resultado))
							{

						?>
					
						<tr>
							<td >
								<b><?php echo $tupla['nombre_cla'] ?></b>
							</td>
							<td>
								<form action="sub_catalogo.php" method="post">
									<input type="hidden" name="catalogs" value="<?php echo $tupla['cod_clasif'] ?>">
									<input type="submit" value="Mostrar" />
								</form>
							</td>
							<td>
								<form action="colgar.php" method="post">
									<input type="hidden" name="mi_hijo" value="<?php echo $tupla['cod_clasif'] ?>">
									<input type="hidden" name="mi_jefe" value="<?php echo $tupla['cod_categ'] ?>">
									<input type="submit" value="Crear sub-cat&aacute;logo" />
								</form>
							</td>
							<td>
								<form action="crear_un_at.php" method="post">
									<input type="hidden" name="mi_hijo" value="<?php echo $tupla['cod_clasif'] ?>">
									<input type="hidden" name="mi_jefe" value="<?php echo $tupla['cod_categ'] ?>">
									<input type="submit" value="Atractivo tur&iacute;stico" />
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

