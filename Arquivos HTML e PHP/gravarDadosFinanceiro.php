<html>
	<head>
		<title>Gravação de dados</title>
	</head>
	<body>
	<?php	// salvar como gravarDadosPet.php
	// 1 - copiar os dados do formulário em variáveis
	        $codigo 	           =$_POST["codigo"];
	        $tipoPessoa            =$_POST["tipoPessoa"];
			$nomeColaborador	   =$_POST["nomeColaborador"];
			$departamento		   =$_POST["departamento"];
			$cpf				   =$_POST["cpf"];
			$nomeBanco			   =$_POST["nomeBanco"];
		    $tipoConta			   =$_POST["tipoConta"];
			$numConta			   =$_POST["numConta"];	
			$referente			   =$_POST["referente"];	
            $tipoPag			   =$_POST["tipoPag"];      
			$valor				   =$_POST["valor"];
			$dataPagamento         =$_POST["dataPagamento"];
			$obs				   =$_POST["obs"];
	
	$conexao=mysqli_connect("localhost",
							"root",
							"") or
		die("Erro na conexão com o MYSQL.") ;

	mysqli_select_db($conexao , "embaixada") or
		die("Falha na sele&ccedil;&atilde;o do banco de dados:" .
			mysqli_error($conexao) );

	
	
	// Criando o comando SQL p/gravação dos dados.
	$sql="UPDATE financeiro SET 
	
				tipoPessoa         ='$tipoPessoa'      ,
				nomeColaborador    ='$nomeColaborador' ,
				departamento       ='$departamento'    ,
				cpf                ='$cpf'	           ,
				nomeBanco          ='$nomeBanco'       ,
				tipoConta          ='$tipoConta'       ,
				numConta           ='$numConta'        ,
				referente          ='$referente'       ,
				tipoPag            ='$tipoPag'         ,
				valor              ='$valor'           ,
				dataPagamento      ='$dataPagamento'   ,
				obs                ='$obs'
				WHERE codigo='$codigo'; ";
				
	//die($sql);
	
	mysqli_query ( $conexao , $sql) or 
	   die("Erro na atualização de dados do financeiro
	   $nome: " . mysqli_error($conexao));
	  
	echo "Registro financeiro $codigo atualizado com sucesso!";
	echo "<hr>";	
?>
Clique <a href='listagemFinanceiro.php'>aqui</a> para 
continuar

	</body>
</html>