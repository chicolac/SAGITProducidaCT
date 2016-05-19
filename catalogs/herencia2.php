<?php

class foo
{
     private $anio;
	 
     public function foo()
	 {
		  
	     echo"hola soy foo<br>";
		 $this->anio=2012;
	 }
    public function printItem($string)
    {
        echo 'Foo: ' . $string . PHP_EOL."<br>";
    }
    
    public function printPHP()
    {
        echo 'PHP is great.' . PHP_EOL."<br>";
    }
	public function getanio()
	{
	      return $this->anio;
	}
	public function setanio($x)
	{
	    
			$this->anio=$x;
	}
}

class bar extends foo
{
         public function  bar()
		 {
		    echo "hola soy bar <br>";
			parent::__construct();
		 }
    public function printItem($string)
    {
        echo 'Bar: ' . $string . PHP_EOL."<br>";
    }
}


$foo = new foo();
echo '<h1>iniciando al Padre...</h1>';

$bar = new bar();
echo '<h1>iniciando al Hijo...</h1>';


$foo->printItem('baz'); // Salida: 'Foo: baz'
$foo->printPHP();       // Salida: 'PHP is great' 
$bar->printItem('baz'); // Salida: 'Bar: baz'
$bar->printPHP();       // Salida: 'PHP is great'
echo $bar->getanio().'<br>';
echo $bar->setanio(2001);
echo $bar->getanio();

?> 