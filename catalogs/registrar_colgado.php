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
			
			echo "<h1> Cat&aacute;logos</h1>";
			
			require "../mi_conexion2014/conexion.rts";
			$bd = new BD;
			
			$nuevo = $_POST["nuevo"];
			$nuevo = htmlspecialchars($nuevo);
			//echo $nuevo.'<br>';
			
			$mi_superior = $_POST["mi_padre"];
			$clasif_father = htmlspecialchars($mi_superior);
			//echo $clasif_father.'<br>';
			
			$mi_jefe = $_POST["mi_jefe"];
			$categ_father = htmlspecialchars($mi_jefe);
			//echo $categ_father.'<br>';
			
			$falta_identificador = 'cla058';
						
			$consulta = "select * from clasificacion order by cod_clasif;";
			$resultado = pg_query($consulta);
			
			while ($tupla = pg_fetch_array($resultado))
			{
				//echo $tupla['cod_clasif'].'<br>';
				$falta_identificador = $tupla['cod_clasif'];
			}
			
			//echo strlen($falta_identificador)."!<br>";
			//echo substr($falta_identificador,0,3)."!<br>";
			$primera_parte = substr($falta_identificador,0,4);
			//echo "Yo soy lo que queda: ".$primera_parte.'<br>';
			
			//echo substr($falta_identificador,3,3)."!<br>";
			$sumar = substr($falta_identificador,3,3);
			//echo "Antes de sumar a la otra parte: ".$sumar.'<br>';
			$sumar = $sumar + 1;
			//echo "Despues de sumar 1 a la otra parte: ".$sumar.'<br>';
			
			$falta_identificador = $primera_parte.$sumar;
			//echo $falta_identificador;

			// Antes de insertar tenemos que buscar la categorÃ­a del nuevo clasificador que se esta ingresando
			$sql_buscando_cat = "select * from categorizacion where cod_categ = '$categ_father';";
			//echo "<br>".$sql_buscando_cat."<br>";

			$cat_padre = pg_query($sql_buscando_cat);

			$categoria_new = "new";
			$new_cat_name = "new";

			while ($tupla = pg_fetch_array($cat_padre))
			{
				// Esta es la categorÃ­a del nuevo clasificador
				$categoria_new = $tupla['cat_cod_categ'];
				$sql_mi_cat = "select * from categorizacion where cod_categ = '$categoria_new';";

				$mi_categ = pg_query($sql_mi_cat);

				while ($registro = pg_fetch_array($mi_categ))
					$new_cat_name = $registro['nombre_cat']."<br>";
			}
			
			// Antes revisar cual es el_código de clasificación de todos mis hermanos y sumarme unito más
			
			$mi_con = "select MAX(el_codigo) from clasificacion where cla_cod_clasif='$clasif_father' AND cla_cod_categ='$categ_father';";
			$resulsqlcon = pg_query($mi_con);
			
			//$resulsqlcon = 10;

			$tupla = pg_fetch_array($resulsqlcon);
			
			if ($tupla['max'] != "") {
			    $resulsqlcon = $tupla['max'] + 1;
			    //echo $resulsqlcon;
				//echo ("<br /><br />La variable resulsqlcon tiene el valor de: "
				//. "$resulsqlcon<br /><br />");
			}
			else {
				//echo ("<br /><br />La variable resulsqlcon no tiene un valor: "
				//. "$resulsqlcon<br /><br />");
			    $resulsqlcon = 1;
			}
			
			// Ahora recien ingreso el nuevo clasificador
			$ssql = "INSERT INTO clasificacion (cod_categ, cod_clasif, cla_cod_categ, cla_cod_clasif, nombre_cla, descripcion_cla, el_codigo) VALUES ('$categoria_new', '$falta_identificador', '$categ_father', '$clasif_father', '$nuevo', '$nuevo', $resulsqlcon);";
			//$resultado = pg_query($ssql);
			pg_query($ssql);
			
			$sql_padre = "SELECT * FROM clasificacion WHERE cod_clasif = '$clasif_father';";
			$padre = pg_query($sql_padre);
			
			$sql_categoria = "SELECT * FROM categorizacion WHERE cod_categ = '$categ_father';";
			$categoria = pg_query($sql_categoria);
		?>		
		
			
		<table align="center" border="2">
			
			<tr>
				<th align="center"><b>mi pap&aacute;: </b></th>				
				<td>
					<a href="#"><?php
			
						while ($tupla = pg_fetch_array($padre))
						{
							echo $tupla['nombre_cla'];
						}
					?></a>
				</td>
			</tr>				
			<tr>
				<th align="center"><b>su categor&iacute;a: </b></th>				
				<td>
					<a href="#"><?php
			
						while ($tupla = pg_fetch_array($categoria))
						{
							echo $tupla['nombre_cat'];
						}
					?></a>
				</td>
			</tr>
			<tr>
				<th align="center"><b>mi nombre: </b></th>				
				<td>
					<a href="#"><?php
			
						echo $nuevo;
						
					?></a>
				</td>
			</tr>				
			<tr>
				<th align="center"><b>mi categor&iacute;a: </b></th>				
				<td>
					<a href="#"><?php
			
						echo $new_cat_name;

					?></a>
				</td>
			</tr>				
			<tr>
				<th>
					<INPUT TYPE="button" VALUE="  Atr&aacute;s   " onClick="history.go(-1)">
					<?php
			
						//echo "<h1>repetir</h1>";
					?>
				</th>
				<th>
					<INPUT TYPE="button" VALUE=" Adelante " onCLick="history.go(1)">
				</th>
			</tr>
			<tr>
				<th>
					<?php
			
						echo "<h1>:*)</h1>";
					?>
				</th>
			</tr>
			<tr>
				<th>
					<a href="catalogo.php"><input type="button" id="f_btn1" value=">> ir al cat&aacute;logo principal <<" name="garantia"/></a>		
					
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
