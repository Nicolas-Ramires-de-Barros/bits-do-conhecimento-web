<?php

$bd_host = "200.19.1.18";
$sgbd = "pgsql";
$base_de_dados = "nicolasbarros"; //MUDA PARA O NOME DO SEU BANCO
$bd_usuario = "nicolasbarros"; //MUDA PARA O NOME DO SEU BANCO

$bd_senha = "123456"; // CASO TENHA MUDADO A SENHA COLOQUE A SUA CASO NÃO DEIXA ESSA MESMO

switch ($sgbd) {
	 case "mysql":
		 try {
			 $dsn_mysql = "mysql:host=".$bd_host.";dbname=".$base_de_dados;
			 $conn = new PDO($dsn_mysql, $bd_usuario, $bd_senha);
			 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 } catch(PDOException $e) {
			die('ERROR: ' . $e->getMessage());
		 }
		 break;
	 case "pgsql":
		 try {
			 $dsn_pgsql = "pgsql:host=$bd_host;port=5432;dbname=$base_de_dados;";
			$conn = new PDO(
			$dsn_pgsql,
			$bd_usuario,
			$bd_senha,
				[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
			);
			$conn->exec("SET client_encoding TO 'UTF8'");
		} catch (PDOException $e) {
			die($e->getMessage());
		 }
		break;
	case "sqlite":

		$conn = new PDO('sqlite:./sql/catalogo_de_games.sqlite3');
		$conn->setAttribute(PDO::ATTR_ERRMODE, 
												PDO::ERRMODE_EXCEPTION);
		break;
}

?>
