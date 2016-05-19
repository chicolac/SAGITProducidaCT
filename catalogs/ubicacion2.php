<?php

session_start();

echo "Tu usuario es: ".$_SESSION['usuario']."<br /> Tu contraseña es: ".$_SESSION['contrasena'];

$usuario = $_SESSION['usuario'];
$contrasena = $_SESSION['contrasena'];

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Elegir ubicaci&oacute;n</title>
		
		<?php include("../biblioteca.phtml") ?>
		<?php estiloAdentro() ?>
		
		<link rel="STYLESHEET" type="text/css" href="estiloVerdad.css">
		
		<script type="text/javascript" src="../javascript/jquery-2.1.0.js"></script>
		<script type="text/javascript" src="../javascript/filtro.js"></script>
		
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

                require "../mi_conexion2014/conexion.rts";
                $bd = new BD;
		
		$codigodel_atractivo = $_POST['atractivo'];
		
		echo 'Esto es lo que me envia la página anterior: '.$codigodel_atractivo.'<br>';

                function lista_desplegable($id, $nombre, $tabla)
                {
                        $consulta = "SELECT DISTINCT t.".$id.", t.".$nombre." FROM ".$tabla." as t;";
                        echo $consulta;
                        return pg_exec($consulta);

                }

        ?>
        
        <p><input type="text" id="search_string" placeholder="municipio.." /></p>
        
        <FORM ACTION="registrar_ubicacion.php?codigodel_atractivo=<?php echo $codigodel_atractivo ?>" METHOD="POST">
            <TABLE id="municipios">
                <tr>
                    <th>UBICACI&Oacute;N</th>
                    <th>PROVINCIA</th>
                    <th>MUNICIPIO</th>
                    <th>REGI&Oacute;N</th>
                    <th>PISO ECOL&Oacute;GICO</th>
                    <th>elegir la ubicaci&oacute;n</th>
                </tr>

                   <?php 
                    ?>
					
                <?php
                        //$resultado = lista_desplegable('id_pisoeco', 'nom_pisoeco', 'piso_ecologico');
                        $consulta = "SELECT DISTINCT id_ubicacion, cod_municipio, id_region, id_pisoeco FROM ubicacion;";
                        $resultado = pg_exec($consulta);

                        echo "<br>";

                        echo $resultado;

                ?>

                <?php
                        $counter=0;

                        while ($tupla = pg_fetch_array($resultado))
                        {
                                echo "<tr>";
                                // en checkbox debemos guardar el id
                                if ($counter % 2 == 0)
                                        $suave = 'suave';
                                else
                                        $suave = 'oscuro';
                ?>
                                <td></td>
                                <td >
                                        <div id= "<?php echo $suave ?>" >
                                                <?php 
                                                        $municipio = utf8_encode($tupla['cod_municipio']);
							if ($municipio != "")
                                                        {
								$consultaP = "SELECT nombre_provincia FROM provincia p, municipio m WHERE p.cod_provincia = m.cod_provincia AND m.cod_municipio = $municipio;";
								$resultadoP = pg_exec($consultaP);
								$tuplaP = pg_fetch_array($resultadoP);
								//echo utf8_encode($tuplaP['nombre_provincia']);
								echo $tuplaP['nombre_provincia'];
                                                        }
							
                                                ?>
                                        </div>
                                </td>
                                <td class="nombre">
                                        <div id= "<?php echo $suave ?>" >
                                                <?php 
							if ($municipio != "")
                                                        {
								//$municipio = utf8_encode($tupla['cod_municipio']);
								$consultaM = "SELECT nombre_mun FROM municipio WHERE cod_municipio = $municipio;";
								$resultadoM = pg_exec($consultaM);
								$tuplaM = pg_fetch_array($resultadoM);
								//echo utf8_encode($tuplaM['nombre_mun']);
								echo $tuplaM['nombre_mun'];
							}
                                                ?>
                                        </div>
                                </td>
                                <td>
                                        <div id= "<?php echo $suave ?>" >
                                                <?php 
                                                        $region = utf8_encode($tupla['id_region']);
                                                        if ($region != "")
                                                        {
                                                                $consultaR = "SELECT nombre_region FROM region WHERE id_region = $region;";
                                                                $resultadoR = pg_exec($consultaR);
                                                                $tuplaR = pg_fetch_array($resultadoR);
                                                                //$region = utf8_encode($tuplaR['nombre_region']);
                                                                $region = $tuplaR['nombre_region'];
                                                        }
                                                        echo $region; 
                                                ?>
                                        </div>
                                </td>
                                <td>
                                        <div id= "<?php echo $suave ?>" >
                                                <?php
                                                        $pisoeco = utf8_encode($tupla['id_pisoeco']);
                                                        if ($pisoeco != "")
                                                        {
                                                                $consultaPE = "SELECT nombre_pisoeco FROM piso_ecologico WHERE id_pisoeco = $pisoeco;";
                                                                $resultadoPE = pg_exec($consultaPE);
                                                                $tuplaPE = pg_fetch_array($resultadoPE);
                                                                //$pisoeco = utf8_encode($tuplaPE['nombre_pisoeco']); 
                                                                $pisoeco = $tuplaPE['nombre_pisoeco'];
                                                        }
                                                        echo $pisoeco;
                                                ?>
                                        </div>
                                </td>					
				<td>
					<input type="checkbox" id="id_mantener[]" name="ubicacion[]" value="<?php echo $tupla['id_ubicacion'] ?>"/>
				</td>

                <?php
                        $counter++;
                        echo "</tr>";

                        }

                ?>
			</TABLE>
            <table width="20%"  align="center"cellpadding="4" cellspacing="2">
				<tr class="titulo_tabla">
				   <th>Guardar la ubicaci&oacute;n: </th>
				   <th><input type="submit" value="Guardar" name="tipo_man" id="tipo_man"></th>
				</tr>
            </table>
		</FORM>
		<br>
		<input type=button value="[ REGRESAR A LA P&Aacute;GINA ANTERIOR ]" onclick="history.go(-1)">
				
				</article>			
			</section>		
			<footer>
				<?php piePageIn() ?>
			</footer>
		</div>

	</body>
</html>

