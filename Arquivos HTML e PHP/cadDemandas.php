<html>
	<head>
		<title>Envio de informações</title>
	
	
	</head>
	<body>
	
	<h1>Envio de informações</h1>
<?php

$nome					= $_POST["nome"];
$rg						= $_POST["rg"];
$cpf					= $_POST["cpf"];
$sexo					= $_POST["sexo"];
$ddd					= $_POST["ddd"];
$telefone				= $_POST["telefone"];
$nascimento				= $_POST["nascimento"];
$nacionalidade			= $_POST["nacionalidade"];
$ufNascimento			= $_POST["ufNascimento"];
$atual					= $_POST["atual"];
$servico				= $_POST["servico"];
$motivoSolicitacao		= $_POST["motivoSolicitacao"];
$dataSolicitacao		= $_POST["dataSolicitacao"];
$obs					= $_POST["obs"];

if (strlen($nome) < 2)
{
echo "O nome deve ter pelo menos 2 caracteres. Informe novamente<br>";
die("Programa Encerrado");
}
if ( $rg == "")
		die("RG deve ser informado");
if ( $cpf == "")
		die("CPF deve ser informado");
if ($ddd =="")
		die ("o ddd deve ser informado");
if (strlen($telefone)  < 9 )
		die ("o telefone não foi informado ou é invalido");
if ($nascimento =="")
		die ("o nascimento deve ser informado");
if ($servico =="")
		die ("Servico não informado");




	echo "<h2>Dados Recebidos</h2>";
	echo "nome:				     $nome<br>"	;				
    echo "rg:				     $rg<br>"		;	
    echo "cpf:				     $cpf<br>"	;	
	echo "sexo:				     $sexo<br>"	;		
    echo "ddd:				     $ddd<br>"	;	
    echo "telefone:			     $telefone<br>";		
	
    echo "nascimento:		     $nascimento<br>"	;	
    echo "nacionalidade:	     $nacionalidade<br>"	;
    echo "ufnascimento:		     $ufNascimento<br>";	
    echo "atual:			     $atual<br>"	;
    echo "servico:			     $servico<br>";
    echo "motivosolicitacao:     $motivoSolicitacao<br>";
    echo "datasolicitacao:	     $dataSolicitacao<br>";
    echo "obs:		             $obs<br>";
	
	$url = "localhost";
	$user="root";
	$password="";
	$database="embaixada";
	
	echo "1 - Conectando no MYSQL...<br>";
	$con = mysqli_connect( $url , $user , $password ) ;
	echo "MySQL conectado<br>";
	
	
	echo "2 - Selecionando o banco de dados <b>embaixada</b> <br>";
	mysqli_select_db($con , $database) or 
		die("Erro na seleção do banco : " . mysqli_error($con));
	echo "Banco <b>Embaixada</b> aberto.<br>";
	$comandoSQL = "INSERT INTO demandas 
	
    (nome, rg, cpf, sexo, ddd, telefone, nascimento, nacionalidade, ufNascimento, atual, servico, motivoSolicitacao, DataSolicitacao, obs )
	
	VALUES
	
	('$nome', '$rg', '$cpf', '$sexo', '$ddd', '$telefone','$nascimento','$nacionalidade',
	  '$ufNascimento','$atual','$servico', '$motivoSolicitacao', '$dataSolicitacao', '$obs');" ;
	  
	  	echo "3 - Gravando os dados no banco...<br>";
	mysqli_query($con , $comandoSQL) or 
		die("Erro na inserção do registro de novo 
			Usuário" . mysqli_error($con));
			
	echo "Usuário <b>$nome</b> inserido com sucesso!";
	?>
	<a href="listagemDemandas.php">Continuar</a>
	
	
	
	</body>
</html>