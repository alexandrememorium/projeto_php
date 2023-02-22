<?php

class Conexao {

	private $host = 'localhost';
	private $dbname = 'proj_php';
	private $user = 'york';
	private $pass = 'osan2030';
	

	public function conectar() {
		try {

			$conexao = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass"				
			);

			return $conexao;


		} catch (PDOException $e) {
			echo '<p>'.$e->getMessage().'</p>';
		}
	}
}

?>