<?php

require "cfg/model.php";
require "cfg/service.php";
require "cfg/conexao.php";


$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


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

?>