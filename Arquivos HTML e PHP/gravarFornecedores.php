<html>
	<head>
		<title>Gravação de dados</title>
	</head>
	<body>
	<?php	

	$codigo						= $_POST["codigo"];
	$nomeEmpresa 				= $_POST["nomeEmpresa"]; 
	$nomeRepresentante 			= $_POST["nomeRepresentante"]; 
	$emailEmpresa 				= $_POST["emailEmpresa"];
	$emailRepresentante 		= $_POST["emailRepresentante"];
	$ie 						= $_POST["ie"];
	$cpf 						= $_POST["cpf"];
	$cnpj						= $_POST["cnpj"];
	$telEmpresa 				= (int)$_POST["telEmpresa"];
	$telRepresentante 			= (int)$_POST["telRepresentante"];
	$ddd 						= (int)$_POST["ddd"];
	$endereco 					= $_POST["endereco"];
	$numero						= (int)12$_POST["numero"];
	$complemento 				= $_POST["complemento"];
	$bairro 					= $_POST["bairro"];
	$cidade 					= $_POST["cidade"];
	$uf							= $_POST["uf"];
	
	$produto					= $_POST["produto"] ;
	$codProduto					= (int)$_POST["codProduto"] ;
	$qtd 						= (int)$_POST["qtd"] ;
	$valorUnidade 				= (float)$_POST["valorUnidade"] ;
	$valorTotal 				= (float)$_POST["valorTotal"] ;
	$dataContrato 				= $_POST["dataContrato"]; 
	$ultPedido 					= $_POST["ultPedido"] ;
	$ultCompra 					= $_POST["ultCompra"] ;
	$estoque 					= $_POST["estoque"] ;
	$pesoLiquido				= $_POST["pesoLiquido"]; 
	$pesoBruto 					= $_POST["pesoBruto"] ;
	
	$ativo = 1;
	
	if (isset ($_POST["ativo"]))
			$_POST["ativo"];
	$ativo 						= (int)$_POST["ativo"] ;
	$obs 						= $_POST["obs"];
	
	
			$server = "localhost";
			$user = "root";
			$senha = "";
			$banco = "embaixada";
	
			$con = mysqli_connect($server, $user, $senha);
			mysqli_select_db ($con, $banco) or
				die("Erro na seleção do banco: " . mysqli_error($con));
	
	// Criando o comando SQL p/gravação dos dados.
	$sql="UPDATE fornecedores SET 
				nomeEmpresa='$nomeEmpresa'				,
				nomeRepresentante='$nomeRepresentante'	,
				emailEmpresa='$emailEmpresa'			,
				emailRepresentante='$emailRepresentante',
				ie='$ie'								,
				cpf='$cpf'								,
				cnpj='$cnpj'							,
				telEmpresa='$telEmpresa'				,
				telRepresentante='$telRepresentante'	,
				ddd='$ddd'								,
				endereco='$endereco'					,
				numero='$numero'						,
				complemento='$complemento'				,
				bairro='$bairro'						,
				cidade='$cidade'						,
				uf='$uf'								,	
				produto='$produto'						,
				codProduto='$codProduto'				,
				qtd='$qtd'								,
				valorUnidade='$valorUnidade'			,
				valorTotal='$valorTotal'				,
				dataContrato='$dataContrato'			,	
				ultPedido='$ultPedido'					,
				ultCompra='$ultCompra'					,
				estoque='$estoque'						,
				pesoLiquido='$pesoLiquido'				,
				pesoBruto='$pesoBruto'					,
				ativo='$ativo'							,
				obs='$obs'								
				WHERE codigo= '$codigo'; ";
				
	//die($sql);
	mysqli_query ( $con , $sql) or 
	   die("Erro na atualização de dados do fornecedor
	   $nomeEmpresa: " . mysqli_error($con));
	  
	echo "Fornecedor <b>$nomeEmpresa</b> atualizado com sucesso!";
	echo "<hr>";	
?>
Clique <a href='listagemFornecedores.php'>aqui</a> para 
continuar

	</body>
</html>