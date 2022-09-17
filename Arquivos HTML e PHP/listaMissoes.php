<html>

	<head>
		
		<title>Listagem - Sistema de Miss&otilde;es</title>
		<link rel="stylesheet" type="text/css" href="estilos/estiloTabela.css">
	</head>
	
	<body>
		
	<div class='divTabela'>
		<h2>Listagem de Miss&otilde;es</h2>
	<?php
	ini_set('default_charset', 'ansi');

	$server = "localhost";
	$user = "root";
	$senha = "";
	$banco = "embaixada";
	
	$con = mysqli_connect($server, $user, $senha);
	mysqli_select_db ($con, $banco) or
		die("Erro na seleção do banco: " . mysqli_error($con));
		
	$comSelect = "SELECT codigo, registroMissao, dataInicio, paisDestino, nomeDiplomata, orcamentoInicial, status, sigilo, descricao FROM missoes";
	
	$regs = mysqli_query($con, $comSelect) or
		die("Erro na seleção de registros: " . mysqli_error($con));
		
	$linhas = mysqli_num_rows($regs);
	
	if ($linhas == 0)
		die("Nenhum registro encontrado.");
	
	
	$cont = 0;
	
	
	echo "<table class='tabela'>";
	echo "	<tr>";
	echo "		<th>C&oacute;digo</th>";
	echo "		<th>Registro de Miss&atilde;o</th>";
	echo "		<th>Data de In&iacute;cio</th>";
	echo "		<th>Pa&iacute;s de Destino</th>";
	echo "		<th>Nome do Diplomata</th>";
	echo "		<th>Or&ccedil;amento Inicial</th>";
	echo "		<th>Status da Miss&atilde;o</th>";
	echo "		<th>Sigilo</th>";
	echo "		<th>Descri&ccedil;&atilde;o</th>";
	echo "		<th colspan ='2'>A&ccedil;&atilde;es</th>";
	echo "	</tr>";
	
	while ($cont < $linhas)
	{
		$dados = mysqli_fetch_array($regs);
		$codigo = $dados["codigo"];
		$regMissao = $dados["registroMissao"];
		$dataInicio = $dados["dataInicio"];
		$paisDestino = $dados["paisDestino"];
		$nomeDiplo = $dados["nomeDiplomata"];
		$orcamentoInicial = $dados["orcamentoInicial"];
		$status = $dados["status"];
		$sigilo = $dados["sigilo"];
		$descricao = $dados["descricao"];
		
		echo "<tr>";
		echo "<td>$codigo</td>";
		echo "<td>$regMissao</td>";
		echo "<td>$dataInicio</td>";
		echo "<td>$paisDestino</td>";
		echo "<td>$nomeDiplo</td>";
		echo "<td>$orcamentoInicial</td>";
		echo "<td>$status</td>";
		echo "<td>$sigilo</td>";
		echo "<td>$descricao</td>";
		echo "<td><a href='excluirMissoes.php?c=$codigo'>Excluir</a></td>";
		echo "<td><a href='alterarMissoes.php?c=$codigo'>Alterar</a></td>";
		echo "</tr>";
		
		$cont++;
		
		
	}	
	
	echo "</table>";
	
	?>
	<hr><br>
	<a class="link1" href="cadMissoes.html">Inclus&atilde;o</a>
	<a class="link2"href="index.html">Home Page</a>
	</div>
	</body>
	
</html>