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
			$atractivo = $_POST["atractivo"];
			echo $atractivo.'<br>';
			//$region = $_POST["region"];
			
			echo $municipio;
			require "../../mi_conexion2014/conexion.inc";
			$bd = new BD;
			
			$rsql = "SELECT DISTINCT r.id_region, r.nom_region FROM ubicacion u, region r WHERE u.cod_mun=$municipio and r.id_region = u.id_region;";
			$rresult = pg_query($rsql);
			//$tupla1 = pg_fetch_array();
			echo "El municipio es $municipio";
			echo "<br>";
		?>
		
		<br>
			<input type=button value="[ REGRESAR A LA P&Aacute;GINA ANTERIOR ]" onclick="history.go(-1)">
			<TABLE>
				<TR>
					<TH>REGIONES</TH><TH>PISOS ECOL&Oacute;GICOS</TH>
				</TR>
				<?php
					if($rresult != "")
					{
						
						while ($tupla = pg_fetch_array($rresult))
						{
				?>
							<TR>
								<TD><?php echo $tupla['nom_region'] ?></TD>
								<TD>  
									<form action="los_pisos.php" method="post" name="miform">
										<button>
											Un <b>bot�n</b>
											<br>
											<br>
											Click para ver los pisos ecol�gicos!
											<hr>
											
											<br>
											<img src="../../images/piso_eco.JPG" width="190" height="32" alt="">
										</button>
										<input type="hidden" name="opcion_reg" value="<?php echo $tupla['id_region'] ?>">
										<input type="hidden" name="opcion_munic" value="<?php echo $municipio ?>">
										
										<input type="hidden" name="atractivo" value="<?php echo $atractivo ?>">
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
