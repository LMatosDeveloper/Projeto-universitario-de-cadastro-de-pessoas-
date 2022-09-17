<?php
$server = "localhost";
$user = "root";
$password = ""; 
$banco = "embaixada";
$con = mysqli_connect ($server, $user, $password); 
mysqli_select_db($con, $banco) or
	die ("Erro ao selecionar o banco <b>embaixada</b>: " .mysqli_error($con));
	
	if ( ! isset($_GET["c"]) )
		die("Rotina chamada de forma errada!");
	
	$codigo = $_GET["c"];
	$comandoSQL = "DELETE FROM fornecedores WHERE codigo=$codigo";
	
	mysqli_query($con, $comandoSQL);
	echo("Registro eliminado com sucesso!");
?>

<br><a href="listagemFornecedores.php">Continuar</a>