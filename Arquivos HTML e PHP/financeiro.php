<?php


$ativo              = 0;
 if (isset($_POST["ativo"]))
	   $ativo = $_POST["ativo"];
$tipoPessoa             =$_POST["tipoPessoa"];
$nomeColaborador	=$_POST["nomeColaborador"];
$departamento		=$_POST["departamento"];
$cpf				=(INT)$_POST["cpf"];
$nomeBanco			=$_POST["nomeBanco"];
$tipoConta			=$_POST["tipoConta"];
$numConta			=(INT)$_POST["numConta"];
$referente			=$_POST["referente"];
$tipoPag			=$_POST["tipoPag"];
$valor				=(FLOAT)$_POST["valor"];
$dataPagamento      =$_POST["dataPagamento"];
$obs				=$_POST["obs"];

if (strlen ($cpf <11))
		die("CPF deve ter 11 caracteres sem espaco");
if ($departamento =="")
		die("Ecolha um Departamento. Sistema Parado");
if ($referente =="")
		die("Escolha um mês de referência.");
	

echo "<h2>Pagamento Feito Com Sucesso</h2>";
echo "<b>Status do Colaborador:</b> $ativo<br>";
echo "<b>Tipo de Pessoa :</b> $tipoPessoa<br>";
echo "<b>Nome do Colaborador:</b> $nomeColaborador<br>";
echo "<b>Departamento:</b> $departamento<br>";
echo "<b>CPF:</b> $cpf<br>";
echo "<b>Banco:</b> $nomeBanco<br>";
echo "<b>Tipo de Conta:</b> $tipoConta <br>";
echo "<b>Numero da Conta:</b> $numConta<br>";
echo "<b>Mes referente:</b> $referente<br>";
echo "<b>Tipo de Pagamento:</b> $tipoPag<br>";
echo "<b>Valor Pago:</b>$valor<br>";
echo "<b>Data de Pagamento:</b>$dataPagamento<br>";
echo "<b>Observacao:</b> $obs<br>";

	
	
	$server = "localhost";
	$user = "root";
	$senha= "";
	$banco = "embaixada";
	
	echo "Conectando no banco de dados.<br>";
	$con = mysqli_connect($server, $user, $senha);
	echo "Conectado.<br>";
	
	echo "Selecionando banco de dados...<br>";
	mysqli_select_db($con, $banco) or
		die("Erro na seleção do banco: " . mysqli_error($con));
	echo "Banco selecionado.<br>";
	
	$comandoSQL = "INSERT INTO financeiro
(ativo, nomeColaborador, tipoPessoa, departamento, cpf, nomeBanco, tipoConta, numConta, referente,
tipoPag, valor, dataPagamento, obs )
VALUES
('$ativo', '$nomeColaborador', '$tipoPessoa', '$departamento', '$cpf', '$nomeBanco', '$tipoConta', '$numConta', '$referente', 
'$tipoPag', '$valor', '$dataPagamento', '$obs');" ;

	mysqli_query($con, $comandoSQL) or
		die("Erro na inserção do registro: " . mysqli_error($con));
		
	echo "Registro inserido com sucesso!";	

?>