<html>
	<head>
		<title>Example</title>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
		<link rel="STYLESHEET" type="text/css" href="estilo.css">
	</head>
	<body>

		<?php
			require "conexion.inc";
			$bd = new BD;
			
			$clasificacion_base = $_POST["mi_hijo"];
			$clasificacion_jefe = $_POST["mi_jefe"];
			
			$tu_padre = htmlspecialchars($clasificacion_base);
			echo $tu_padre.'<br>';
			
			$tu_jefe = htmlspecialchars($clasificacion_jefe);
			echo $tu_jefe.'<br>';
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
		
	</body>
</html>