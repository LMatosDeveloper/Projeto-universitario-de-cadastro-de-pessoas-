<?php	// salvar como conexao.php

	$url = "localhost";
	$user = "root";
	$senha = "";
	$banco = "embaixada";

	$conexao=mysqli_connect($url,
					$user,
					$senha) or
		die("Erro na conex�o com o MYSQL.") ;

	mysqli_select_db($conexao , $banco) or
		die("Falha na sele��o do banco de dados:" . mysqli_error($conexao) );

?>