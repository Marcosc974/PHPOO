<?php
class Conexao {
	public static $conn;

	public static function conectar()	{
		if (!isset(self::$conn)) {
			self::$conn = new PDO("mysql:host=localhost;dbname=classe","root","");
			self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		return self::$conn;	
	}
}
?>