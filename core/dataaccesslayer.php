<?php
class DataAccessLayer
{
	protected $Link;

	public function __CONSTRUCT()
	{
		// Recuperamos nuestra cadena de conexión
		$ConnectionString = explode('|', _DB_CONNECTION_STRING_);

		try {
			// Instanciamos PDO
			$this->Link = new PDO($ConnectionString[0], $ConnectionString[1], $ConnectionString[2]);

			// Le indicamos que nos muestre los errores
			$this->Link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			// Si hay un error llamamos al ErrorController
			ErrorController::Show(4, $e);
		}

		return $this;
	}

	public function GetEntity($tb)
	{
		$arr = array();

	    foreach ($this->Link->query("DESCRIBE $tb") as $row) {
	        $arr[$row['Field']] = null;
	    }
		
		return (object) $arr;
	}

	/*
		Podriamos mejorar la clase DataAccessLayer creando
		metodos que faciliten la creacion de Querys.

		Este se conoce como ORM, pero para esta oportunidad
		no vamos a tocar estos temas, porque se haría muy extenso
		el curso.
	*/
}