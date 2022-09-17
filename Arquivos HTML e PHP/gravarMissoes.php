<html>
<head>
	<title>Gravação de Dados - Missões</title>
</head>
<body>
	<?php
		ini_set('default_charset', 'ansi');

	$codigo 							=$_POST["codigo"];
	$registroMissao						=$_POST["registroMissao"];
	$dataInicio							=$_POST["dataInicio"];
	$dataFim							=$_POST["dataFim"];
	$paisDestino						=$_POST["paisDestino"];
	$tipoMissao							=$_POST["tipoMissao"];
	$codigoDiplomata					=(int)$_POST["codigoDiplomata"];
	$nomeDiplomata						=$_POST["nomeDiplomata"];
	$riscos								=$_POST["riscos"];
	$tipoViagem							=$_POST["tipoViagem"];
	$orcamentoInicial					=(float)$_POST["orcamentoInicial"];
	$orcamentoFinal						=(float)$_POST["orcamentoFinal"];
	$status								=$_POST["status"];
	$pendencia							=$_POST["pendencia"];
	$sigilo								=$_POST["sigilo"];
	$descricao							=$_POST["descricao"];
	$obs								=$_POST["obs"];

	$conexao=mysqli_connect("localhost",
							"root",
							"") or
		die("Erro na conexão com o MYSQL.") ;

	mysqli_select_db($conexao , "embaixada") or
		die("Falha na sele&ccedil;&atilde;o do banco de dados:" .
			mysqli_error($conexao) );


		$sql = "UPDATE missoes SET registroMissao='$registroMissao', dataInicio='$dataInicio', dataFim='$dataFim', paisDestino='$paisDestino', codigoDiplomata='$codigoDiplomata', nomeDiplomata='$nomeDiplomata', riscos='$riscos', tipoViagem='$tipoViagem', orcamentoInicial='$orcamentoInicial', orcamentoFinal='$orcamentoFinal', status='$status', pendencia='$pendencia', sigilo='$sigilo', descricao='$descricao', obs='$obs' WHERE codigo='$codigo'; ";

		mysqli_query($conexao, $sql) or
			die("Erro na atualiza&ccedil;&atilde;o dos dados da Miss&atilde;o $registroMissao: " . mysqli_error($conexao));

		echo "Altera&ccedil;&atilde;o realizada com sucesso!";


	?>
	Clique <a href="listaMissoes.php">aqui</a> para retornar.
</body>
</html>