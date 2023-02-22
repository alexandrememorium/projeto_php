<?php

//CRUD Pedido
class IPedService
{

	private $conexao;
	private $tarefaiped;

	public function __construct(Conexao $conexao, Tarefa_IPedido $tarefaiped)
	{
		$this->conexao = $conexao->conectar();
		$this->tarefaiped = $tarefaiped;
	}

	//CRUD IPedido
	public function inserir_ipedido()
	{
		$query = 'insert into item_pedido(NumeroPedido, Id_Produto, Quantidade, ValorUnitario) values(:pedido, :produto, :qtd, :valor)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':pedido', $this->tarefaiped->__get('pedido'));
		$stmt->bindValue(':produto', $this->tarefaiped->__get('produto'));
		$stmt->bindValue(':qtd', $this->tarefaiped->__get('qtd'));
		$stmt->bindValue(':valor', $this->tarefaiped->__get('valor'));
		$stmt->execute();
	}

	public function recuperar_ipedido()
	{
		$query = '
			select 
				iped.id_item, 
				iped.NumeroPedido, 
				iped.Id_Produto as Id_Produto, 
				p.NomeProduto as NomeProduto, 
				p.Codbarras as CodBarras, 
				iped.Quantidade as Qtd, 
				iped.ValorUnitario as ValorU, 
				(iped.Quantidade*iped.ValorUnitario) as Total
			from 
				item_pedido as iped
			left outer join  produto as p on p.Id_Produto = iped.Id_Produto

		';
		$stmt = $this->conexao->prepare($query);
//		$stmt->bindValue(':id', $this->tarefaiped->__get('id'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

}

?>