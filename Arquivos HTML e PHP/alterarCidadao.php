<html>
	<head>
		
		<title>Cadastro</title>
		<link rel="stylesheet" type="text/css"  href="estilos/estiloCidadao.css">
	</head>	

	<body>
		 
	 	<div class="formulario">
			<h1>Cadastro Cidadãos</h1>
			
			<?php
			ini_set('default_charset', 'ansi');
			
			if (! isset ($_GET["c"]))
				die("Rotina chamada de forma incorreta.");

			$codigo = $_GET["c"];
			$comandoSQL = "SELECT * FROM cidadao WHERE codigo=$codigo";

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
			$codigo						=$dados["codigo"];
			$nomeCidadao				=$dados["nomeCidadao"];
			$dataNascimento             =$dados["dataNascimento"];
			$sexo						=$dados["sexo"];
			$cpf						=$dados["cpf"];
			$rg							=$dados["rg"];	
			$telefone					=$dados["telefone"];
			$email						=$dados["email"];
			$emailSecundario			=$dados["emailSecundario"];
			$rua						=$dados["rua"];
			$bairro						=$dados["bairro"];
			$numero						=$dados["numero"];
			$cidade						=$dados["cidade"];
			$uf							=$dados["uf"];
			$complemento				=$dados["complemento"];
			$visto						=$dados["visto"];
			$numPassaporte				=$dados["numPassaporte"];
			$dataEmissao				=$dados["dataEmissao"];
			$validadePassaporte			=$dados["validadePassaporte"];
			$observacao     			=$dados["observacao"];

			?>
				<form 	action="gravarCidadao.php"
			  			method="post"
			  			enctype="multipart/form-data">
			  			<input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
			 
					<fieldset class="fieldset">
						<legend>Informa&ccedil;&otilde;es dos Cidadãos</legend>
					<br>
					<div class="cartao">
						
						<div class="back">
						<h3>Informações Complementares</h3><br>
						<p class="p1"> 
							<ul>
								<li> O cadastro da cidadãos é alfanumérico.</li><br>
									<br>
								<li>O campo de passaporte é de vital importância para garantir a segurança do cidadão em outro país.</li><br>
									<br>
								<li>A descrição do cidadão deve ser detalhada e conter todas as informações.</li><br>
									<br>
								<li>Datas e Status devem ser atualizados para um melhor controle sobre o cidadão.</li><br>
									<br>
							</ul>
						</p><br><br>
						<h3>Links:</h3><br><br>
						<p class="p2"><a href="index.html">Home Page</a></p>
						<p class="p3"><a href="listaCidadao.php">Listagem</a></p>
						</div>
					</div>
					
					
					<div class="inputBox">
					<label>Nome:</label>	<br> 
						<input	type="text"		name="nomeCidadao"
								size="10"		maxlength="10" required="" value="<?php echo $nomeCidadao; ?>">
	
					<div class="inputBox">
					<label>Data de Nacimento:</label><br>
						<input	type="date"		name="dataNascimento" required="" value="<?php echo $dataNascimento; ?>">
					</div>
					<br><br>
					
					<div class="inputBox">
					<label>CPF:</label><br>
						<input	type="text"		name="cpf"
								size="30"		maxlength="30" required="" value="<?php echo $cpf; ?>">
					</div>
					<br><br>
					
					<div class="inputBox">
					<label>RG:</label><br>
						<input	type="text"	name="rg"
								size="11"	maxlength="11" required="" value="<?php echo $rg; ?>">
					</div>
					<br><br>
									
					<div class="inputBox">
					<label>Email:</label><br>
						<input	type="text"		name="email"
								size="30"		maxlength="30" required="" value="<?php echo $email; ?>">
					</div>
					
					<div class="inputBox">
					<label>Email Secundário:</label><br>
						<input	type="text"		name="emailSecundario"
								size="30"		maxlength="30"  value="<?php echo $emailSecundario; ?>">
					</div>
					<br><br>
					
					<div class="inputBox">
					<label>Telefone:</label><br>
						<input	type="text"		name="telefone"
								size="30"		maxlength="30" required="" value="<?php echo $telefone; ?>">
					</div>
					<br><br>
					
					<div class="radio">
					<br><br><br><br><br><br><br>
					
					<label>Sexo?<br>
						<input type="radio" name="sexo" value="M"<?php if($sexo == 'M') echo 'checked'; ?>><span class="masculino">Masculino</span></label>
						
					<label><input type="radio" name="sexo" value="F"<?php if($sexo == 'F') echo 'checked'; ?>><span class="feminino">Feminino</span></label>
					<br>
					</div>
					
					<legend>Dado de Endereço</legend>
					<hr>
					
					<div class="inputBox">
					<label>Rua:</label><br>
					<input	type="text"		name="rua"
							size="30"		maxlength="30" required="" value="<?php echo $rua; ?>">
					</div>
					<br><br>
					
					<div class="inputBox">
					<label>Bairro:</label><br>
					<input	type="text"		name="bairro"
							size="30"		maxlength="30" required="" value="<?php echo $bairro; ?>">
					</div>
					<br><br>
					
					<div class="inputBox">
					<label>Número:</label><br>
					<input	type="text"		name="numero"
							size="30"		maxlength="30" required="" value="<?php echo $numero; ?>">
					</div>
					<br><br>
					
					<div class="inputBox">
					<label>Cidade:</label><br>
					<input	type="text"		name="cidade"
							size="30"		maxlength="30" required="" value="<?php echo $cidade; ?>">
					</div>
					
					<br><br><br><br><br>
					
					<div class="inputBox">
					<label>UF:</label><br>
					<input	type="text"		name="uf"
							size="30"		maxlength="30" required="" value="<?php echo $uf; ?>">
					</div>
					<br><br><br>
					
					<div class="inputBoxText">
					<label>Complemento:</label><br>
						<textarea	name="complemento"	rows="3"
									cols="80"	placeholder="Mais informações."><?php echo $complemento; ?></textarea>
					</div>
					<br>
					
					<fieldset class="fieldset">
					<legend>Passaporte </legend>
					
					<label>Visto:</label>
					
						<select	name="visto">
							<option value="">Escolha...</option>
							<option value="1"<?php if($visto == 1) echo 'selected';?>>B1 = Negócios e acadêmicos</option>
							<option value="2"<?php if($visto == 2) echo 'selected';?>>B2 = Turismo e tratamento médico</option>
							<option value="3"<?php if($visto == 3) echo 'selected';?>>F1 = Estudante</option>
							<option value="4"<?php if($visto == 4) echo 'selected';?>>H e L = Trabalho temporário / Trabalho transferido</option>
						</select>
					<br>
					</fieldset>		
					
					<div class="inputBox">
					<label>Numeração:</label><br>
					<input	type="text"		name="numPassaporte"
							size="30"		maxlength="30" required="" value="<?php echo $numPassaporte; ?>">
					</div>
					
					<br><br><br>

					<div class="inputBox">
					<label>Data de Emissão:</label><br>
						<input	type="date"		name="dataEmissao" required="" value="<?php echo $dataEmissao; ?>">
					</div>
					<br><br><br>
					
					<div class="inputBox">
					<label>Validade:</label><br>
						<input	type="date"		name="validadePassaporte" required="" value="<?php echo $validadePassaporte; ?>">
					</div>
					<br><br>
					</fieldset>
		
					<fieldset class="fieldset">
					<legend>Descrição e Observações</legend>
					<br>
								
					<div class="inputBoxText">
					<label>Observações:</label><br>
						<textarea	name="observacao"	rows="3"
									cols="80"	placeholder="Observações."><?php echo $observacao; ?></textarea>
					</div>
					<br>
									
					
					</fieldset>
					<input type="submit" value="Enviar">
					<input type="reset" value="Limpar">
				</form>
				
						
		</div>
	
	</body>


</html>