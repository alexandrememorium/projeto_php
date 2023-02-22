<?php

class Tarefa_Cliente {
	private $id;
	private $nome;
	private $cpf;
	private $email;
	private $data_cadastro;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}

class Tarefa_Produto {
	private $id;
	private $cod;
	private $nome;
	private $valor;
	private $data_cadastro;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}

class Tarefa_Pedido {
	private $id;
	private $cliente;
	private $dt_pedido;
	private $total;
	private $dt_cadastro;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}

class Tarefa_IPedido {
	private $id;
	private $id_produto;
	private $qtd;
	private $valorU;
	private $dt_cadastro;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}
?>