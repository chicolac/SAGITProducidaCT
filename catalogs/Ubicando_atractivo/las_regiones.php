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
	
			$municipio = $_POST["munic"];
			$atractivo = $_POST["atractivo"];
			echo $atractivo.'<br>';
			//$region = $_POST["region"];
			
			
			require "../../mi_conexion2014/conexion.inc";
			$bd = new BD;
			
			$rsql = "SELECT DISTINCT id_region, nom_region FROM region;";
			$rresult = pg_query($rsql);
			//$tupla1 = pg_fetch_array();
			echo "La regi�n es $municipio";
			echo "<br>";
		?>
		
			<TABLE>
				<TR>
					<TH>REGIONES</TH><TH>MUNICIPIOS</TH>
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
									<form action="sus_municipios.php" method="post"  name="miform">
										<button>
											Un <b>bot�n</b>
											<br>
											<br>
											haga click para VER MUNICIPIOS!
											<hr>
											
											<br>
											<img src="municipio.JPG" width="158" height="44" alt="">
										</button>
										<input type="hidden" name="opcion_reg" value="<?php echo $tupla['id_region'] ?>">
										
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
