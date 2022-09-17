<?php 
	
	$conexao=mysqli_connect("localhost","root","");
	
	mysqli_select_db($conexao,"embaixada") or 
		die("Erro na seleção do banco:" 
			. mysqli_error($conexao) );
	
	if ( ! isset($_GET["c"]))
	  die("Rotina chamada de forma errada!");
	  
	$codigo = $_GET["c"];
	$comandoSQL = "DELETE FROM 
					demandas WHERE codigo=$codigo";
	
	mysqli_query($conexao, $comandoSQL);
	echo "Registro eliminado com sucesso!<br>";
?>
<a href="listagemDemandas.php">Retornar</a>