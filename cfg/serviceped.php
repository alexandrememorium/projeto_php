<?php

//CRUD Pedido
class PedidoService
{

	private $conexao;
	private $tarefaped;

	public function __construct(Conexao $conexao, Tarefa_Pedido $tarefaped)
	{
		$this->conexao = $conexao->conectar();
		$this->tarefaped = $tarefaped;
	}

	//CRUD Pedido
	public function inserir_pedido()
	{
		$query = 'insert into Pedido(Id_Cliente, Id_Produto, Quantidade) values(:cliente, :produto, :qtd)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':cliente', $this->tarefaped->__get('cliente'));
		$stmt->bindValue(':produto', $this->tarefaped->__get('produto'));
		$stmt->bindValue(':qtd', $this->tarefaped->__get('qtd'));
		$stmt->execute();
	}

	public function recuperar_pedido()
	{
		$query = '
			select 
				ped.NumeroPedido, ped.Id_Cliente, c.NomeCliente, ped.Total, DATE_FORMAT(ped.Dt_Pedido,"%d/%m/%Y")  as Dt_Pedido, DATE_FORMAT(ped.Dt_Cadastro,"%d/%m/%Y  %Hh%im")  as Dt_Cadastro
			from 
				pedido as ped
			left outer join  cliente as c on c.id_Cliente = ped.Id_Cliente
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function atualizar_pedido()
	{

		$query = "update pedido set Id_Cliente = :cliente, Id_Produto = :produto, Quantidade = :qtd
		  		  where NumeroPedido = :id";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':cliente', $this->tarefaped->__get('cliente'));
		$stmt->bindValue(':produto', $this->tarefaped->__get('produto'));
		$stmt->bindValue(':qtd', $this->tarefaped->__get('qtd'));
		$stmt->bindValue(':id', $this->tarefaped->__get('id'));
		return $stmt->execute();
	}

	public function remover_pedido()
	{

		$query = 'delete from pedido where NumeroPedido = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefaped->__get('id'));
		$stmt->execute();
	}

	public function recuperarpedidoid()
	{
		$query = '
			select 
				ped.Id_Cliente, ped.Id_Produto, ped.Quantidade, DATE_FORMAT(c.dt_cadastro,"%d/%m/%Y  %Hh%im")  as data_cadastro
			from 
				pedido as ped
			where
				ped.NumeroPedido = :id
		';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefaped->__get('id'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

}

?>