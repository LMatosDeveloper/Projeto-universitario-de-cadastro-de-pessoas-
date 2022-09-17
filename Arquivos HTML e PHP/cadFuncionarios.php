<?php
	$nomeFuncionario			= $_POST["nomeFuncionario"];
	$dataNascimento				= $_POST["dataNascimento"];
	$cpf						= $_POST["cpf"];
	$rg							= $_POST["rg"];
	$sexo						= $_POST["sexo"];
	$nacionalidade				= $_POST["nacionalidade"];
	$uf							= $_POST["uf"];
	$estadoCivil				= $_POST["estadoCivil"];
	$dddTel 					= $_POST["dddTel"];
	$telefone 					= $_POST["telefone"];
	$email 						= $_POST["email"];
	$nomePai 					= $_POST["nomePai"];
	$nomeMae 					= $_POST["nomeMae"];
	$endereco 					= $_POST["endereco"];
	$numero 					= $_POST["numero"];
	$bairro 					= $_POST["bairro"];
	$cep 						= $_POST["cep"];
	$admissao 					= $_POST["admissao"];
	$cargoEmpresa 				= $_POST["cargoEmpresa"];
	$cargaHoraria 				= $_POST["cargaHoraria"];
	$diplomata 					= $_POST["diplomata"];
	$estrangeiro 				= $_POST["estrangeiro"];
	$idPais 					= $_POST["idPais"];
	$nomeBanco 					= $_POST["nomeBanco"];
	$tipoConta 					= $_POST["tipoConta"];
	$agencia 					= $_POST["agencia"];
	$numeroConta 				= $_POST["numeroConta"];
	
	
	
	if ( strlen($nomeFuncionario) <2 )
		die("Informe nome com no mínimo 2 caracteres.");
	
	if ( $dataNascimento == 0)
		die("Data de nascimento deve ser informada");
	if ($sexo =="")
		die("Sexo deve ser informado.");
	if (strlen($nacionalidade) <2)
		die("Nacionalidade deve ser informado.");

	if ($cpf =="")
		die("CPF deve ser informado.");
	if ($rg =="")
		die("RG deve ser informado.");
	

	if (  ($diplomata <> "S") and ($diplomata <> "N")  )
		die("Diplomata informado incorretamente.");
	if (  ($estrangeiro <> "S") and ($estrangeiro <> "N")  )
		die("Estrangeiro informado incorretamente.");
	
	
	echo "<h2>Dados Recebidos</h2>";
	echo "Nome completo: <b>$nomeFuncionario</b> <br>";
	echo "Data de Nascimento: $dataNascimento<br>";
	echo "CPF: $cpf<br>";
	echo "RG: $rg<br>";
	echo "Sexo: $sexo <br>";
	echo "Nacionalidade: $nacionalidade <br>";
	echo "UF:  $uf<br>";
	echo "Estado Civil:  $estadoCivil<br>";
	echo "DDD: $dddTel<br>";
	echo "Telefone: $telefone<br>";
	echo "Email: $email<br>";
	echo "Nome do Pai: $nomePai<br>";
    echo "Nome do Pai: $nomePai<br>";
	echo "Nome da Mãe: $nomeMae<br>";	
	echo "Endereço: $endereco<br>";
	echo "Nº: $numero<br>";
	echo "Bairro: $bairro<br>";
	echo "CEP: $cep<br>";
	echo "<hr>";
	//echo "Foto: $foto<br>";
	echo "Data de Admissão: $admissao<br>";
	echo "Cargo na Empresa: $cargoEmpresa<br>";
	echo "Carga Horária: $cargaHoraria<br>";
	echo "Diplomata? $diplomata<br>";
	echo "Estrangeiro? $estrangeiro<br>";
	echo " ID do País: $idPais<br>";
	echo "<hr>";
	echo "Nome do banco:$nomeBanco<br>";
	echo "C/C ou C/P? $tipoConta<br>";
	echo "Agencia: $agencia<br>";
	echo "Número da conta: $numeroConta<br>";
		
	
	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "embaixada";
	
	
	echo "Conectando no MySQL...<br>";
	$con = mysqli_connect($server,$user,$password);
	echo "MySQL conectado<br>";
	
	echo "Selecionando o banco de dados <b>cadFun</b><br>";
	mysqli_select_db($con,$database) or
	die("Erro na seleçâo do banco: ". mysqli_error($con));
	echo "Banco selecionado.<br>";

	$comandoSQL = "INSERT INTO funcionarios
	(nomeFuncionario,dataNascimento,cpf,rg,sexo,nacionalidade,uf,estadoCivil,
	dddTel,telefone,email,nomePai,nomeMae,endereco,numero,bairro,cep,admissao,
	cargoEmpresa,cargaHoraria,diplomata,estrangeiro,idPais,nomeBanco,tipoConta,
	agencia,numeroConta) VALUES
	('$nomeFuncionario','$dataNascimento','$cpf','$rg','$sexo','$nacionalidade','$uf','$estadoCivil',
	'$dddTel','$telefone','$email','$nomePai','$nomeMae','$endereco','$numero','$bairro','$cep','$admissao',
	'$cargoEmpresa','$cargaHoraria','$diplomata','$estrangeiro','$idPais','$nomeBanco','$tipoConta',
	'$agencia','$numeroConta');";
	
	mysqli_query($con, $comandoSQL) or
		die("Erro na inserção dos registros:" . mysqli_error($con));
		
	echo "Cadastro de <b>$nomeFuncionario</b> inserida com sucesso!";
	
?>