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

	$array = $_POST['ubicacion'];
	$el_atractivo = $_GET['codigodel_atractivo'];
	echo "Este es el código de atractivo que me esta llegando: ".$el_atractivo.'<br>';
                
	require "../mi_conexion2014/conexion.rts";
	$bd = new BD;
	
	echo "<br>";
        
	if($array != "")
	{
		foreach ($array as $ubicacion) {
			echo $ubicacion."<br/>";
			
			$mi_consulta = "select MAX(cod_sencuentra) from se_encuentra" ;
			$mi_resultado = pg_query($mi_consulta);
			$tupla = pg_fetch_array($mi_resultado);
			$id_se = $tupla['max'] + 1;
                        echo "El id de la nueva se_encuentra es $id_se<br>";
			
                        $ssql = "INSERT INTO se_encuentra VALUES ($el_atractivo, $id_se, $ubicacion, 799960, 8092415, 2385);";
			$resulsql = pg_query($ssql);
			if(pg_num_rows($resulsql)!=0){
				echo $resulsql;
			}
			
			echo "La ubicaci&oacute;n es $ubicacion";
			echo "<br>";
		}
	}

/*        echo '
		<html>
			<head>
				<meta http-equiv="REFRESH" content="0;url=ubicacion2.php">
			</head>
			<body>
				<a href="ubicacion2.php"><input type="button" id="f_btn1" value="VOLVER a Asignar regiones" name="garantia"/></a>
			</body>
		<html>
	';*/
?>

					<FORM METHOD="POST" ACTION="../navegar_por_el_catalogs/la_ficha.php" name="ubicar_atractivo">
						<input type="hidden" name="id_atractivo" value="<?php echo $el_atractivo ?>">
	
						<input type="submit" value=" VER EL ATRACTIVO TUR&Iacute;STICO ">

					</FORM>

				</article>			
			</section>		
			<footer>
				<?php piePageIn() ?>
			</footer>
		</div>

	</body>
</html>

