<?php

?>

<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Projeto NewTab Academy PHP</title>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico?v=2" />
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
		integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<script>

	</script>

</head>

<body>
	<nav class="navbar navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="img/logo.png" width="6%" class="d-inline-block align-top" alt="">
				<strong>Projeto PHP</strong>
			</a>
		</div>
	</nav>

	<div class="container app">
		<div class="row">
			<div class="col-md-3 menu">
				<ul class="list-group">
					<li class="list-group-item active"><a href="#">Principal</a></li>
					<li class="list-group-item"><a href="cliente.php">Cliente</a></li>
					<li class="list-group-item"><a href="produto.php">Produto</a></li>
					<li class="list-group-item"><a href="pedido.php">Pedido</a></li>
				</ul>
			</div>

			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<div class="col-title">
								<h4>Projeto NewTab Academy PHP</h4>
								<img src="img/logont.png" alt="NewTab Academy" align="right">
							</div>
							<hr />

							<div class="row mb-3 d-flex align-items-center tarefa">
								<div class="col-sm-9">
									<h3>Projeto individual: PHP</h3>
									<h5>Teste técnico original: </h5><br>
									<a
										href="https://github.com/dotlib/teste-desenvolvedor-php/blob/master/teste-junior.md">https://github.com/dotlib/teste-desenvolvedor-php/blob/master/teste-junior.md</a><br>
									<p>O projeto consiste em implementar uma aplicação web a partir de uma modelagem de
										dados inicial desnormalizada, que deve ser normalizada para a implementação da
										solução.</p>
									<p>Você vai criar uma aplicação de cadastro de pedidos de compra, a partir de uma
										modelagem inicial, com as seguintes funcionalidades:</p>
									<ul>
										<li>CRUD de clientes.</li>
										<li>CRUD de produtos.</li>
										<li>CRUD de pedidos de compra, com status (Em Aberto, Pago ou Cancelado).</li>
										<li>Cada CRUD:</li>
										<ul>
											<li>deve ser filtrável e ordenável por qualquer campo, e possuir paginação
												de 20 itens.</li>
											<li>deve possuir formulários para criação e atualização de seus itens.</li>
											<li>deve permitir a deleção de qualquer item de sua lista.</li>
										</ul>
										<li>Barra de navegação entre os CRUDs.</li>
										<li>Links para os outros CRUDs nas listagens (Ex: link para o detalhe do cliente
											da compra na lista de pedidos de compra)</li>
									</ul>
									<br>
									<h5>Modelo de dados</h5><br>
									<p>A modelagem inicial para a implementação da solução é a seguinte:</p>
									<p align="center"><img src="img/img1.png" alt="Modelagem"></p>
									<p>Você deve alterar esta modelagem para que a mesma cumpra com as três primeiras
										formas normais.</p>
									<p>Além disso, a alteração deste banco de dados deve prever uma migração das
										informações. Ou seja, selecionar do modelo atual para o novo modelo projetado
										por você.</p><br>

									<h5>Prazos das atividades</h5><br>

									<p>Para as atividades, considerando uma dedicação de 3-4 horas por dia, estimamos
										que seja possível que você consiga realizá-las em aproximadamente da seguinte
										forma:</p>

									<ul>
										<li>SEMANA 1:</li>
										<ul>
											<li>Estudo PHP</li>
											<li>Início do projeto</li>
										</ul>
									</ul><br>
									<ul>
										<li>SEMANA 2:</li>
										<ul>
											<li>Término da modelagem de dados</li>
											<li>Término do CRUD de clientes.</li>
											<li>Início do CRUD de produtos.</li>
										</ul>
									</ul><br>
									<ul>
										<li>SEMANA 3:</li>
										<ul>
											<li>Término do CRUD de produtos.</li>
											<li>Término do CRUD de pedidos.</li>
										</ul>
									</ul><br>

									<p>Se conseguir antes, fantástico!</p>

									<p>Sempre que tiver dúvidas que não esteja conseguindo resolver por aí, lembre-se
										dos nossos recursos no Discord e facilitadores para te apoiar.</p>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>