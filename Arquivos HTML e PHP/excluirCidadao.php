<?php
	
	//criei da forma q o professor passou
	
	$server = "localhost";
	$user =	"root";
	$senha = "";
	$banco = "embaixada";
	
	$con = mysqli_connect($server, $user, $senha);
	mysqli_select_db($con, $banco) or 
		die("Erro na seleção do banco: " . mysqli_error($con));
		
	if ( ! isset ($_GET["c"]))
		die("Rotina chamada de forma errada");
	
	$codigo = $_GET["c"];
	$comandoSQL = "DELETE FROM cidadao WHERE codigo = $codigo;";
	
	mysqli_query($con, $comandoSQL);
	echo "Requisito eliminado com sucesso";
	
?>
   <a href="listaCidadao.php">Continuar</a>