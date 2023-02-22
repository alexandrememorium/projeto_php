<?php

//CRUD Cliente
class ClienteService
{

	private $conexao;
	private $tarefa;

	public function __construct(Conexao $conexao, Tarefa_Cliente $tarefa)
	{
		$this->conexao = $conexao->conectar();
		$this->tarefa = $tarefa;
	}

	//CRUD CLiente
	public function inserir_cliente()
	{
		$query = 'insert into cliente(nomeCliente, Cpf, email) values(:nome, :cpf, :email)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nome', $this->tarefa->__get('nome'));
		$stmt->bindValue(':cpf', $this->tarefa->__get('cpf'));
		$stmt->bindValue(':email', $this->tarefa->__get('email'));
		$stmt->execute();
	}

	public function recuperar_cliente()
	{
		$query = '
			select 
			(@row := @row + 1) as INDICE, c.id_Cliente, c.NomeCliente, c.Cpf, c.email, DATE_FORMAT(c.dt_cadastro,"%d/%m/%Y  %Hh%im")  as data_cadastro
			from 
				cliente as c ,(SELECT @row := 0) as r  
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function recuperar_cli()
	{
		$query = '
			select 
			c.id_Cliente, c.NomeCliente
			from 
				cliente as c 
			order by c.NomeCliente 
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function atualizar_cliente()
	{

		$query = "update cliente set NomeCliente = :nome, Cpf = :cpf, email = :email 
		where id_Cliente = :id";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':nome', $this->tarefa->__get('nome'));
		$stmt->bindValue(':cpf', $this->tarefa->__get('cpf'));
		$stmt->bindValue(':email', $this->tarefa->__get('email'));
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		return $stmt->execute();
	}

	public function remover_cliente()
	{

		$query = 'delete from cliente where id_cliente = :id_cliente';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_cliente', $this->tarefa->__get('id'));
		$stmt->execute();
	}

	public function recuperarClienteid()
	{
		$query = '
			select 
				c.id_Cliente, c.NomeCliente, c.Cpf, c.email, DATE_FORMAT(c.dt_cadastro,"%d/%m/%Y  %Hh%im")  as data_cadastro
			from 
				cliente as c
			where
				c.id_Cliente = :id_cliente
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_cliente', $this->tarefa->__get('id_cliente'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

}


?>