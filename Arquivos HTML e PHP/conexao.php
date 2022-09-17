<?php	// salvar como conexao.php

	$url = "localhost";
	$user = "root";
	$senha = "";
	$banco = "embaixada";

	$conexao=mysqli_connect($url,
					$user,
					$senha) or
		die("Erro na conexуo com o MYSQL.") ;

	mysqli_select_db($conexao , $banco) or
		die("Falha na seleчуo do banco de dados:" . mysqli_error($conexao) );

?>