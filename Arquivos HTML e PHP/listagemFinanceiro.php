<html>
	<head>
			<title>Listagem de financeiro</title>
			<link rel="stylesheet" type="text/css" href="estilos/estiloTabela.css">
	</head>
	<body>
	   <div class="divTabela">
	   	<h2>Listagem Financeira</h2>
	<?php
		ini_set('default_charset', 'ansi');
		$server = "localhost";
		$user = "root";
		$senha = "";
		$banco = "embaixada";
		
		$con = mysqli_connect($server, $user, $senha);
		mysqli_select_db ($con, $banco) or 
			die("Erro na seleção do banco: " . mysqli_error($con));
			
		$comSelecao = "SELECT * FROM financeiro ORDER BY codigo";
		
		$registros = mysqli_query($con, $comSelecao) or
			die("Erro na seleção de dados do Financeiro: " . mysqli_error($con));
			
	
		
		$linhas = mysqli_num_rows($registros);
		
		if ($linhas == 0)
			die("Nenhum registro encontrado.");
		//echo "Foram encontrados <b>$linhas</b> registros.<br>";
		
		
		
		$cont = 0;
		
		echo "<table class='tabela'>";
		echo "	<tr>";
		echo "		<th>Código</th>";
		echo "		<th>Ativo</th>";
		echo "		<th>Nome</th>";
		echo "		<th>Tipo de Pessoa</th>";
		echo "		<th>Departamento</th>";
		echo "		<th>CPF</th>";
		echo "		<th>Banco</th>";
		echo "		<th>Tipo da Conta</th>";
		echo "		<th>Nº da Conta</th>";
		echo "		<th>Referente</th>";
		echo "		<th>Tipo de Pagamento</th>";
		echo "		<th>Valor</th>";
		echo "		<th>Data de Pagamento</th>";
		echo "		<th>Obs</th>";
		echo "		<th colspan='2'>Ações</th>";
		echo "	</tr>";
		
		
		while ($cont < $linhas)
		{
		$dados = mysqli_fetch_array($registros);
		//$foto = $dados["foto"];
		$codigo = $dados["codigo"];
		
		echo "<tr>";
		
		echo "<td>$codigo</td>";
		echo "<td>" .$dados["ativo"]. "</td>";
		echo "<td>" .$dados["nomeColaborador"]. "</td>";
		echo "<td>" .$dados["tipoPessoa"]. "</td>";
		echo "<td>" .$dados["departamento"]. "</td>";
		echo "<td>" .$dados["cpf"]. "</td>";
		echo "<td>" .$dados["nomeBanco"]. "</td>";
		echo "<td>" .$dados["tipoConta"]. "</td>";
		echo "<td>" .$dados["numConta"]. "</td>";
		echo "<td>" .$dados["referente"]. "</td>";
		echo "<td>" .$dados["tipoPag"]. "</td>";
		echo "<td>" .$dados["valor"]. "</td>";
		echo "<td>" .$dados["dataPagamento"]. "</td>";
		echo "<td>" .$dados["obs"]. "</td>";
		echo "<td><a href='excluirFinanceiro.php?c=$codigo'>Excluir</a></td>";
		echo "<td><a href='alterarFinanceiro.php?c=$codigo'>Alterar</a></td>";
		echo "</tr>";
		
		
		
		$cont++;
		}	
		echo "</table>";		
		//echo "<br>Listagem finalizada";
		
		

	
	
	?>
	<hr><br>
	<a class="link1" href="cadFinanceiro.html">Inclus&atilde;o</a>
	<a class="link2"href="index.html">Home Page</a>
		</div>
	</body>

</html>