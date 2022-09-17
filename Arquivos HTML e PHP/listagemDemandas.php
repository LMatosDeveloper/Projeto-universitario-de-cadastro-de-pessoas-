  <html>
	<head>
		<title>Listagem de Demandas</title>
	
	<link rel="stylesheet" type="text/css" href="estilos/estiloTabela.css">
	</head>
	<body>
		<div class="divTabela">
		<h2>Listagem de Demandas</h2>
<?php
	ini_set('default_charset', 'ansi');

			 $conexao=mysqli_connect("localhost","root","");
			 
			 mysqli_select_db($conexao,"embaixada") or 
					die("Erro na seleção do banco:" 
						. mysqli_error($conexao) );
						
						
			$comandoSQL = 'SELECT * FROM demandas';
			$linhas = mysqli_query($conexao, $comandoSQL);

			$registros = mysqli_query($conexao , $comandoSQL) 
						or die("Erro na seleçãoo de registros de 
						  Usuários:" . mysqli_error($conexao)) ;
						  
			$linhas = mysqli_num_rows($registros) or
				die("Falha na recuperação dos registros:" . mysqli_error($conexao) );
			

			if ($linhas ==0) 
						die ("Tabela de <b>Usuários está vazia!");
				
			


			$contador = 0;
			echo "<table class='tabela'>";
			echo "	<tr id='tr'>";
			echo "		<th id='rows'>C&#243;digo</th>";
			echo "		<th id='rows'>Nome</th>";
			echo "		<th id='rows'>RG</th>";
			echo "		<th id='rows'>CPF</th>";
			echo "		<th id='rows'>Sexo</th>";
			echo "		<th id='rows'>DDD</th>";
			echo "		<th id='rows'>Telefone</th>";
			echo "		<th id='rows'>Nascimento</th>";
			echo "		<th id='rows'>Nacionalidade</th>";
			echo "		<th id='rows'>UF de nascimento</th>";
			echo "		<th id='rows'>UF Atual</th>";
			echo "		<th id='rows'>Servi&ccedil;o Solicitado</th>";
			echo "		<th id='rows'>Motivo da Solicita&ccedil;&atilde;o</th>";
			echo "		<th id='rows'>Data da Solicita&ccedil;&atilde;o</th>";
			echo "		<th id='rows'>Obs</th>";
			echo "		<th colspan=2>A&ccedil;&otilde;es</th>";
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
						$nascimento = $dados["nascimento"];
						$nacionalidade = $dados["nacionalidade"];
						$ufNascimento = $dados ["ufNascimento"];
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
						echo "<td>$nascimento</td>";
						echo "<td>$nacionalidade</td>" ;
						echo "<td>$ufNascimento</td>";
						echo "<td>$atual</td>" ;
						echo "<td>$servico</td>" ;
						echo "<td>$motivoSolicitacao</td>" ;
						echo "<td>$dataSolicitacao</td>" ;
						echo "<td>$obs</td>" ;
						echo "<td><a href='exclusaoDemandas.php?c=$codigo'>Excluir</a></td>";
						echo "<td><a href='alterarDemandas.php?c=$codigo'>Alterar</a></td>";
						echo "</tr>";
						
						++$contador;
					}
					
					echo "</table>";

		?>
		<hr><br>
	<a class="link1" href="cadDemandas.html">Inclus&atilde;o</a>
	<a class="link2"href="index.html">Home Page</a>
	</div>
		</body>
</html>