<html>

	<head>
		<title>Confirmação de cadastro - Missões</title>
		<link rel="stylesheet" type="text/css" href="estilos/estiloConfirmação">
	</head>

	<body>
		<div class="formulario">

<?php
	ini_set('default_charset', 'ansi');
	
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

	
	if ( strlen ($nomeDiplomata) <5)
		die("Nome do diplomata muito curto.");
	if ( ($riscos<>"1" and $riscos<>"0") )
		die("Dados incorretos. Favor informar uma opção válida.");
	if ( ($status == 3 and $pendencia == "") )
		die("Consta pendência. Descrição da pendência obrigatória.");
	if ( $registroMissao == "")
		die("Registro obrigatório.");
	if ( $dataInicio == "")
		die("Data de início obrigatória.");
	if ( $sigilo == "")
		die("Informe o tipo de sigilo da missão.");
	
	
	echo "<div class='formulario'>";
	echo "<h2>Dados recebidos</h2><br>";
	echo "Registro: $registroMissao<br>";		
	echo "Data Inicio: $dataInicio<br>";
	echo "Data fim: $dataFim<br>";
	echo "Pais destino: $paisDestino<br>";
	echo "Tipo Missão: $tipoMissao<br>";			
	echo "Codigo do Diplomat: $codigoDiplomata<br>";	
	echo "Nome do Diplomata: $nomeDiplomata<br>";		
	echo "Riscos: $riscos<br>";				
	echo "Tipo de Viagem: $tipoViagem<br>";			
	echo "Orçamento Inicial: $orcamentoInicial<br>";	
	echo "Orçamento Final: $orcamentoFinal<br>";		
	echo "Status: $status<br>";				
	echo "Pendências: $pendencia<br>";			
	echo "Sigilo: $sigilo<br>";				
	echo "Descrição: $descricao<br>";			
	echo "Observação: $obs<hr>";

	
	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "embaixada";
	
	echo "Conectando no banco de dados.<br>";
	$con = mysqli_connect($server, $user, $password);
	echo "Conectado.<br>";
	
	echo "Selecionando banco de dados...<br>";
	mysqli_select_db($con, $database) or
		die("Erro na seleção do banco: " . mysqli_error($con));
	echo "Banco selecionado.<br>";
	
	$comandoSQL = "INSERT INTO missoes
	(registroMissao, dataInicio, dataFim, paisDestino, tipoMissao, codigoDiplomata, nomeDiplomata, 
	riscos, tipoViagem, orcamentoInicial, orcamentoFinal, status, pendencia, sigilo, descricao, obs )
	VALUES
	('$registroMissao', '$dataInicio', '$dataFim', '$paisDestino', '$tipoMissao', '$codigoDiplomata', 
	'$nomeDiplomata', '$riscos', '$tipoViagem', '$orcamentoInicial', '$orcamentoFinal', '$status', 
	'$pendencia', '$sigilo', '$descricao', '$obs' )";
	
	mysqli_query($con, $comandoSQL) or
		die("Erro na inserção dos registros:" . mysqli_error($con));
		
	echo "Missão <b>$registroMissao</b> inserida com sucesso!";
	echo "</div>"
?>
		<br>
		<a href="listaMissoes.php">Listagem</a>
		</div>
	</body>
</html>