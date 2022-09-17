<html>
<head>
	<title>Gravação de Dados - Funcionarios</title>
</head>
<body>
	<?php

	$codigo 						=$_POST["codigo"];
	$nomeFuncionario				=$_POST["nomeFuncionario"];
	$dataNascimento					=$_POST["dataNascimento"];
	$cpf							=$_POST["cpf"];
	$rg								=$_POST["rg"];
	$sexo							=$_POST["sexo"];
	$nacionalidade					=$_POST["nacionalidade"];
	$uf								=$_POST["uf"];
	$estadoCivil					=$_POST["estadoCivil"];
	$dddTel							=$_POST["dddTel"];
	$telefone						=$_POST["telefone"];
	$email							=$_POST["email"];
	$nomePai						=$_POST["nomePai"];
	$nomeMae						=$_POST["nomeMae"];
	$endereco						=$_POST["endereco"];
	$numero							=$_POST["numero"];
	$bairro							=$_POST["bairro"];
	$cep 							=$_POST["cep"];
	$admissao						=$_POST["admissao"];
	$cargoEmpresa					=$_POST["cargoEmpresa"];
	$cargaHoraria					=$_POST["cargaHoraria"];
	$diplomata						=$_POST["diplomata"];
	$estrangeiro					=$_POST["estrangeiro"];
	$idPais							=$_POST["idPais"];
	$nomeBanco						=$_POST["nomeBanco"];
	$tipoConta						=$_POST["tipoConta"];
	$agencia						=$_POST["agencia"];
	$numeroConta					=$_POST["numeroConta"];

	$conexao=mysqli_connect("localhost",
							"root",
							"") or
		die("Erro na conexão com o MYSQL.") ;

	mysqli_select_db($conexao , "embaixada") or
		die("Falha na sele&ccedil;&atilde;o do banco de dados:" .
			mysqli_error($conexao) );


		$sql = "UPDATE funcionarios SET nomeFuncionario='$nomeFuncionario',dataNascimento='$dataNascimento',cpf='$cpf',rg='$rg',sexo='$sexo',nacionalidade='$nacionalidade',uf='$uf',estadoCivil='$estadoCivil',dddTel='$dddTel',telefone='$telefone',email='$email',nomePai='$nomePai',nomeMae='$nomeMae',endereco='$endereco',numero='$numero',bairro='$bairro',cep='$cep',admissao='$admissao',cargoEmpresa='$cargoEmpresa',cargaHoraria='$cargaHoraria',diplomata='$diplomata',estrangeiro='$estrangeiro',idPais='$idPais',nomeBanco='$nomeBanco',tipoConta='$tipoConta',agencia='$agencia',numeroConta='$numeroConta' WHERE codigo='$codigo'; ";

		mysqli_query($conexao, $sql) or
			die("Erro na atualiza&ccedil;&atilde;o dos dados da Miss&atilde;o $registroFuncionarios	: " . mysqli_error($conexao));

		echo "Altera&ccedil;&atilde;o realizada com sucesso!";


	?>
	Clique <a href="listaFuncionarios.php">aqui</a> para retornar.
</body>
</html>