<?php

	$nomeCidadao				=$_POST ["nomeCidadao"];
	$dataNascimento				=$_POST["dataNascimento"];
	$sexo						=$_POST["sexo"];
	$cpf						=$_POST["cpf"];
	$rg							=$_POST["rg"];	
	$telefone					=$_POST["telefone"];
	$email						=$_POST["email"];
	$emailSecundario			=$_POST["emailSecundario"];
	$rua						=$_POST["rua"];
	$bairro						=$_POST["bairro"];
	$numero						=$_POST["numero"];
	$cidade						=$_POST["cidade"];
	$uf							=$_POST["uf"];
	$complemento				=$_POST["complemento"];
	$visto						=$_POST["visto"];
	$numPassaporte				=$_POST["numPassaporte"];
	$dataEmissao				=$_POST["dataEmissao"];
	$validadePassaporte			=$_POST["validadePassaporte"];
	$observacao     			=$_POST["observacao"];
	
		//validação de dados
		if ( strlen ($nomeCidadao) < 5 )
			die("Nome muito curto.");		
				
		if ( ($sexo<>"M" and $sexo<>"F") )
			die("Sexo inválido.");
		
		if ( ($validadePassaporte == "") )
			die("Validade obrigatória!");
		
		if( ($dataEmissao == "") )
			die("Data de emissão obrigatória!");

		
		// Não sei validar os campos necessários como (validade e  Data de Emissão).
		
		
		//dados recebidos 
		echo"<h2>Dados Recebidos</h2>";
		echo"Nome:$nomeCidadao<br>";
		echo"Data de Nascimento:$dataNascimento<br>";
		echo"Sexo: $sexo<br>";
		echo"CPF:$cpf<br>";
		echo"RG:$rg<br>";
		echo"E-mail:$email<br>";
		echo"E-mail Secundário:$emailSecundario<br>";
		echo"Rua:$rua<br>";
		echo"Bairro:$bairro<br>";
		echo"Número:$numero<br>";
		echo"Cidade$cidade<br>";
		echo"UF:$uf<br>";
		echo"Complemento:$complemento<br>";
		echo"Numeração:$numPassaporte<br>";
		echo"Data de Emissão:$dataEmissao<br>";
		echo"Validade:$validadePassaporte<br>";
		echo"Observação:$observacao<br>";
		
		
	$server = "localhost";
	$user = "root";
	$senha= "";
	$banco = "embaixada";
	
	echo "Conectando no banco de dados.<br>";
	$con = mysqli_connect($server, $user, $senha);
	echo "Conectado.<br>";
	
	echo "Selecionando banco de dados...<br>";
	mysqli_select_db($con, $banco) or
		die("Erro na seleção do banco: " . mysqli_error($con));
	echo "Banco selecionado.<br>";
	
	$comandoSQL = "INSERT INTO cidadao
    (nomeCidadao, dataNascimento, sexo, cpf, rg, telefone, email, emailSecundario,
    rua, bairro, numero, cidade, uf, complemento, visto, numPassaporte, dataEmissao, validadePassaporte, observacao)
    VALUES
    ('$nomeCidadao', '$dataNascimento', '$sexo', '$cpf', '$rg', '$telefone', 
    '$email', '$emailSecundario', '$rua', '$bairro', '$numero', '$cidade', '$uf', 
    '$complemento','$visto' , '$numPassaporte',  '$dataEmissao','$validadePassaporte','$observacao')";
	
	mysqli_query($con, $comandoSQL) or
		die("Erro na inserção dos registros:" . mysqli_error($con));
		
	echo "Cidadão inserida com sucesso!<br><br>";
	echo "<a href='listaCidadao.php'>Listagem</a>";
?>