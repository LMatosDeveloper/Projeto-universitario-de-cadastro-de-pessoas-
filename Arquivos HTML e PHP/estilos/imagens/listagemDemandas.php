<html>
	<head>
		<title>Listagem de Demandas</title>
	</head>
	<body>
<?php

			 $conexao=mysqli_connect("localhost","root","");
			 
			 mysqli_select_db($conexao,"embaixada") or 
					die("Erro na sele��o do banco:" 
						. mysqli_error($conexao) );
						
						
			$comandoSQL = 'SELECT * FROM demandas';
			$linhas = mysqli_query($conexao, $comandoSQL);

			$registros = mysqli_query($conexao , $comandoSQL) 
						or die("Erro na sele��oo de registros de 
						  Usuários:" . mysqli_error($conexao)) ;
						  
			$linhas = mysqli_num_rows($registros) ;
			

			if ($linhas ==0) 
						die ("Tabela de <b>Usu�rios est� vazia!");
				
			echo "Foram encontrados <b>$linhas</b> Usu�rios <br>";


			$contador = 0;
			echo "<table border='1'>";
			echo "	<tr>";
			echo "		<th>C�digo</th>";
			echo "		<th>Nome</th>";
			echo "		<th>RG</th>";
			echo "		<th>CPF</th>";
			echo "		<th>Sexo</th>";
			echo "		<th>DDD</th>";
			echo "		<th>Telefone</th>";
			echo "		<th>Nacionalidade</th>";
			echo "		<th>UF Atual</th>";
			echo "		<th>Servi�o Solicitado</th>";
			echo "		<th>Motivo da Solicita��o</th>";
			echo "		<th>Data da Solicita��o</th>";
			echo "		<th>Obs</th>";
			echo "		<th>A��es</th>";
			echo "	</tr>";
			
					while ($contador < $linhas)
					{
						$dados = mysqli_fetch_array($registros);
						$codigo = 	$dados["codigo"];
						$nome =		$dados["nome"];
						$rg =		$dados["rg"];
						$cpf =		$dados["cpf"];
						$sexo =		$dados["sexo"];
						$ddd =		$dados["ddd"];
						$telefone =	$dados["telefone"];
						$nacionalidade = $dados["nacionalidade"];
						$atual =	$dados["atual"];
						$servico =	$dados["servico"];
						$motivoSolicitacao = $dados["motivoSolicitacao"];
						$dataSolicitacao =	$dados["dataSolicitacao"];
						$obs =	$dados["obs"];
						echo "<tr>";
						
						echo "<td>$codigo</td>" ;
						echo "<td>$nome</td>"  ;
						echo "<td>$rg</td>" ;
						echo "<td>$cpf</td>" ;
						echo "<td>$sexo</td>" ;
						echo "<td>$ddd</td>" ;
						echo "<td>$telefone</td>" ;
						echo "<td>$nacionalidade</td>" ;
						echo "<td>$atual</td>" ;
						echo "<td>$servico</td>" ;
						echo "<td>$motivoSolicitacao</td>" ;
						echo "<td>$dataSolicitacao</td>" ;
						echo "<td>$obs</td>" ;
						echo "<td><a href='exclusaoDemandas.php?c=$codigo'>Excluir Dados</a></td>";
						
						echo "</tr>";
						
						++$contador;
					}
					
					"</table>";
					echo "Listagem Finalizada!";

		?>
		</body>
</html>