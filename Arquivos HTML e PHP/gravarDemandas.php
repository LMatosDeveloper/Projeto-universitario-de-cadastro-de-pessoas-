<html>
	<head>
		<title>Gravação de dados</title>
		
	</head>
	<body>
	<h1>Grava&ccedil;&atilde;o de dados</h1>
	<?php
	$codigo					= $_POST["codigo"];
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
	
	$conexao=mysqli_connect("localhost",
					"root",
					"") or
		die("Erro na conexão com o MYSQL.". mysqli_error($conexao)) ;

	mysqli_select_db($conexao , "embaixada") or
		die("Falha na seleção do banco de dados:" .
			mysqli_error($conexao) );
	

	
	$sql="UPDATE demandas SET 
				nome='$nome',				
				rg='$rg',					
				cpf='$cpf',				
				sexo='$sexo',				
				ddd='$ddd',				
				telefone='$telefone',			
				nascimento='$nascimento',			
				nacionalidade='$nacionalidade',		
				ufnascimento='$ufNascimento',		
				atual='$atual',				
				servico='$servico',			
				motivosolicitacao='$motivoSolicitacao',	
				datasolicitacao='$dataSolicitacao',	
				obs='$obs' WHERE codigo='$codigo';";

			mysqli_query ( $conexao , $sql) or 
	   die("Erro na atualização de dados do Usu&aacute;rio
	   $nome: " . mysqli_error($conexao));
	   
	  echo "Usu&aacute;rio <b>$nome</b> atualizado com sucesso!";
	  echo "<hr>";
	  
	 
?>
Clique <a href="listagemDemandas.php">aqui</a> para 
continuar

	</body>
</html>