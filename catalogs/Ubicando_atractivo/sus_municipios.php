<?php

session_start();

echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contrase�a es: ".$_SESSION['contrasena'];

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
	
			$region = $_POST["opcion_reg"];
			$atractivo = $_POST["atractivo"];
			echo $atractivo.'<br>';
			//$municipio = $_POST["region"];
			
			echo $region;
			require "../../mi_conexion2014/conexion.inc";
			$bd = new BD;
			
			$rsql = "SELECT DISTINCT m.cod_mun, m.nombre_mun FROM ubicacion u, municipio m WHERE u.id_region=$region and m.cod_mun = u.cod_mun;";
			$rresult = pg_query($rsql);
			//$tupla1 = pg_fetch_array();
			echo "El municipio es $municipio";
			echo "<br>";
		?>
		
		<br>
			<input type=button value="[ REGRESAR A LA P&Aacute;GINA ANTERIOR ]" onclick="history.go(-1)">
			<TABLE>
				<TR>
					<TH>MUNICIPIOS</TH><TH>PISOS ECOL&Oacute;GICOS</TH>
				</TR>
				<?php
					if($rresult != "")
					{
						
						while ($tupla = pg_fetch_array($rresult))
						{
				?>
							<TR>
								<TD><?php echo $tupla['nombre_mun'] ?></TD>
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
										<input type="hidden" name="opcion_reg" value="<?php echo $region ?>">
										<input type="hidden" name="opcion_munic" value="<?php echo $tupla['cod_mun'] ?>">
										
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
