<?php

$acao = 'recuperar_itempedido';
require 'cfg/controllerped.php';


echo '<pre>';
print_r($tarefasip);
echo '</pre>';


?>
<html>

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


				<div class="modal-body">
					<div class="container text-center">
						<div class="row">
							<hr />
							<table class="table table-hover" style="width:100%">
								<thead>
									<tr>
										<th scope="col"><strong>Pedido</strong></th>
										<th scope="col"><strong>Cód. Prod.</strong></th>
										<th scope="col"><strong>Qtd</strong></th>
										<th scope="col"><strong>Valor Unitário</strong></th>
										<th scope="col"><strong>Total</strong></th>
										<th scope="col" style="width: 13%;text-align: center;"><span
												class="fas fa-solid fa-plus fa-lg text-info" data-bs-toggle="modal"
												data-bs-target="#Modalcadastro" align="center"></span></th>
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
												<?= $tarefaiped->Qtd ?>
											</td>
											<td>
												<?= $tarefaiped->ValorU ?>
											</td>
											<td>
												<?= $tarefaiped->Total ?>
											</td>
											<td style="width: 13%;text-align: center;">
												<i class="fas fa-solid fa-plus fa-lg text"></i>
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



</body>

</html>