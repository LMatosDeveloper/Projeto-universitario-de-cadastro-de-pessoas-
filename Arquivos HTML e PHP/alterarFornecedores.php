<html>
	<head>
		<meta charset="ansi">
		<title>Cadastro de Fornecedores - Altera&ccedil;&atilde;o</title>
		<link rel="stylesheet" type="text/css"  href="estilos/estilosFornecedores.css">
	</head>	

	<body>
		
	 	<div class="formulario">
			<h2>Cadastro de Fornecedores - Altera&ccedil;&atilde;o</h2>
			
			<?php
			ini_set('default_charset', 'ansi');
			if (! isset ($_GET["c"]))
				die("Rotina chamada de forma incorreta.");

			$codigo = $_GET["c"];
			$comandoSQL = "SELECT * FROM fornecedores WHERE codigo=$codigo";

			$server = "localhost";
			$user = "root";
			$senha = "";
			$banco = "embaixada";
	
			$con = mysqli_connect($server, $user, $senha);
			mysqli_select_db ($con, $banco) or
				die("Erro na seleção do banco: " . mysqli_error($con));
			$regs = mysqli_query($con, $comandoSQL);

			if(mysqli_num_rows($regs) < 1 )
				die("Fornecedor código $codigo não encontrado.");

			$dados = mysqli_fetch_array($regs);
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

			?>
				<form 	action="gravarFornecedores.php"
			  			method="post"
			  			enctype="multipart/form-data">
			 
					<fieldset class="fieldset">
						<legend>Informa&ccedil;&otilde;es sobre Fornecedores</legend>
					<br>
					<div class="cartao">
						<div class="back">
						<h3>Como preencher</h3><br>
						<p class="p1"> 
							<ul>
								<li>Identificar a raz&atilde;o social (nome da empresa); endere&ccedil;o completo (rua, bairro, cidade, estado, email) da empresa fornecedora; n&uacute;meros do CNPJ e da Inscri&ccedil;&atilde;o Estadual; nome e fun&ccedil;&atilde;o da pessoa de contato.</li><br>
							</ul>
						</p><br><br>
						<h3>Links:</h3><br><br>
						<p class="p2"><a href="index.html">Home Page</a></p>
						<p class="p3"><a href="listagemFornecedores.php">Listagem</a></p>
						</div>
					</div>

					<legend><b>Dados do Representante e Empresa</b></legend><br>

					<div class="inputBox">
					<label>C&oacute;digo do Fornecedor</label>	<br> 
						<input	type="number"		name="codigo"
								size="11"		maxlength="11" required="" value="<?php echo $codigo; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Nome da Empresa</label><br> 
						<input	type="text"		name="nomeEmpresa"
								size="50"		maxlength="50" required="" value="<?php echo $nomeEmpresa; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Nome do Representante</label><br> 
						<input	type="text"		name="nomeRepresentante"
								size="50"		maxlength="50" required="" value="<?php echo $nomeRepresentante; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>E-mail da Empresa</label><br> 
						<input	type="text"		name="emailEmpresa"
								size="50"		maxlength="50" required="" value="<?php echo $emailEmpresa; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>E-mail do Representante</label><br> 
						<input	type="text"		name="emailRepresentante"
								size="50"		maxlength="50" required="" value="<?php echo $emailRepresentante; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Inscri&ccedil;&atilde;o Estadual de Pessoa Jur&iacute;dica</label><br> 
						<input	type="number"		name="ie"
								size="20"		maxlength="20" required="" value="<?php echo $ie; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>CPF</label><br> 
						<input	type="number"		name="cpf"
								size="14"		maxlength="14" required="" value="<?php echo $cpf; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>CNPJ</label><br> 
						<input	type="number"		name="cnpj"
								size="18"		maxlength="18" required="" value="<?php echo $cnpj; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Telefone Empresa</label><br> 
						<input	type="number"		name="telEmpresa"
								size="8"		maxlength="8" required="" value="<?php echo $telEmpresa; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Telefone Representante</label><br> 
						<input	type="number"		name="telRepresentante"
								size="8"		maxlength="8" required="" value="<?php echo $telRepresentante; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>DDD/DDI</label><br> 
						<input	type="number"		name="ddd"
								size="3"		maxlength="3" required="" value="<?php echo $ddd; ?>">
					</div>
					<br>

					<legend><b>Endere&ccedil;o do Representante ou Empresa</b></legend><br>

					<div class="inputBox">
					<label>Endere&ccedil;o</label><br> 
						<input	type="text"		name="endereco"
								size="100"		maxlength="100" required="" value="<?php echo $endereco; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>N&uacute;mero</label><br> 
						<input	type="number"		name="numero"
								size="5"		maxlength="5" required="" value="<?php echo $numero; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Complemento</label><br> 
						<input	type="text"		name="complemento"
								size="10"		maxlength="10"  value="<?php echo $complemento; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Bairro</label><br> 
						<input	type="text"		name="bairro"
								size="50"		maxlength="50" required="" value="<?php echo $bairro; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Cidade</label><br> 
						<input	type="text"		name="cidade"
								size="50"		maxlength="50" required="" value="<?php echo $cidade; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>UF</label><br> 
						<input	type="text"		name="uf"
								size="2"		maxlength="2" required="" value="<?php echo $uf; ?>">
					</div>
					<br>

					<legend><b>Informa&ccedil;&otilde;es sobre o produto</b></legend><br>
					
					<div class="inputBox">
					<label>Produto</label><br> 
						<input	type="text"		name="produto"
								size="30"		maxlength="30" required="" value="<?php echo $produto; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>C&oacute;digo do Produto</label><br> 
						<input	type="number"		name="codProduto"
								size="20"		maxlength="20" required="" value="<?php echo $codProduto; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Quantidade</label><br> 
						<input	type="text"		name="qtd"
								size="10"		maxlength="10" required="" value="<?php echo $qtd; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Valor (unidade)</label><br> 
						<input	type="number"		name="valorUnidade"
								min="0"			max="99999.99" step="0.01" required="" value="<?php echo $valorUnidade; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Valor (total)</label><br> 
						<input	type="number"		name="valorTotal"
								min="0"			max="99999.99" step="0.01" required="" value="<?php echo $valorTotal; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Data do Contrato</label><br>
						<input	type="date"		name="dataContrato" value="<?php echo $dataContrato; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>&Uacute;ltimo Pedido</label><br> 
						<input	type="number"		name="ultPedido"
								size="20"		maxlength="20" required="" value="<?php echo $ultPedido; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>&Uacute;ltima Compra</label><br>
						<input	type="date"		name="ultCompra" value="<?php echo $ultCompra; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Estoque</label><br> 
						<input	type="number"		name="estoque"
								size="10"		maxlength="10" required="" value="<?php echo $estoque; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Peso L&iacute;quido</label><br> 
						<input	type="number"		name="pesoLiquido"
								min="0"			max="9999.999" step="0.001" required="" value="<?php echo $pesoLiquido; ?>">
					</div>
					<br>

					<div class="inputBox">
					<label>Peso Bruto</label><br> 
						<input	type="number"		name="pesoBruto"
								min="0"			max="9999.999" step="0.001" required="" value="<?php echo $pesoBruto ?>">
					</div>
					<br>

					<div class="radio">
					<label>Ativo<br>
						<input type="radio" name="ativo" value="0"<?php if($ativo == 0) echo 'checked' ?>><span class="nao">N&atilde;o</span>
					</label>
					<label>
						<input type="radio" name="ativo" value="1"<?php if($ativo == 1) echo 'checked' ?>><span class="sim">Sim</span>
					</label>
					<br><br><br>
					</div>

					<div class="inputBoxText">
					<label>Observa&ccedil;&otilde;es</label><br>
						<textarea	name="obs"	rows="3"
									cols="80"	placeholder="Observações sobre o produto."><?php echo $obs; ?>
						</textarea>
					</div>
					<br>

					<input type="submit" value="Enviar">
					<input type="reset" value="Limpar">
				</fieldset>

				</form>		
		</div>
	
	</body>

</html>