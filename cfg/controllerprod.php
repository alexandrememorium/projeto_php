<?php

require "cfg/model.php";
require "cfg/servicep.php";
require "cfg/conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

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


?>