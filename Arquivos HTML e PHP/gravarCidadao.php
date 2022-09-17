<html>

	<head>
		<title>Gravação de dados</title>
	</head>

	<body>
<?php
	ini_set('default_charset', 'ansi');

	//1 - receber os dados do formulário de alteração
	
	$codigo						=$_POST["codigo"];
	$nomeCidadao				=$_POST["nomeCidadao"];
	$dataNascimento				=$_POST["dataNascimento"];
	$sexo						=$_POST["sexo"];
	$cpf						=$_POST["cpf"];
	$rg							=$_POST["rg"];	
	$telefone					=$_POST["telefone"];
	$email						=$_POST["email"];
	$emailSecundario			=$_POST["emailSecundario"];
	$rua						=$_POST["rua"];
	$bairro						=$_POST["bairro"];
	$numero						=$_POST["numero"];
	$cidade						=$_POST["cidade"];
	$uf							=$_POST["uf"];
	$complemento				=$_POST["complemento"];
	$visto						=$_POST["visto"];
	$numPassaporte				=$_POST["numPassaporte"];
	$dataEmissao				=$_POST["dataEmissao"];
	$validadePassaporte			=$_POST["validadePassaporte"];
	$observacao					=$_POST["observacao"];
	

	$conexao = mysqli_connect("localhost",
					"root",
					"") or
		die("Erro na conexão com o MYSQL.") ;

	mysqli_select_db($conexao , "embaixada") or
		die("Falha na seleção do banco de dados:" .
			mysqli_error($conexao) );
		

		$sql = "UPDATE cidadao SET nomeCidadao='$nomeCidadao',dataNascimento='$dataNascimento', sexo='$sexo', cpf='$cpf', rg='$rg', email='$email', emailSecundario='$emailSecundario', rua='$rua', bairro='$bairro', numero='$numero', cidade='$cidade',
		uf='$uf', complemento='$complemento', visto='$visto', numPassaporte='$numPassaporte', dataEmissao='$dataEmissao', validadePassaporte='$validadePassaporte', observacao='$observacao' WHERE codigo='$codigo';"; 
		
		//die($sql);

		mysqli_query($conexao, $sql) or
			die("Erro na atualização de dados do cidadao $nomeCidadao: " . mysqli_error($conexao));

		echo "Altera&ccedil;&atilde;o realizada com sucesso!";

?>
Clique <a href="listaCidadao.php">aqui</a>para continuar.

	</body>
</html>