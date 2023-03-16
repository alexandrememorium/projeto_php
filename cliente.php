<?php

$acao = 'recuperar_cliente';
require 'cfg/controller.php';

/*
echo '<pre>';
print_r($tarefas);
echo '</pre>';
*/


function mask($val, $mask)
{
	$maskared = '';
	$k = 0;
	for ($i = 0; $i <= strlen($mask) - 1; $i++) {
		if ($mask[$i] == '#') {
			if (isset($val[$k]))
				$maskared .= $val[$k++];
		} else {
			if (isset($mask[$i]))
				$maskared .= $mask[$i];
		}
	}
	return $maskared;
}

?>

<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Projeto NewTab Academy PHP</title>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico?v=2" />
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

		function editar(id, nome, cpf, email) {

			const editModal = new bootstrap.Modal(document.getElementById("modalalteracao"));
			editModal.show();

			document.getElementById("editid").value = id;
			document.getElementById("editnome").value = nome;
			document.getElementById("editcpf").value = cpf;
			document.getElementById("editemail").value = email;

		}


		function remover(id_cliente) {
			if (confirm('Deseja Excluir Registro !!!')) {
				location.href = 'cliente.php?acao=remover_cliente&id_cliente=' + id_cliente;
			}
		}


		function valida() {
    	        if (!valida_cpf(document.getElementById('cpf').value)){
					document.getElementById('cpf').value=null;
					document.getElementById('cpf').focus();
					document.getElementById('cpfv').removeAttribute('hidden');
				} else {
					document.getElementById('cpfv').setAttribute('hidden', true);
				}
    	    }

			function validaEdit() {
    	        if (!valida_cpf(document.getElementById('editcpf').value)){
					document.getElementById('editcpf').value=null;
					document.getElementById('editcpf').focus();
					document.getElementById('editcpfv').removeAttribute('hidden');
				} else {
					document.getElementById('editcpfv').setAttribute('hidden', true);
				}
    	    }			


		function valida_cpf(cpf) {
    	        var numeros, digitos, soma, i, resultado, digitos_iguais;
    	        digitos_iguais = 1;
    	        if (cpf.length < 11)
    	            return false;
    	        for (i = 0; i < cpf.length - 1; i++)
    	            if (cpf.charAt(i) != cpf.charAt(i + 1)) {
    	                digitos_iguais = 0;
    	                break;
    	            }
    	        if (!digitos_iguais) {
    	            numeros = cpf.substring(0, 9);
    	            digitos = cpf.substring(9);
    	            soma = 0;
    	            for (i = 10; i > 1; i--)
    	                soma += numeros.charAt(10 - i) * i;
    	            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    	            if (resultado != digitos.charAt(0))
    	                return false;
    	            numeros = cpf.substring(0, 10);
    	            soma = 0;
    	            for (i = 11; i > 1; i--)
    	                soma += numeros.charAt(11 - i) * i;
    	            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    	            if (resultado != digitos.charAt(1))
    	                return false;
    	            return true;
    	        }
    	        else
    	            return false;
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
					<li class="list-group-item active"><a href="cliente.php">Cliente</a></li>
					<li class="list-group-item"><a href="produto.php">Produto</a></li>
					<li class="list-group-item"><a href="pedido.php">Pedido</a></li>
				</ul>
			</div>

			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<div class="col-title">
								<div>
									<h4><strong>Cliente</strong></h4>
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
												<th scope="col" style="width: 30%;text-align: left;"><strong>Nome</strong></th>
												<th scope="col" style="width: 20%;text-align: left;"><strong>CPF</strong></th>
												<th scope="col" style="width: 35%;text-align: left;"><strong>Email</strong></th>
												<th scope="col" style="width: 15%;text-align: center;"><span class="fas fa-solid fa-plus fa-lg text-info"
														data-bs-toggle="modal" data-bs-target="#Modalcadastro"
														align="center"></span></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($tarefascli as $indice => $tarefa) { ?>
												<tr id="<?= $tarefa->id_Cliente ?>">
													<td style="width: 30%;text-align: left;">
														<?= $tarefa->NomeCliente ?>
													</td>
													<td style="width: 20%;text-align: left;">
														<?= mask($tarefa->Cpf, '###.###.###-##') ?>
													</td>
													<td style="width: 35%;text-align: left;">
														<?= $tarefa->email ?>
													</td>
													<td style="width: 15%;text-align: center;">
														<i class="fas fa-edit fa-lg text-info"
															onclick="editar(<?= $tarefa->id_Cliente ?>, '<?= $tarefa->NomeCliente ?>', '<?= $tarefa->Cpf ?>', '<?= $tarefa->email ?>')"></i>

														<i class="fas fa-trash-alt fa-lg text-danger"
															onclick="remover(<?= $tarefa->id_Cliente ?>)"></i>
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
					<h1 class="modal-title fs-5" id="exampleModalLabel">Cadastro de Cliente</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="formInc" method="post" action="controller.php?acao=inserir_cliente"
						class="row g-3 needs-validation was-validated">
						<label class="form-label">Nome</label>
						<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome"
							maxlength="100" required>


						<label class="form-label">CPF <strong id="cpfv" hidden style="color: red; padding-left: 40; ">   * * *  CPF Invalido  * * * </strong> </label>  
						<input type="text" class="form-control" id="cpf" name="cpf" onblur="valida()"
							maxlength="11" required>

						<label class="form-label">E-mail</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com"
							maxlength="100" required data-error="Digite o E-mail Correto">
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
					<h1 class="modal-title fs-5" id="exampleModalLabel">Alteração de Cliente</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form method="post" action="controller.php?acao=atualizar_cliente"
						class="row g-3 needs-validation was-validated">
						<label class="form-label" hidden>Id</label>
						<input type="text" class="form-control" id="editid" name="editid" placeholder="Id" hidden>

						<label class="form-label">Nome</label>
						<input type="text" class="form-control" id="editnome" name="editnome" maxlength="100"
							placeholder="Digite seu nome" required>

						<label class="form-label">CPF <strong id="editcpfv" hidden style="color: red; padding-left: 40; ">   * * *  CPF Invalido  * * * </strong> </label>
						<input type="number" class="form-control" id="editcpf" name="editcpf" onblur="validaEdit()"
							maxlength="11" required>

						<label class="form-label">Email</label>
						<input type="email" class="form-control" id="editemail" name="editemail" maxlength="100"
							placeholder="nome@exemplo.com" required>


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
