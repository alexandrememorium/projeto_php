<?php

$acao = 'recuperar_pedido';
//$acao_i = 'recuperar_itempedido';
//$acao_c = 'recuperar_cliente';
//$acao_p = 'recuperar_produto';
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
	<script>
		function editar(id) {

			const editModal = new bootstrap.Modal(document.getElementById("modalalteracao"));
			editModal.show();

			document.getElementById("editid").value = id;
			//document.getElementById("editcod").value = cod;
			//document.getElementById("editnome").value = nome;
			//document.getElementById("editvalor").value = valor;

		}

		function cadItem(id) {

			const cadItemModal = new bootstrap.Modal(document.getElementById("modalitens"));
			cadItemModal.show();

		}

		function remover(Id) {
			if (confirm('Deseja Excluir Registro !!!')) {
				location.href = 'pedido.php?acao=remover_pedido&NumeroPedido=' + Id;
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
					<li class="list-group-item"><a href="produto.php">Produtos</a></li>
					<li class="list-group-item active"><a href="pedido.php">Pedidos</a></li>
				</ul>
			</div>

			<div class="col-sm-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<div class="col-title">
								<div>
									<h4><strong>Pedido</strong></h4>
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
												<th scope="col" style="width: 10%;text-align: end;">
													<strong>Pedido</strong>
												</th>
												<th scope="col" style="width: 15%;text-align: center;"><strong>Dt.
														Pediddo</strong></th>												
												<th scope="col" style="width: 12%;text-align: end;"><strong>Cód.
														Cli.</strong></th>
												<th scope="col" width="28%"><strong>Cliente</strong></th>

												<th scope="col" style="width: 12%;text-align: end;">
													<strong>Total</strong>
												</th>
												<th scope="col" style="width: 10%;text-align: end;">
													<strong>Status</strong>
												</th>												
												<th scope="col" style="width: 13%;text-align: center;"><span
														class="fas fa-solid fa-plus fa-lg text-info"
														data-bs-toggle="modal" data-bs-target="#Modalcadastro"
														align="center"></span></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($tarefasped as $indice => $tarefaped) { ?>
												<tr id="<?= $tarefaped->NumeroPedido ?>">
													<td style="width: 10%;text-align: end;">
														<?= $tarefaped->NumeroPedido ?>
													</td>
													<td style="width: 15%;text-align: center;">
														<?= $tarefaped->Dt_Pedido ?>
													</td>													
													<td style="width: 12%;text-align: end;">
														<?= $tarefaped->Id_Cliente ?>
													</td>
													<td>
														<?= $tarefaped->NomeCliente ?>
													</td>
													<td style="width: 12%;text-align: end;">
														<?= $tarefaped->Total ?>
													</td>
													<td style="width: 10%;text-align: end;">
														<?= $tarefaped->Status ?>
													</td>													
													<td style="width: 13%;text-align: center;">
														<i class="fas fa-solid fa-plus fa-lg text"
															onclick="cadItem(<?= $tarefaped->NumeroPedido ?>)"></i>
														<i class="fas fa-edit fa-lg text-info"
															onclick="editar(<?= $tarefaped->NumeroPedido ?>)"></i>
														<i class="fas fa-trash-alt fa-lg text-danger"
															onclick="remover(<?= $tarefaped->NumeroPedido ?>)"></i>
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
	</div>

	<!-- Modal Cadastro-->
	<div class="modal fade" id="modalcadastro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Pedido</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="post" action="controller.php?acao=inserir_pedido"
						class="row g-3 needs-validation was-validated">
						<label class="form-label">Cód. Cliente</label>
						<select class="form-control" id="cod" name="cod" required>
						    <option selected></option>
							<?php foreach ($tarefascli as $indice => $tarefacli) { ?>	
    							<option value="<?= $tarefacli->id_Cliente ?>"><?= $tarefacli->NomeCliente ?></option>
							<?php } ?>
    					</select>

						<label class="form-label">Data Pedido</label>
						<input type="date" class="form-control" id="dtped" name="dtped" 
							maxlength="100" required>

						<div class="modal-footer">
							<button class="btn btn-primary" type="submit">Salvar</button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Final Modal Cadastro-->

	<!-- Modal Itens Pedido-->
	<div class="modal fade" id="modalitens" data-backdrop="static" data-dismiss="xmodal">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Itens Pedido</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="container text-center">
						<div class="row">
							<hr />
							<table class="table table-hover" style="width:100%">
								<thead>
									<tr>
										<th scope="col"><strong>Pedido</strong></th>
										<th scope="col"><strong>Cód. Prod.</strong></th>
										<th scope="col"><strong>Desc. Prod.</strong></th>
										<th scope="col"><strong>Qtd</strong></th>
										<th scope="col"><strong>Valor Unitário</strong></th>
										<th scope="col"><strong>Total</strong></th>
										<th scope="col" style="width: 13%;text-align: center;"><span
												class="fas fa-solid fa-plus fa-lg text-info" data-bs-toggle="modal"
												data-bs-target="#Modalcaditempedido" align="center"></span></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($tarefasip as $indice => $tarefaiped) { ?>
										<tr id="<?= $tarefaiped->NumeroPedido ?>">
											<td>
												<?= $tarefaiped->NumeroPedido ?>
											</td>
											<td>
												<?= $tarefaiped->Id_Produto ?>
											</td>
											<td>
												<?= $tarefaiped->NomeProduto ?>
											</td>											
											<td>
												<?= $tarefaiped->Qtd ?>
											</td>
											<td>
												<?= $tarefaiped->ValorU ?>
											</td>
											<td>
												<?= $tarefaiped->Total ?>
											</td>
											<td style="width: 13%;text-align: center;">
												<i class="fas fa-edit fa-lg text-info"></i>
												<i class="fas fa-trash-alt fa-lg text-danger"></i>
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
	<!-- Final Itens-->

	<!-- Modal Cadastro Item Pedido-->
	<div class="modal fade" id="modalcaditemPedido">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Itens Pedido</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="post" action="controller.php?acao=inserir_itempedido"
						class="row g-3 needs-validation was-validated">
						<label class="form-label">Numero Pedido</label>
						<input type="text" class="form-control" id="codPed" name="codPed" placeholder="Numero Pedido"
							maxlength="20" required value="<?= $tarefaped->NumeroPedido ?>">						

						<label class="form-label">Cód. Produto</label>
						<select class="form-control" id="codprod" name="codprod" required>
						    <option selected></option>
							<?php foreach ($tarefasprod as $indice => $tarefap) { ?>	
    							<option value="<?= $tarefap->Id_Produto ?>"><?= $tarefap->NomeProduto ?></option>
							<?php } ?>
    					</select>


						<label class="form-label">Quantidade</label>
						<input type="text" class="form-control" id="nome" name="nome" placeholder="Quantidade"
							maxlength="100" required>

						<label class="form-label">Valor Unitário</label>
						<input type="number" class="form-control" id="valor" name="valor" placeholder="0,00" required>

						<div class="modal-footer">
							<button class="btn btn-primary" type="submit">Salvar</button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Final Modal Cadastro Item Pedido-->

	<!-- Modal Alteração-->
	<div class="modal fade" id="modalalteracao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Alteração de Pedido</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="post" action="" class="row g-3 needs-validation was-validated">
						<label class="form-label">Número Pedido</label>
						<input type="text" class="form-control" id="editid" name="editid" placeholder="Número Pedido"
							maxlength="9" required>

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