<?php

class BD {

  var $host = "localhost";
  var $puerto = "5432";
  var $bd = "posicionamiento";
  var $usuario = "postgres";
  var $clave = "postgres";
  var $conex;

  function BD() {
    $cx= pg_connect("host=$this->host port=$this->puerto dbname=$this->bd user=$this->usuario password=$this->clave");
	
    if (pg_ErrorMessage($cx)) {
      echo "<p><b>Ocurrió un error conectando a la base de datos: .</b></p>";
      exit;
    }
    $this->conex = $cx;
  }

  function conexion() {
    return $this->conex;
  }	

  function cerrar() {
    pg_close($this->conex);
  }

}
?>
