<?php
	
	$server = "localhost";
	$user = "root";
	$senha = "";
	$banco = "embaixada";
	
	$con = mysqli_connect($server, $user, $senha);
	mysqli_select_db($con, $banco) or
		die("Erro na seleção do banco: " . mysqli_error($con));
		
		
	if ( ! isset ($_GET["c"]))
		die("Rotina chamada de forma errada!");
	
	$codigo = $_GET["c"];
	
	$comExcluir = "DELETE FROM financeiro WHERE codigo = $codigo;";
	
	mysqli_query($con, $comExcluir);
	echo "Registro excluído com sucesso!<br>";


?>
<a href="listagemFinanceiro.php">Retornar</a>