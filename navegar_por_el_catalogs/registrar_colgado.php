<html>
	<head>
		<title>Example</title>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
		<link rel="STYLESHEET" type="text/css" href="estilo.css">
	</head>
	<body>

		<?php
			
			echo "<h1> Cat&aacute;logos</h1>";
			
			require "conexion.inc";
			$bd = new BD;
			
			$nuevo = $_POST["nuevo"];
			$nuevo = htmlspecialchars($nuevo);
			echo $nuevo.'<br>';
			
			$mi_superior = $_POST["mi_padre"];
			$my_father = htmlspecialchars($mi_superior);
			echo $my_father.'<br>';
			
			$mi_jefe = $_POST["mi_jefe"];
			$my_boss = htmlspecialchars($mi_jefe);
			echo $my_boss.'<br>';

			
			$ssql = "INSERT INTO clasificacion (cod_categ, cod_clasif, cla_cod_categ, cla_cod_clasif, nombre_cla, descripcion_cla) VALUES ('$my_boss', 'cla057', '$my_boss', '$my_father', '$nuevo', '$nuevo');";
			//$resultado = pg_query($ssql);
			pg_query($ssql);
			
			$sql_padre = "SELECT * FROM clasificacion WHERE cod_clasif = '$my_father';";
			$padre = pg_query($sql_padre);
			
			$sql_categoria = "SELECT * FROM categorizacion WHERE cod_categ = '$my_boss';";
			$categoria = pg_query($sql_categoria);
		?>		
		
			
		<table align="center" border="2">
			
			<tr>
				<th align="center"><b>mi pap&aacute;: </b></th>				
				<td>
					<a href="/catalogs/111"><?php
			
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
					<a href="/catalogs/111"><?php
			
						while ($tupla = pg_fetch_array($categoria))
						{
							echo $tupla['nombre_cat'];
						}
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
		
		
	</body>
</html>