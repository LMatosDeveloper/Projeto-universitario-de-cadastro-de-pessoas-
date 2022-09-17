<html>
	<head>
		<meta charset="ansi">
		<title>Cadastro de Miss&otilde;es - Altera&ccedil;&atilde;o</title>
		<link rel="stylesheet" type="text/css"  href="estilos/estilosEmbaixada.css">
	</head>	

	<body>
		
	 	<div class="formulario">
			<h2>Cadastro de Miss&otilde;es - Altera&ccedil;&atilde;o</h2>
			
			<?php
			ini_set('default_charset', 'ansi');
			if (! isset ($_GET["c"]))
				die("Rotina chamada de forma incorreta.");

			$codigo = $_GET["c"];
			$comandoSQL = "SELECT * FROM missoes WHERE codigo=$codigo";

			$server = "localhost";
			$user = "root";
			$senha = "";
			$banco = "embaixada";
	
			$con = mysqli_connect($server, $user, $senha);
			mysqli_select_db ($con, $banco) or
				die("Erro na seleção do banco: " . mysqli_error($con));
			$regs = mysqli_query($con, $comandoSQL);

			if(mysqli_num_rows($regs) < 1 )
				die("Missao código $codigo não encontrada.");

			$dados = mysqli_fetch_array($regs);
			$registroMissao						=$dados["registroMissao"];
			$dataInicio							=$dados["dataInicio"];
			$dataFim							=$dados["dataFim"];
			$paisDestino						=$dados["paisDestino"];
			$tipoMissao							=$dados["tipoMissao"];
			$codigoDiplomata					=$dados["codigoDiplomata"];
			$nomeDiplomata						=$dados["nomeDiplomata"];
			$riscos								=$dados["riscos"];
			$tipoViagem							=$dados["tipoViagem"];
			$orcamentoInicial					=$dados["orcamentoInicial"];
			$orcamentoFinal						=$dados["orcamentoFinal"];
			$status								=$dados["status"];
			$pendencia							=$dados["pendencia"];
			$sigilo								=$dados["sigilo"];
			$descricao							=$dados["descricao"];
			$obs								=$dados["obs"];

			?>
				<form 	action="gravarMissoes.php"
			  			method="post"
			  			enctype="multipart/form-data">
			  		<input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
			 
					<fieldset class="fieldset">
						<legend>Informa&ccedil;&otilde;es da Miss&atilde;o</legend>
					<br>
					<div class="cartao">
						<!-- <div class="frente"><img src="estilos/brasil5.png"></div> -->
						<div class="back">
						<h3>Informa&ccedil;&otilde;es &Uacute;teis</h3><br>
						<p class="p1"> 
							<ul>
								<li> O registro da Miss&atilde;o &eacute; alfanum&eacute;rico e possui no m&aacute;ximo 10 caracteres.</li><br>
									<br>
								<li>O campo de risco da miss&atilde;o &eacute; de vital import&acirc;ncia para garantir a seguran&ccedil;a do Diplomata.</li><br>
									<br>
								<li>A descri&ccedil;&atilde;o da miss&atilde;o deve ser detalhada e conter todas as informa&ccedil;&otilde;es da miss&atilde;o.</li><br>
									<br>
								<li>Datas e Status devem ser atualizados sempre para evitar sobreposi&ccedil;&atilde;o de miss&otilde;es para os Diplomatas.</li><br>
									<br>
							</ul>
						</p><br><br>
						<h3>Links:</h3><br><br>
						<p class="p2"><a href="index.html">Home Page</a></p>
						<p class="p3"><a href="listaMissoes.php">Listagem</a></p>
						</div>
					</div>
					<div class="inputBox">
					<label>Registro da Miss&atilde;o:</label>	<br> 
						<input	type="text"		name="registroMissao"
								size="10"		maxlength="10" required="" value="<?php echo $registroMissao; ?>">
					</div>
					<br>
					
					<div class="inputBox">
					<label>Data de in&iacute;cio:</label><br>
						<input	type="date"		name="dataInicio" required="" value="<?php echo $dataInicio; ?>">
					</div>
					<br>
					<div class="inputBox">
					<label>Data de finaliza&ccedil;&atilde;o:</label><br>
						<input	type="date"		name="dataFim" value="<?php echo $dataFim; ?>">
					</div>
					<br>
					<div class="inputBox">
					<label>Pa&iacute;s de realiza&ccedil;&atilde;o da miss&atilde;o:</label><br>
						<input	type="text"		name="paisDestino"
								size="30"		maxlength="30" required="" value="<?php echo $paisDestino; ?>">
					</div>
					<br>
					
					<label>Tipo de miss&atilde;o:</label>
						
						<select	name="tipoMissao">
							<option value="">Escolha...</option>
							<option value="1" <?php if($tipoMissao == 1) echo 'selected' ?>>Reuni&atilde;o com Ministros</option>
							<option value="2" <?php if($tipoMissao == 2) echo 'selected' ?>>Reuni&atilde;o com Chefe de Estado</option>
							<option value="3" <?php if($tipoMissao == 3) echo 'selected' ?>>Crise Diplom&aacute;tica</option>
							<option value="4" <?php if($tipoMissao == 4) echo 'selected' ?>>Cidad&atilde;o acusado de crime</option>
							<option value="5" <?php if($tipoMissao == 5) echo 'selected' ?>>Cidad&atilde;o vit&iacute;ma de crime</option>
						</select>
						
					<br><br>
					<div class="inputBox">
					<label>C&oacute;digo do diplomata respons&aacute;vel:</label><br>
						<input	type="number"	name="codigoDiplomata"
								size="11"		maxlength="11" required="" value="<?php echo $codigoDiplomata; ?>">
					</div>
					<br>
					<div class="inputBox">
					<label>Nome do diplomata respons&aacute;vel:</label><br>
						<input	type="text"		name="nomeDiplomata"
								size="30"		maxlength="30" required="" value="<?php echo $nomeDiplomata; ?>">
					</div>
					<br>
					<div class="radio">
					<label>H&aacute; risco na miss&atilde;o?<br>
						<input type="radio" name="riscos" value="0"<?php if($riscos == 0) echo 'checked' ?>><span class="nao">N&atilde;o</span></label>
					<label><input type="radio" name="riscos" value="1"<?php if($riscos == 1) echo 'checked' ?>><span class="sim">Sim</span></label><br><br>
					</div>
					<label>Tipo de viagem:</label>
						<select	name="tipoViagem" class="selecao">
							<option value="">Escolha...</option>
							<option value="1" <?php if($tipoViagem == 1) echo 'selected' ?>>Meios pr&oacute;prios</option>
							<option value="2" <?php if($tipoViagem == 2) echo 'selected' ?>>V&ocirc;o Comum</option>
							<option value="3" <?php if($tipoViagem == 3) echo 'selected' ?>>Primeira Classe</option>
							<option value="4" <?php if($tipoViagem == 4) echo 'selected' ?>>Ferrovia</option>
							<option value="5" <?php if($tipoViagem == 5) echo 'selected' ?>>Ve&iacute;culo Oficial</option>
						</select>
					
					<br><br>
					<div class="inputBox">
					<label>Or&ccedil;amento inicial da miss&atilde;o:</label><br>
						<input	type="number"	name="orcamentoInicial"
								min="0"			max="99999.99" step="0.01" required="" value="<?php echo $orcamentoInicial; ?>">
					</div>
					<br>
					<div class="inputBox">
					<label>Or&ccedil;amento final da miss&atilde;o:</label><br>
						<input	type="number"	name="orcamentoFinal"
								min="0"			max="99999.99" step="0.01" value="<?php echo $orcamentoFinal; ?>">
					</div>
					<br>
					
					<label>Status da miss&atilde;o:</label>
						<select	name="status" class="selecao">
							<option value="">Escolha...</option>
							<option value="0" <?php if($status == 0) echo 'selected' ?>>Encerrada</option>
							<option value="1" <?php if($status == 1) echo 'selected' ?>>Conclu&iacute;da</option>
							<option value="2" <?php if($status == 2) echo 'selected' ?>>Em curso</option>
							<option value="3" <?php if($status == 3) echo 'selected' ?>>Pendente</option>
						</select>
					
					<br><br>
					
					
					<label>Sigilo:</label>
						<select name="sigilo" class="selecao">
							<option value="">Escolha...</option>
							<option value="1"<?php if($sigilo == 1) echo 'selected' ?>>P&uacute;blica</option>
							<option value="2"<?php if($sigilo == 2) echo 'selected' ?>>Restrita</option>
							<option value="3"<?php if($sigilo == 3) echo 'selected' ?>>Sigilosa</option>
							<option value="4"<?php if($sigilo == 4) echo 'selected' ?>>Secreta</option>
						</select>
					
					<br><br>
					</fieldset>
		
					<fieldset class="fieldset">
					<legend>Descri&ccedil;&atilde;o e Observa&ccedil;&otilde;es</legend>
					<br><div class="inputBoxText">
					<label>Descri&ccedil;&atilde;o da miss&atilde;o:</label><br>
						<textarea	name="descricao"	rows="3"
									cols="80"	placeholder="Descreva a missão e seus objetivos."><?php echo $descricao; ?></textarea>
					</div>
					<br>
					<div class="inputBoxText">
					<label>Descri&ccedil;&atilde;o da(s) pend&ecirc;ncia(s):</label><br>
						<textarea	name="pendencia"	rows="3"
									cols="80"	placeholder="Descreva as pend&ecirc;ncias aqui."><?php echo $pendencia; ?></textarea>
					</div>
						<br>
					<div class="inputBoxText">
					<label>Observa&ccedil;&otilde;es:</label><br>
						<textarea	name="obs"		rows="3"
									cols="80"		placeholder="Observações."><?php echo $obs; ?></textarea>
					</div>
						 <br>
									
					<input type="submit" value="Enviar">
					<input type="reset" value="Limpar">			
					</fieldset>
				</form>		
		</div>
	
	</body>


</html>