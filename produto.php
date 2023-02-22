<?php

$acao = 'recuperar_produto';
require 'controller.php';

/*
echo '<pre>';
print_r($tarefas);
echo '</pre>';
*/

?>

<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Projeto NewTab Academy PHP</title>

	<link rel="stylesheet" href="css/estilo.css">
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
		integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

	<script>
		function editar(id, cod, nome, valor) {

			const editModal = new bootstrap.Modal(document.getElementById("modalalteracao"));
			editModal.show();

			document.getElementById("editid").value = id;
			document.getElementById("editcod").value = cod;
			document.getElementById("editnome").value = nome;
			document.getElementById("editvalor").value = valor;

		}

		function remover(Id_Produto) {
			if (confirm('Deseja Excluir Registro !!!')) {
				location.href = 'produto.php?acao=remover_produto&Id_Produto=' + Id_Produto;
			}

		}


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
					<li class="list-group-item"><a href="index.php">Principal</a></li>
					<li class="list-group-item"><a href="cliente.php">Clientes</a></li>
					<li class="list-group-item active"><a href="produto.php">Produtos</a></li>
					<li class="list-group-item"><a href="pedido.php">Pedidos</a></li>
				</ul>
			</div>

			<div class="col-sm-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<div class="col-title">
								<div>
									<h4><strong>Produto</strong></h4>
								</div>
								<div>
									<img src="img/logont.png" alt="NewTab Academy" align="right">
								</div>
							</div>
							<br>

							<div class="container text-center">
								<div class="row">
									<hr />
									<table class="table table-hover" style="width:100%">
										<thead>
											<tr>
												<th scope="col" style="width: 25%;text-align: left;"><strong>Cód. Barras</strong></th>
												<th scope="col" style="width: 50%;text-align: left;"><strong>Nome Produto</strong></th>
												<th scope="col" style="width: 10%;text-align: end;"><strong>Valor</strong></th>
												<th scope="col" style="width: 15%;text-align: center;"><span class="fas fa-solid fa-plus fa-lg text-info"
														data-bs-toggle="modal" data-bs-target="#Modalcadastro"
														align="center"></span></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($tarefasprod as $indice => $tarefap) { ?>
												<tr id="<?= $tarefap->Id_Produto ?>">
													<td style="width: 25%;text-align: left;">
														<?= $tarefap->Codbarras ?>
													</td>
													<td style="width: 50%;text-align: left;">
														<?= $tarefap->NomeProduto ?>
													</td>
													<td style="width: 10%;text-align: end;">
														<?= str_replace('.', ',', $tarefap->ValorUnitario) ?>
													</td>
													<td style="width: 15%;text-align: center;">
														<i class="fas fa-edit fa-lg text-info"
															onclick="editar(<?= $tarefap->Id_Produto ?>, ' <?= $tarefap->Codbarras ?>', '<?= $tarefap->NomeProduto ?>', '<?= $tarefap->ValorUnitario ?>')"></i>

														<i class="fas fa-trash-alt fa-lg text-danger"
															onclick="remover(<?= $tarefap->Id_Produto ?>)"></i>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Cadastro-->
		<div class="modal fade" id="modalcadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Produto</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form method="post" action="controller.php?acao=inserir_produto"
							class="row g-3 needs-validation was-validated">
							<label class="form-label">Cód. Barras</label>
							<input type="text" class="form-control" id="cod" name="cod" placeholder="Código de Barras"
								maxlength="20" required>


							<label class="form-label">Nome Produto</label>
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto"
								maxlength="100" required>

							<label class="form-label">Valor</label>
							<input type="text" class="form-control" id="valor" name="valor" placeholder="0,00" required>
							<script>
							//	$("#valor").maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
							$(function () {
								$("#valor").maskMoney({
									allowNegative: true,
									thousands: '',
									decimal: ','
								});
							});								
						</script>
							<div class="modal-footer">
								<button class="btn btn-primary" type="submit">Salvar</button>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Final Modal Cadastro-->

	<!-- Modal Alteração-->
	<div class="modal fade" id="modalalteracao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Alteração de Produto</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="post" action="controller.php?acao=atualizar_produto"
						class="row g-3 needs-validation was-validated">
						<label class="form-label" hidden>Id</label>
						<input type="text" class="form-control" id="editid" name="editid" placeholder="Id" hidden>

						<label class="form-label">Cód. Barras</label>
						<input type="text" class="form-control" id="editcod" name="editcod"
							maxlength="20" required>

						<label class="form-label">Nome do Produto</label>
						<input type="text" class="form-control" id="editnome" name="editnome"
							maxlength="100" required>

						<label class="form-label">Valor</label>
						<input type="text" class="form-control" id="editvalor" name="editvalor" required>
						<script>
							//	$("#editvalor").maskMoney({ allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
							$(function () {
								$("#editvalor").maskMoney({
									allowNegative: true,
									thousands: '',
									decimal: ','
								});
							});								
						</script>
						<div class="modal-footer">
							<button class="btn btn-primary" type="submit">Salvar</button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- FinalModal Alteração-->


</body>


</html>