<?php

require "cfg/model.php";
require "cfg/service.php";
require "cfg/servicep.php";
require "cfg/serviceped.php";
require "cfg/serviceiped.php";
require "cfg/conexao.php";


$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if (($acao == 'inserir_cliente') || ($acao == 'recuperar_cliente') || ($acao == 'atualizar_cliente') || ($acao == 'remover_cliente')) {
    $op= '1';
} else if (($acao == 'inserir_produto') || ($acao == 'recuperar_produto') || ($acao == 'atualizar_produto') || ($acao == 'remover_produto')) {
    $op= '2';
} else {
//	$acao_i = isset($_GET['acao_i']) ? $_GET['acao_i'] : $acao_i;
//	$acao_c = isset($_GET['acao_c']) ? $_GET['acao_c'] : $acao_c;
	$op= '3';
}

if ($op == '1') {
	if ($acao == 'inserir_cliente') {
		$tarefa = new Tarefa_Cliente();
		$tarefa->__set('nome', $_POST['nome'])
			->__set('cpf', $_POST['cpf'])
			->__set('email', $_POST['email']);

		$conexao = new Conexao();

		$tarefaService = new ClienteService($conexao, $tarefa);
		$tarefaService->inserir_cliente();

		header('Location: cliente.php');

	} else if ($acao == 'recuperar_cliente') {

		$tarefa = new Tarefa_Cliente();
		$conexao = new Conexao();

		$tarefaService = new ClienteService($conexao, $tarefa);
		$tarefascli = $tarefaService->recuperar_cliente();

	} else if ($acao == 'atualizar_cliente') {

		$tarefa = new Tarefa_Cliente();
		$tarefa->__set('id', $_POST['editid'])
			->__set('nome', $_POST['editnome'])
			->__set('cpf', $_POST['editcpf'])
			->__set('email', $_POST['editemail']);

		$conexao = new Conexao();

		$tarefaService = new ClienteService($conexao, $tarefa);
		$tarefaService->atualizar_cliente();

		header('Location: cliente.php');

	} else if ($acao == 'remover_cliente') {

		$tarefa = new Tarefa_Cliente();
		$tarefa->__set('id', $_GET['id_cliente']);

		$conexao = new Conexao();

		$tarefaService = new ClienteService($conexao, $tarefa);
		$tarefaService->remover_cliente();

		header('location: cliente.php');

	} else if ($acao == 'recuperarClienteid') {
		$tarefa = new Tarefa_Cliente();
		$tarefa->__set('id', $_GET['id_cliente']);

		$conexao = new Conexao();

		$tarefaService = new ClienteService($conexao, $tarefa);
		$tarefascli = $tarefaService->recuperarClienteid();

	}

} else if ($op == '2') {
	if ($acao == 'inserir_produto') {

		$tarefap = new Tarefa_Produto();
		$tarefap->__set('cod', $_POST['cod'])
			->__set('nome', $_POST['nome'])
			->__set('valor', str_replace(',', '.', $_POST['valor']));

		$conexao = new Conexao();

		$tarefapService = new ProdutoService($conexao, $tarefap);
		$tarefapService->inserir_produto();

		header('Location: produto.php');

	} else if ($acao == 'recuperar_produto') {

		$tarefap = new Tarefa_Produto();
		$conexao = new Conexao();

		$tarefapService = new ProdutoService($conexao, $tarefap);
		$tarefasprod = $tarefapService->recuperar_produto();

	} else if ($acao == 'remover_produto') {

		$tarefap = new Tarefa_Produto();
		$tarefap->__set('id', $_GET['Id_Produto']);

		$conexao = new Conexao();

		$tarefaService = new ProdutoService($conexao, $tarefap);
		$tarefaService->remover_produto();

		header('location: produto.php');

	} else if ($acao == 'atualizar_produto') {

		$tarefap = new Tarefa_Produto();
		$tarefap->__set('id', $_POST['editid'])
			->__set('cod', $_POST['editcod'])
			->__set('nome', $_POST['editnome'])
			->__set('valor', str_replace(',', '.', $_POST['editvalor']));

		$conexao = new Conexao();

		$tarefaService = new ProdutoService($conexao, $tarefap);
		$tarefaService->atualizar_produto();

		header('Location: produto.php');

	}

} else if ($op == '3') {

	if ($acao == 'recuperar_pedido') {
		$tarefaped = new Tarefa_Pedido();
		$conexao = new Conexao();
		$tarefapService = new PedidoService($conexao, $tarefaped);
		$tarefasped = $tarefapService->recuperar_pedido();

	//}
	//if ($acao_i == 'recuperar_itempedido') {
		$tarefaiped = new Tarefa_IPedido();
		//	$tarefaiped->__set('id', $_GET['id']);
		$conexao = new Conexao();
		$tarefaipService = new IPedService($conexao, $tarefaiped);
		$tarefasip = $tarefaipService->recuperar_ipedido();
	//}

	//if ($acao_c == 'recuperar_cliente') {
		$tarefa = new Tarefa_Cliente();
		$conexao = new Conexao();
		$tarefaService = new ClienteService($conexao, $tarefa);
		$tarefascli = $tarefaService->recuperar_cli();
	//}

	//if ($acao_p == 'recuperar_produto') {
		$tarefap = new Tarefa_Produto();
		$conexao = new Conexao();
		$tarefapService = new ProdutoService($conexao, $tarefap);
		$tarefasprod = $tarefapService->recuperar_prod();
	}
	
}
?>