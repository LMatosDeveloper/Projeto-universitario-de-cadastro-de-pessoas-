<html>

	<head>
		
		<title>Listagem - Sistema de Miss&otilde;es</title>
		<link rel="stylesheet" type="text/css" href="estilos/estiloTabela.css">
	</head>
	
	<body>
		
	<div class='divTabela'>
		<h2>Listagem de Cidadãos</h2>


<?php
	ini_set('default_charset', 'ansi');
	//fiz a mesma coisa q o professor, apenas adiconando os meus cambos.
	$server = "localhost";
	$user 	= "root";
	$senha 	= "";
	$banco 	= "embaixada";
	
	$con = mysqli_connect($server, $user, $senha);
	mysqli_select_db($con, $banco) or 
		die("Erro na seleção do banco: ". mysqli_error($con));
	
	//adcionada o campo obs
	$comandoSQL ="SELECT codigo, nomeCidadao, dataNascimento, cpf, rg, telefone, email, emailSecundario, rua, bairro, numero, cidade, uf,
complemento, numPassaporte, dataEmissao, validadePassaporte, observacao FROM cidadao";
		
	$registro = mysqli_query($con, $comandoSQL)
		or die("Erro na seleção de registro" . mysqli_error($con));
	
	$linhas = mysqli_num_rows ($registro);;
	
	if($linhas == 0)
		die("A tabela esta vazia");
	
	//echo"Foram encontrados <b>$linhas</b> cliente<br>";
	
	// confiirma se é necessario criar realmente todos esses campos para listagem.
	
	$contador = 0;
	
	echo"<table class='tabela'>";
	echo"<tr>";
	echo"		<th>C&oacute;digo</th>";	
	echo"		<th>Nome</th>";
	echo"		<th>Data de Nascimento</th>";
	echo"		<th>CPF</th>";
	echo"		<th>RG</th>";
	echo"		<th>Telefone</th>";
	echo"		<th>E-mail</th>";
	echo"		<th>Rua</th>";
	echo"		<th>Bairro</th>";
	echo"		<th>N&uacute;mero</th>";
	echo"		<th>Cidade</th>";
	echo"		<th>UF</th>";
	echo"		<th>Complemento</th>";
	echo"		<th>Numera&ccedil;&atilde;o</th>";
	echo"		<th>Data de Emissao</th>";
	echo"		<th>Validade</th>";
	echo"		<th>Observa&ccedil;&otilde;es/th>";
	echo "		<th colspan ='2'>A&ccedil;&otilde;es</th>";
	echo"</tr>";
	
	while ($contador < $linhas)
	{
	$dados = mysqli_fetch_array($registro);
	$codigo = $dados["codigo"];
	
	echo"<tr>";
	echo"<td>" . $dados["codigo"] . "</th>";
	echo"<td>" . $dados["nomeCidadao"] . "</td>"; 
	echo"<td>" . $dados["dataNascimento"] . "</td>";
	echo"<td>" . $dados["cpf"] . "</td>";
	echo"<td>" . $dados["rg"] . "</td>";
	echo"<td>" . $dados["telefone"] . "</td>";
	echo"<td>" . $dados["email"] . "</td>";
	echo"<td>" . $dados["rua"] . "</td>";
	echo"<td>" . $dados["bairro"] . "</td>";
	echo"<td>" . $dados["numero"] . "</td>";
	echo"<td>" . $dados["cidade"] . "</td>";
	echo"<td>" . $dados["uf"] . "</td>";
	echo"<td>" . $dados["complemento"] . "</td>";
	echo"<td>" . $dados["numPassaporte"] . "</td>";
	echo"<td>" . $dados["dataEmissao"] . "</td>";
	echo"<td>" . $dados["validadePassaporte"] . "</td>";
	echo"<td>" . $dados["observacao"] . "</td>";
	echo"<td><a href='excluirCidadao.php?c=$codigo'>Excluir</a></td>";
	echo"<td><a href='alterarCidadao.php?c=$codigo'>Alterar</a></td>";
	echo"</tr>";
	
	$contador ++;
	}	
	
	echo"</table>";
	//echo"Listagem Finalizada";
		
		
		
		
?>		
<hr><br>
	<a class="link1" href="cadCidadao.html">Inclus&atilde;o</a>
	<a class="link2"href="index.html">Home Page</a>
	</div>
	</body>
	
</html>