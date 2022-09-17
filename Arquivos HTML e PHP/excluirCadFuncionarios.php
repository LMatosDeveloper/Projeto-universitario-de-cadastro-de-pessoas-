<?php
	
	$server = "localhost";
	$user = "root";
	$senha = "";
	$banco = "embaixada";
	
	$con = mysqli_connect($server, $user, $senha);
	mysqli_select_db($con, $banco) or
		die("Não foi possível se conectar ao banco: " . mysqli_error($con));
		
		
	if ( ! isset ($_GET["c"]))
		die("Erro no comando!");
	
	$codigo = $_GET["c"];
	
	$comExcluir = "DELETE FROM funcionarios WHERE codigo = $codigo;";
	
	mysqli_query($con, $comExcluir);
	echo "Registro excluído com sucesso!<br>";


?>
<a href="listaFuncionarios.php">Retornar</a>