<?php

require "cfg/model.php";
require "cfg/service.php";
require "cfg/servicep.php";
require "cfg/serviceped.php";
require "cfg/serviceiped.php";
require "cfg/conexao.php";


$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


if ($acao == 'recuperar_pedido') {
	$tarefaped = new Tarefa_Pedido();
	$tarefaiped = new Tarefa_IPedido();
	//	$tarefaiped->__set('id', $_GET['id']);
	$tarefa = new Tarefa_Cliente();
	$tarefap = new Tarefa_Produto();

	$conexao = new Conexao();

	$tarefapService = new PedidoService($conexao, $tarefaped);
	$tarefasped = $tarefapService->recuperar_pedido();

	$tarefaipService = new IPedService($conexao, $tarefaiped);
	$tarefasip = $tarefaipService->recuperar_ipedido();

	$tarefaService = new ClienteService($conexao, $tarefa);
	$tarefascli = $tarefaService->recuperar_cli();

	$tarefapService = new ProdutoService($conexao, $tarefap);
	$tarefasprod = $tarefapService->recuperar_prod();
}
if ($acao == 'recuperar_itempedido') {
	$tarefaiped = new Tarefa_IPedido();
	//	$tarefaiped->__set('id', $_GET['id']);
	$conexao = new Conexao();
	$tarefaipService = new IPedService($conexao, $tarefaiped);
	$tarefasip = $tarefaipService->recuperar_ipedido();
}

?>