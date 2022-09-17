<?php
	
	
	
	
	
	$nomeEmpresa 				= $_POST["nomeEmpresa"]; 
	$nomeRepresentante 			= $_POST["nomeRepresentante"]; 
	$emailEmpresa 				= $_POST["emailEmpresa"] ;
	$emailRepresentante 		= $_POST["emailRepresentante"];
	$ie 						= $_POST["ie"] ;
	$cpf 						= $_POST["cpf"] ;
	$cnpj						= $_POST["cnpj"] ;
	$telEmpresa 				= (int)$_POST["telEmpresa"] ;
	$telRepresentante 			= (int)$_POST["telRepresentante"];
	$ddd 						= (int)$_POST["ddd"] ;
	$endereco 					= $_POST["endereco"] ;
	$numero						= $_POST["numero"] ;
	$complemento 				= $_POST["complemento"];
	$bairro 					= $_POST["bairro"] ;
	$cidade 					= $_POST["cidade"] ;
	$uf							= $_POST["uf"] ;
	
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
	
	// validando dados 
	
	if ( strlen($nomeEmpresa) <2 )
		die("Informe o nome da empresa.");
	
	if ( strlen($nomeRepresentante) <2 )
		die("Informe o nome do representante.");
	
	if ($ie == 0)
		die("Informe o IE.");

	if ($cpf == 0)
		die("Informe o cpf.");
	
	if ($cnpj == 0)
		die("Informe o cnpj.");
	
	if ( $ultCompra == "")
		die("Data de última compra obrigatória.");
	
	
	echo "<h2>Dados Recebidos</h2>";
	echo "nomeEmpresa: $nomeEmpresa <br>";
	echo "nomeRepresentante: $nomeRepresentante<br>";
	echo "emailEmpresa: $emailEmpresa<br>";
	echo "emailRepresentante: $emailRepresentante <br>";
	echo "ie: $ie <br>";
	echo "cpf:  $cpf<br>";
	echo "cnpj:  $cnpj<br>";
	echo "telEmpresa: $telEmpresa<br>";
	echo "telRepresentante: $telRepresentante<br>";
	echo "ddd: $ddd<br>";
	echo "endereco $endereco<br>";
	echo "numero $numero<br>";
	echo "complemento $complemento<br>";
	echo "bairro $bairro<br>";
	echo "cidade $cidade<br>";
	echo "uf $uf<br>";
	
	echo "produto $produto<br>";
	echo "codProduto $codProduto<br>";
	echo "qtd $qtd<br>";
	echo "valorUnidade $valorUnidade<br>";
	echo "valorTotal $valorTotal<br>";
	echo "dataContrato $dataContrato<br>";
	echo "ultPedido $ultPedido<br>";
	echo "ultCompra $ultCompra<br>";
	echo "estoque $estoque<br>";
	echo "pesoLiquido $pesoLiquido<br>";
	echo "pesoBruto $pesoBruto<br>";
	echo "ativo: $ativo<br>";
	echo "obs: $obs<br>";
	
	$url = "localhost";
	$user = "root";
	$password = "";
	$database = "embaixada";

	
	echo "Conectando no banco de dados.<br>";
	$con = mysqli_connect($url, $user, $password);
	echo "Conectado.<br>";
	
	echo "Selecionando banco de dados...<br>";
	mysqli_select_db($con, $database) or
		die("Erro na seleção do banco: " . mysqli_error($con));
	echo "Banco selecionado.<br>";
	
	$comandoSQL = "INSERT INTO fornecedores
	(nomeEmpresa, nomeRepresentante, emailEmpresa, emailRepresentante,
	ie, cpf, cnpj, telEmpresa, telRepresentante, ddd, endereco, numero, complemento,
	bairro, cidade, uf, produto, codProduto, qtd, valorUnidade, valorTotal, dataContrato, 
	ultPedido, ultCompra, estoque, pesoLiquido, pesoBruto, ativo, obs)
	VALUES
	('$nomeEmpresa', '$nomeRepresentante', '$emailEmpresa', '$emailRepresentante',
	'$ie', '$cpf', '$cnpj', '$telEmpresa', '$telRepresentante', '$ddd', '$endereco',
	'$numero', '$complemento', '$bairro', '$cidade', '$uf', '$produto', '$codProduto',
	'$qtd', '$valorUnidade', '$valorTotal', '$dataContrato', '$ultPedido', '$ultCompra',
	'$estoque', '$pesoLiquido', '$pesoBruto', '$ativo', '$obs')";
	
	$registros = mysqli_query($con, $comandoSQL) or
		die("Erro na inserção dos registros" . mysqli_error($con));
	
	

	/*$dados = mysqli_fetch_array($registros);

	echo "<tr>";
	echo "<td>$codigo</td>";
	echo "<td>$nomeEmpresa</td>" ;
	echo "<td>$nomeRepresentante</td>" ;
	echo "<td>$emailEmpresa</td>" ;
	echo "<td>$emailRepresentante</td>" ;
	echo "<td>$ie</td>" ;
	echo "<td>$cpf</td>" ;
	echo "<td>$cnpj</td>" ;
	echo "<td>$telEmpresa</td>" ;
	echo "<td>$telRepresentante</td>" ;
	echo "<td>$ddd</td>" ;
	echo "<td>$endereco</td>" ;
	echo "<td>$numero</td>" ;
	echo "<td>$complemento</td>" ;
	echo "<td>$bairro</td>" ;
	echo "<td>$cidade</td>" ;
	echo "<td>$uf</td>" ;
	echo "<td>$produto</td>" ;
	echo "<td>$codProduto</td>" ;
	echo "<td>$qtd</td>" ;
	echo "<td>$valorUnidade</td>" ;
	echo "<td>$valorTotal</td>" ;
	echo "<td>$dataContrato</td>" ;
	echo "<td>$ultPedido</td>" ;
	echo "<td>$ultCompra</td>" ;
	echo "<td>$estoque</td>" ;
	echo "<td>$pesoLiquido</td>" ;
	echo "<td>$pesoBruto</td>" ;
	echo "<td>$ativo</td>" ;
	echo "<td>$obs</td>" ;
	echo "<a href='excluirFornecedores.php?c=$codigo'>Excluir dados</a>";
	echo "</tr>";

	
	$contador = $contador + 1;
}
*/
?>