<?php

session_start();

echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

?>


<HTML>
    <HEAD>
        <TITLE>T�tulo de la p�gina</TITLE>
        <link rel="STYLESHEET" type="text/css" href="estilo.css">
    </HEAD>

    <BODY>
        Aqu� ir�a el contenido de la p�gina
		<?php
	
			$municipio = $_POST["opcion_munic"];
			$region = $_POST["opcion_reg"];
			$atractivo = $_POST["atractivo"];
			echo $atractivo.'<br>';
			
			echo $municipio;
			require "../../mi_conexion2014/conexion.inc";
			$bd = new BD;
			
			$rsql = "SELECT DISTINCT p.id_pisoeco, p.nom_pisoeco FROM ubicacion u, region r, piso_ecologico p WHERE u.cod_mun=$municipio and u.id_region=$region and r.id_region = u.id_region and p.id_pisoeco=u.id_pisoeco;";
			$rresult = pg_query($rsql);
			//$tupla1 = pg_fetch_array();
			echo "El municipio es $municipio";
			echo "<br>";
		?>
		
		<br>
			<input type=button value="[ REGRESAR A LA P&Aacute;GINA ANTERIOR ]" onclick="history.go(-1)">
		
			<TABLE>
				<TR>
					<TH>PISOS ECOL&Oacute;GICOS</TH><TH>ATRACTIVOS TUR&Iacute;STICOS</TH>
				</TR>
				<?php
					if($rresult != "")
					{
						
						while ($tupla = pg_fetch_array($rresult))
						{
				?>
							<TR>
								<TD><?php echo $tupla['nom_pisoeco'] ?></TD>
								<TD>  
									<form action="colgando_atractivo.php" method="post" name="miform">
										
										<input type="hidden" name="opcion_piso" value="<?php echo $tupla['id_pisoeco'] ?>">
										<input type="hidden" name="opcion_reg" value="<?php echo $region ?>">
										<input type="hidden" name="opcion_munic" value="<?php echo $municipio ?>">
										
										<input type="hidden" name="atractivo" value="<?php echo $atractivo ?>">
										<input type="submit" value="colgar atractivo tur&iacute;stico" name="enviar">
									</form>
								</TD>
							</TR>
							
							<?php
						}
					}
				?>
				
				<input type="hidden" name="opcion" value="si">
			</TABLE>

		
		
    </BODY>
</HTML>
