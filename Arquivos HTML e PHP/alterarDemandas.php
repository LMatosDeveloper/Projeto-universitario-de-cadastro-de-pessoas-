<html> 
	<head>
		<title>Cadastro de Demandas - Alteração</title>
		
		<link rel="stylesheet" type="text/css" href="estilos/estiloDemandas.css">
	</head>
	<body>
		<h1>Cadastro de Demandas - Altera&ccedil;&atilde;o</h1>
		
    <?php
    ini_set('default_charset', 'ansi');
	if (! isset($_GET["c"]))
			 die("Rotina chamada de forma incorreta");
	$conexao=mysqli_connect("localhost","root","");
	
	$codigo=$_GET["c"];
	$comandoSQL = 'SELECT * FROM demandas';
			 
			 mysqli_select_db($conexao,"embaixada") or 
					die("Erro na seleção do banco:" 
						. mysqli_error($conexao) );
						
	$registro = mysqli_query($conexao, $comandoSQL);
	
	if(mysqli_num_rows($registro)<1)
			 die("Usuario codigo $codigo não encontrado. Excluído?");
		 
		 $dados = mysqli_fetch_array($registro);
		 
		 $codigo = 	$dados["codigo"];
		 $nome =		$dados["nome"];
		 $rg =		$dados["rg"];
		 $cpf =		$dados["cpf"];
		 $sexo =		$dados["sexo"];
		 $ddd =		$dados["ddd"];
		 $telefone =	$dados["telefone"];
		 $nascimento = $dados ["nascimento"];
		 $nacionalidade = $dados["nacionalidade"];
		 $ufNascimento = $dados ["ufNascimento"];
		 $atual =	$dados["atual"];
		 $servico =	$dados["servico"];
		 $motivoSolicitacao = $dados["motivoSolicitacao"];
		 $dataSolicitacao =	$dados["dataSolicitacao"];
		 $obs =	$dados["obs"];
	?>
			<div class= "formulario">
			<fieldset class= "fieldset">
			<form 	action="gravarDemandas.php" 
					enctype="multipart/form-data"
					method="post">
					<input type="hidden" name="codigo" value="<?php echo $codigo; ?>"> 	 
			Nome: <br>
			<input type="text" class="inputBox"
				   name="nome"
				   maxlength="30"
				   placeholder="Informe seu nome completo"
				   size="30"
				   value="<?php echo $nome; ?>"> <br><br>
			RG: <br>
			<input type="text" class="inputBox"
				   name="rg"
				   maxlength="9"
				   placeholder="Apenas numeros"
				   value="<?php echo $rg; ?>"><br><br>
				   
			
			
			CPF: <br>
			<input type="text" class="inputBox"
				   name="cpf"
				   maxlength="11"
				   placeholder="Apenas numeros"
				   value="<?php echo $cpf; ?>"><br><br>
				   
			<div class="radio">   
			<label>Sexo:<br>
			<input type="radio" name="sexo" value="M"<?php if($sexo=="M") echo 'checked'?>><span class="masculino">Masculino</span></label>
			<label><input type="radio" name="sexo" value="F"<?php if($sexo=="F") echo 'checked'?>><span class="feminino">Feminino</span></label><br><br>
			</div>
			
			DDD:<br>
			<input type="text"
				   name="ddd" class="inputBox"
				   maxlength="2"
				   placeholder="Apenas numeros"
				   value="<?php echo $ddd; ?>"><br><br>
				   
				   
			Telefone:<br>
			<input type="text" class="inputBox"
				   name="telefone"
				   maxlength="9"
				   placeholder="Apenas numeros"
				   value="<?php echo $telefone; ?>"><br><br>
				   
				   
			Nascimento:<br>
			<input type="date" class="inputBox"
				   name="nascimento"
				   value="<?php echo $nascimento; ?>"><br><br>
				   
				   
			Nacionalidade:<br>
			<input type="text" class="inputBox"
				   name="nacionalidade"
				   maxlength="30"
				   size="15"
				   value="<?php echo $nacionalidade; ?>"> <br><br>
			
			UF de nascimento:<br>	
			<select name="ufNascimento" class="select">
					<option value="">Escolha</option>
					<option value="AC" <?php if($ufNascimento=='AC') echo 'selected'?>>Acre</option>
					<option value="AL" <?php if($ufNascimento=='AL') echo 'selected'?>>Alagoas</option>
					<option value="AP" <?php if($ufNascimento=='AP') echo 'selected'?>>Amap&aacute;</option>
					<option value="AM" <?php if($ufNascimento=='AM') echo 'selected'?>>Amazonas</option>
					<option value="BA" <?php if($ufNascimento=='BA') echo 'selected'?>>Bahia</option>
					<option value="CE" <?php if($ufNascimento=='CE') echo 'selected'?>>Cear&aacute;</option>
					<option value="DF" <?php if($ufNascimento=='DF') echo 'selected'?>>Distrito Federal</option>
					<option value="ES" <?php if($ufNascimento=='ES') echo 'selected'?>>Esp&iacuterito Santo</option>
					<option value="GO" <?php if($ufNascimento=='GO') echo 'selected'?>>Goi&aacute;s</option>
					<option value="MA" <?php if($ufNascimento=='MA') echo 'selected'?>>Maranh&#227;o</option>
					<option value="MT" <?php if($ufNascimento=='MT') echo 'selected'?>>Mato Grosso</option>
					<option value="MS" <?php if($ufNascimento=='MS') echo 'selected'?>>Mato Grosso do Sul</option>
					<option value="MG" <?php if($ufNascimento=='MG') echo 'selected'?>>Minas Gerais</option>
					<option value="PA" <?php if($ufNascimento=='PA') echo 'selected'?>>Par&aacute;</option>
					<option value="PB" <?php if($ufNascimento=='PB') echo 'selected'?>>Para&iacuteba</option>
					<option value="PR" <?php if($ufNascimento=='PR') echo 'selected'?>>Paran&aacute;</option>
					<option value="PE" <?php if($ufNascimento=='PE') echo 'selected'?>>Pernambuco</option>
					<option value="PI" <?php if($ufNascimento=='PI') echo 'selected'?>>Piau&iacute</option>
					<option value="RJ" <?php if($ufNascimento=='RJ') echo 'selected'?>>Rio de Janeiro</option>
					<option value="RN" <?php if($ufNascimento=='RN') echo 'selected'?>>Rio Grande do Norte</option>
					<option value="RS" <?php if($ufNascimento=='RS') echo 'selected'?>>Rio Grande do Sul</option>
					<option value="RO" <?php if($ufNascimento=='RO') echo 'selected'?>>Rond&ocirc;nia</option>
					<option value="RR" <?php if($ufNascimento=='RR') echo 'selected'?>>Roraima</option>
					<option value="SC" <?php if($ufNascimento=='SC') echo 'selected'?>>Santa Catarina</option>
					<option value="SP" <?php if($ufNascimento=='SP') echo 'selected'?>>S&#227;o Paulo</option>
					<option value="SE" <?php if($ufNascimento=='SE') echo 'selected'?>>Sergipe</option>
					<option value="TO" <?php if($ufNascimento=='TO') echo 'selected'?>>Tocantins</option>
			</select> <br><br>
				   
				   
			UF atual:<br>
			<select name="atual" class="select">
					<option value="">Escolha</option>
					<option value="AC" <?php if($atual=='AC') echo 'selected'?>>Acre</option>
					<option value="AL" <?php if($atual=='AL') echo 'selected'?>>Alagoas</option>
					<option value="AP" <?php if($atual=='AP') echo 'selected'?>>Amap&aacute;</option>
					<option value="AM" <?php if($atual=='AM') echo 'selected'?>>Amazonas</option>
					<option value="BA" <?php if($atual=='BA') echo 'selected'?>>Bahia</option>
					<option value="CE" <?php if($atual=='CE') echo 'selected'?>>Cear&aacute;</option>
					<option value="DF" <?php if($atual=='DF') echo 'selected'?>>Distrito Federal</option>
					<option value="ES" <?php if($atual=='ES') echo 'selected'?>>Esp&iacuterito Santo</option>
					<option value="GO" <?php if($atual=='GO') echo 'selected'?>>Goi&aacute;s</option>
					<option value="MA" <?php if($atual=='MA') echo 'selected'?>>Maranh&#227;o</option>
					<option value="MT" <?php if($atual=='MT') echo 'selected'?>>Mato Grosso</option>
					<option value="MS" <?php if($atual=='MS') echo 'selected'?>>Mato Grosso do Sul</option>
					<option value="MG" <?php if($atual=='MG') echo 'selected'?>>Minas Gerais</option>
					<option value="PA" <?php if($atual=='PA') echo 'selected'?>>Par&aacute;</option>
					<option value="PB" <?php if($atual=='PB') echo 'selected'?>>Para&iacuteba</option>
					<option value="PR" <?php if($atual=='PR') echo 'selected'?>>Paran&aacute;</option>
					<option value="PE" <?php if($atual=='PE') echo 'selected'?>>Pernambuco</option>
					<option value="PI" <?php if($atual=='PI') echo 'selected'?>>Piau&iacute</option>
					<option value="RJ" <?php if($atual=='RJ') echo 'selected'?>>Rio de Janeiro</option>
					<option value="RN" <?php if($atual=='RN') echo 'selected'?>>Rio Grande do Norte</option>
					<option value="RS" <?php if($atual=='RS') echo 'selected'?>>Rio Grande do Sul</option>
					<option value="RO" <?php if($atual=='RO') echo 'selected'?>>Rond&ocirc;nia</option>
					<option value="RR" <?php if($atual=='RR') echo 'selected'?>>Roraima</option>
					<option value="SC" <?php if($atual=='SC') echo 'selected'?>>Santa Catarina</option>
					<option value="SP" <?php if($atual=='SP') echo 'selected'?>>S&#227;o Paulo</option>
					<option value="SE" <?php if($atual=='SE') echo 'selected'?>>Sergipe</option>
					<option value="TO" <?php if($atual=='TO') echo 'selected'?>>Tocantins</option>
				</select>   <br><br>
			Servi&ccedil;o:<br>
			<select name="servico" class="select">
				<option value="">Escolha</option>
				<option value="R" <?php if($servico=='R') echo 'selected'?>>Retirada de documento</option>
				<option value="E" <?php if($servico=='E') echo 'selected'?>>Emiss&atilde;o de documento</option>
				<option value="S" <?php if($servico=='S') echo 'selected'?>>Segunda via de documento</option>
				<option value="O" <?php if($servico=='O') echo 'selected'?>>Outros</option>
		    </select><br><br>
				   
			Motivo da solicita&ccedil;&atilde;o:<br>
			<input type="text" class="inputBox"
				   name="motivoSolicitacao"
				   maxlength="30"
				   value="<?php echo $motivoSolicitacao; ?>"><br><br>
				   
				   
			Data da solicita&ccedil;&atilde;o:<br>
			<input type="date" class="inputBox"
				   name="dataSolicitacao"
				   value="<?php echo $dataSolicitacao; ?>"><br><br>
				   
				   
			Observa&ccedil;&otilde;es:<br>
			<textarea
				   name="obs" class="inputBoxText"
				   rows="5" 
				   cols="100"
				   placeholder="Observa&ccedil;&otilde;es adicionais:"><?php echo $obs; ?></textarea><br><br>
				   
			<input type="submit" id="botao"value="Enviar">
		</fieldset>  
						<p class="p2"><a href="index.html">Home Page</a></p>
						<p class="p3"><a href="listagemDemandas.php">Listagem</a></p> 
			</div>
		</form>
	
	</body>
</html>