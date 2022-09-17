<html>

	<head>
		<title>Listagem de cadastrado de funcionários.</title>
		<link rel="stylesheet" type="text/css" href="estilos/estiloTabela.css">
	</head>
	
	<body>
	<div class="divTabela">
		<h2>Listagem de Funcionários</h2>
	<?php
	
	$server = "localhost";
	$user = "root";
	$senha = "";
	$banco = "embaixada";
	
	$con = mysqli_connect($server, $user, $senha);
	mysqli_select_db ($con, $banco) or
		die("Erro na seleção do banco: " . mysqli_error($con));
		
	$comSelect = "SELECT codigo, nomeFuncionario,dataNascimento,cpf,rg,sexo,uf,dddTel,telefone,email,endereco,numero,bairro,cep,
	estadoCivil,nomeBanco, tipoConta, agencia, numeroConta FROM funcionarios";
	
	$regs = mysqli_query($con, $comSelect) or
		die("Erro na seleção de registros: " . mysqli_error($con));
		
	$linhas = mysqli_num_rows($regs);
	
	if ($linhas == 0)
		die("Nenhum registro de conta encontrado.");
	
	
	$cont = 0;
	
	echo "<table class='tabela'>";
	echo "	<tr>";
	echo "		<th>Código</th>";
	echo " 		<th>Nome Funcionario</th>";
	echo " 		<th>Data de Nascimento</th>";
	echo " 		<th>CPF</th>";
	echo " 		<th>RG</th>";
	echo " 		<th>Sexo</th>";
	echo " 		<th>UF</th>";
	echo " 		<th>DDD</th>";
	echo " 		<th>Nº Telefone</th>";
	echo " 		<th>Email</th>";
	echo " 		<th>Endereço</th>";
	echo " 		<th>Nº</th>";
	echo " 		<th>Bairro</th>";
	echo " 		<th>CEP</th>";
	echo " 		<th>Estado Civil</th>";
	echo "		<th>Banco</th>";
	echo "		<th>Tipo de Conta</th>";
	echo "		<th>Agencia</th>";
	echo "		<th>Numero da Conta</th>";
	echo "		<th colspan='2'>Ações</th>";
	echo "	</tr>";
	
	while ($cont < $linhas)
	{
		$dados = mysqli_fetch_array($regs);
		$codigo = $dados["codigo"];
		$nomeFuncionario = $dados["nomeFuncionario"];
		$dataNascimento = $dados["dataNascimento"];
		$cpf = $dados["cpf"];
		$rg = $dados["rg"];
		$sexo = $dados["sexo"];
		$uf = $dados["uf"];
		$dddTel = $dados["dddTel"];
		$telefone = $dados["telefone"];
		$email = $dados["email"];
		$endereco = $dados["endereco"];
		$numero = $dados["numero"];
		$bairro = $dados["bairro"];
		$cep = $dados["cep"];
		$estadoCivil = $dados["estadoCivil"];
		$nomeBanco = $dados["nomeBanco"];
		$tipoConta = $dados["tipoConta"];
		$agencia = $dados["agencia"];
		$numeroConta = $dados["numeroConta"];
		
		echo "<tr>";
		echo "<td>$codigo</td>";
		echo "<td>$nomeFuncionario</td>";
		echo "<td>$dataNascimento</td>";
		echo "<td>$cpf</td>";
		echo "<td>$rg</td>";
		echo "<td>$sexo</td>";
		echo "<td>$uf</td>";
		echo "<td>$dddTel</td>";
		echo "<td>$telefone</td>";
		echo "<td>$email</td>";
		echo "<td>$endereco</td>";
		echo "<td>$numero</td>";
		echo "<td>$bairro</td>";
		echo "<td>$cep</td>";
		echo "<td>$estadoCivil</td>";
		echo "<td>$nomeBanco</td>";
		echo "<td>$tipoConta</td>";
		echo "<td>$agencia</td>";
		echo "<td>$numeroConta</td>";
		echo "<td><a href='excluirCadFuncionarios.php?c=$codigo'>Excluir</a></td>";
		echo "<td><a href='alterarFuncionarios.php?c=$codigo'>Alterar</a></td>";
		echo "</tr>";
		
		$cont++;
		
		
	}	
	
	echo "</table>";
	
	?>
	<hr><br>
	<a class="link1" href="cadastroFuncionarios.html">Inclus&atilde;o</a>
	<a class="link2"href="index.html">Home Page</a>
	</div>
	</body>
	
</html>