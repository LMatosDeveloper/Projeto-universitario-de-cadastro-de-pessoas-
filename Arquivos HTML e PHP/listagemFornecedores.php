<html>
	<head>
		<title>Listagem de Fornecedores</title>
		<link rel="stylesheet" type="text/css" href="estilos/estiloTabela.css">
	</head>

<div class="divTabela">
<body>
<h2 align="center">Listagem de Fornecedores</h2>
<?php
	ini_set('default_charset', 'ansi');
	$url = "localhost";
	$user = "root";
	$password = "";
	$database = "embaixada";
	
	//echo "Conectando no banco de dados.<br>";
	$con = mysqli_connect($url, $user, $password);
	//echo "Conectado.<br>";
	
	//echo "Selecionando banco de dados...<br>";
	mysqli_select_db($con, $database) or
		die("Erro na seleção do banco: " . mysqli_error($con));
	//echo "Banco selecionado.<br>";
	
	$comandoSQL="SELECT codigo, nomeEmpresa, nomeRepresentante, emailEmpresa, emailRepresentante,
	ie, cpf, cnpj, telEmpresa, telRepresentante, ddd, endereco, numero, complemento,
	bairro, cidade, uf, produto, codProduto, qtd, valorUnidade, valorTotal, dataContrato, 
	ultPedido, ultCompra, estoque, pesoLiquido, pesoBruto, ativo, obs FROM fornecedores";
	
	$registros = mysqli_query($con, $comandoSQL) or
		die("Erro na inserção dos registros" . mysqli_error($con));
	
	$linhas = mysqli_num_rows($registros);

	if ($linhas == 0) 
	die("Tabela vazia");

	//echo "Foram encontrados <b>$linhas</b> fornecedores<br>";
	
	$contador = 0;

	echo "<table class='tabela'>";
	echo " <tr>";
	echo "<th>C&oacute;digo</th>";
	echo "<th>Nome Empresa</th>" ;
	echo "<th>Nome Representante</th>" ;
	echo "<th>Email Empresa</th>" ;
	//echo "<th>Email Representante</th>" ;
	//echo "<th>IE</th>" ;
	//echo "<th>CPF</th>" ;
	echo "<th>CNPJ</th>" ;
	echo "<th>Tel Empresa</th>" ;
	//echo "<th>Tel Representante</th>" ;
	echo "<th>DDD</th>" ;
	echo "<th>Endere&ccedil;o</th>" ;
	echo "<th>N&uacute;mero</th>" ;
	//echo "<th>Complemento</th>" ;
	//echo "<th>Bairro</th>" ;
	echo "<th>Cidade</th>" ;
	echo "<th>UF</th>" ;
	//echo "<th>Produto</th>" ;
	echo "<th>C&oacute;digo Produto</th>" ;
	//echo "<th>Quantidade</th>" ;
	//echo "<th>Valor Unidade</th>" ;
	echo "<th>Valor Total</th>" ;
	//echo "<th>Data Contrato</th>" ;
	//echo "<th>&Uacute;ltimo Pedido</th>" ;
	echo "<th>&Uacute;ltima Compra</th>" ;
	echo "<th>Estoque</th>" ;
	//echo "<th>Peso L&iacute;quido</th>" ;
	//echo "<th>Peso Bruto</th>" ;
	echo "<th>Ativo?</th>" ;
	echo "<th>Observa&ccedil;&otilde;es</th>" ;
	echo "<th colspan='2'>A&ccedil;&otilde;es</th>";
	echo " </tr>";
	
	while ($contador < $linhas)
{
	$dados = mysqli_fetch_array($registros);
	$codigo = $dados["codigo"];
	$nomeEmpresa = $dados["nomeEmpresa"];
	$nomeRepresentante = $dados["nomeRepresentante"];
	$emailEmpresa = $dados["emailEmpresa"];
	$emailRepresentante = $dados["emailRepresentante"];
	$ie = $dados["ie"];
	$cpf = $dados["cpf"];
	$cnpj = $dados["cnpj"];
	$telEmpresa = $dados["telEmpresa"];
	$telRepresentante = $dados["telRepresentante"];
	$ddd = $dados["ddd"];
	$endereco = $dados["endereco"];
	$numero = $dados["numero"];
	$complemento = $dados["complemento"];
	$bairro = $dados["bairro"];
	$cidade = $dados["cidade"];
	$uf = $dados["uf"];
	$produto = $dados["produto"];
	$codProduto = $dados["codProduto"];
	$qtd = $dados["qtd"];
	$valorUnidade = $dados["valorUnidade"];
	$valorTotal = $dados["valorTotal"];
	$dataContrato = $dados["dataContrato"];
	$ultPedido = $dados["ultPedido"];
	$ultCompra = $dados["ultCompra"];
	$estoque = $dados["estoque"];
	$pesoLiquido = $dados["pesoLiquido"];
	$pesoBruto = $dados["pesoBruto"];
	$ativo = $dados["ativo"];
	$obs = $dados["obs"];
	
	echo "<tr>";
	echo "<td>$codigo</td>";
	echo "<td>$nomeEmpresa</td>" ;
	echo "<td>$nomeRepresentante</td>" ;
	echo "<td>$emailEmpresa</td>" ;
	//echo "<td>$emailRepresentante</td>" ;
	//echo "<td>$ie</td>" ;
	//echo "<td>$cpf</td>" ;
	echo "<td>$cnpj</td>" ;
	echo "<td>$telEmpresa</td>" ;
	//echo "<td>$telRepresentante</td>" ;
	echo "<td>$ddd</td>" ;
	echo "<td>$endereco</td>" ;
	echo "<td>$numero</td>" ;
	//echo "<td>$complemento</td>" ;
	//echo "<td>$bairro</td>" ;
	echo "<td>$cidade</td>" ;
	echo "<td>$uf</td>" ;
	//echo "<td>$produto</td>" ;
	echo "<td>$codProduto</td>" ;
	//echo "<td>$qtd</td>" ;
	//echo "<td>$valorUnidade</td>" ;
	echo "<td>$valorTotal</td>" ;
	//echo "<td>$dataContrato</td>" ;
	//echo "<td>$ultPedido</td>" ;
	echo "<td>$ultCompra</td>" ;
	echo "<td>$estoque</td>" ;
	//echo "<td>$pesoLiquido</td>" ;
	//echo "<td>$pesoBruto</td>" ;
	echo "<td>$ativo</td>" ;
	echo "<td>$obs</td>" ;
	echo "<td><a href='excluirFornecedores.php?c=$codigo'>Excluir</a></td>";
	echo "<td><a href='alterarFornecedores.php?c=$codigo'>Alterar</a></td>";
	echo "</tr>";
	
	$contador = $contador + 1;
}
	echo "</table>";
	//echo "<br><b>Listagem finalizada!</b>";
?>
<hr><br>
<a class="link1" href="cadFornecedores.html">Inclus&atilde;o</a>
<a class="link2"href="index.html">Home Page</a>
</div>
</body>
</html>