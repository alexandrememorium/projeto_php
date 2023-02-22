<?php


//CRUD Produto
class ProdutoService
{

	private $conexao;
	private $tarefap;

	public function __construct(Conexao $conexao, Tarefa_Produto $tarefap)
	{
		$this->conexao = $conexao->conectar();
		$this->tarefap = $tarefap;
	}

	//CRUD Produto
	public function inserir_produto()
	{
		$query = 'insert into produto(Codbarras, NomeProduto, ValorUnitario) values(:cod, :nome, :valor)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':cod', $this->tarefap->__get('cod'));
		$stmt->bindValue(':nome', $this->tarefap->__get('nome'));
		$stmt->bindValue(':valor', $this->tarefap->__get('valor'));
		$stmt->execute();
	}

	public function recuperar_produto()
	{
		$query = '
			select 
				p.Id_Produto, p.Codbarras, p.NomeProduto, p.ValorUnitario, DATE_FORMAT(p.dt_cadastro,"%d/%m/%Y  %Hh%im")  as data_cadastro
			from 
				produto as p
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function atualizar_produto()
	{

		$query = "update produto set Codbarras = :cod, NomeProduto = :nome, ValorUnitario = :valor 
		where Id_Produto = :id";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':cod', $this->tarefap->__get('cod'));
		$stmt->bindValue(':nome', $this->tarefap->__get('nome'));
		$stmt->bindValue(':valor', $this->tarefap->__get('valor'));
		$stmt->bindValue(':id', $this->tarefap->__get('id'));
		return $stmt->execute();
	}

	public function remover_produto()
	{

		$query = 'delete from produto where Id_Produto = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefap->__get('id'));
		$stmt->execute();
	}

	public function recuperarProdutoid()
	{
		$query = '
			select 
			p.Id_Produto, p.Codbarras, p.NomeProduto, p.ValorUnitario, DATE_FORMAT(p.dt_cadastro,"%d/%m/%Y  %Hh%im")  as data_cadastro
			from 
				produto as p
			where
				p.Id_Produto = :id
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefap->__get('id'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

}


?>