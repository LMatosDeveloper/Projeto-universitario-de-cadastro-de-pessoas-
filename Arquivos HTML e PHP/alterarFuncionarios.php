<html> 
	<head>
		<title>Cadastro de Funcionario</title>
		<link rel="stylesheet" type="text/css" href="estilos/estiloFuncionarios.css">
	</head>
<body>
<?php
			ini_set('default_charset', 'ansi');
			if (! isset ($_GET["c"]))
				die("Rotina chamada de forma incorreta.");

			$codigo = $_GET["c"];
			$comandoSQL = "SELECT * FROM funcionarios WHERE codigo=$codigo";

			$server = "localhost";
			$user = "root";
			$senha = "";
			$banco = "embaixada";
	
			$con = mysqli_connect($server, $user, $senha);
			mysqli_select_db ($con, $banco) or
				die("Erro na seleção do banco: " . mysqli_error($con));


			$regs = mysqli_query($con, $comandoSQL);

			if(mysqli_num_rows($regs) < 1 )
				die("Funcionário código $codigo não encontrada.");

			$dados = mysqli_fetch_array($regs);
			$codigo						= $dados["codigo"];
			$nomeFuncionario			= $dados["nomeFuncionario"];
			$dataNascimento				= $dados["dataNascimento"];
			$cpf						= $dados["cpf"];
			$rg							= $dados["rg"];
			$sexo						= $dados["sexo"];
			$nacionalidade				= $dados["nacionalidade"];
			$uf							= $dados["uf"];
			$estadoCivil				= $dados["estadoCivil"];
			$dddTel 					= $dados["dddTel"];
			$telefone 					= $dados["telefone"];
			$email 						= $dados["email"];
			$nomePai 					= $dados["nomePai"];
			$nomeMae 					= $dados["nomeMae"];
			$endereco 					= $dados["endereco"];
			$numero 					= $dados["numero"];
			$bairro 					= $dados["bairro"];
			$cep 						= $dados["cep"];
			$admissao 					= $dados["admissao"];
			$cargoEmpresa 				= $dados["cargoEmpresa"];
			$cargaHoraria 				= $dados["cargaHoraria"];
			$diplomata 					= $dados["diplomata"];
			$estrangeiro 				= $dados["estrangeiro"];
			$idPais 					= $dados["idPais"];
			$nomeBanco 					= $dados["nomeBanco"];
			$tipoConta 					= $dados["tipoConta"];
			$agencia 					= $dados["agencia"];
			$numeroConta 				= $dados["numeroConta"];
			?>
			<div class="formulario">
				<h1>Cadastro de Funcionários</h1>
			<form 	action="gravarFuncionarios.php"
					method="post"
					enctype="multipart/form-data"> 
					<input type="hidden" name="codigo" value="<?php echo $codigo; ?>">

			
			<fieldset class="fieldset">
				<legend>Informações Pessoais</legend>
			<br>Nome completo: 
			<input  type="text" name="nomeFuncionario" class="inputBox"
					maxlength="50" size="30" 
					placeholder="Informe o seu nome completo"
					value="<?php echo $nomeFuncionario; ?>">
			<br>
		    Data de Nascimento: 
			<input 	type="date" class="inputBox"
					name="dataNascimento"
					min="1920-01-01"
					max="2018-01-01"
					value="<?php echo $dataNascimento;?>">
			<br>
			CPF:
			<input type="number"	class="inputBox"
				   name="cpf"
				   maxlength="14"
				   size="15"
				   placeholder="Informe seu CPF"
				   value="<?php echo $cpf;?>">
			<br>
			RG:
			<input type="number"	class="inputBox"
				   name="rg"
				   maxlength="9"
				   size="10"
				   placeholder="Informe seu RG"
				   value="<?php echo $rg;?>">
			<br>
			Sexo:
			<select name="sexo">
			<option value="">Selecione seu sexo</option>
			<option value="F"<?php if($tipo=='F') echo 'selected';?>>Feminino</option>
			<option value="M"<?php if($tipo=='M') echo 'selected';?>>Masculino</option>
			<option value="T"<?php if($tipo=='T') echo 'selected';?>>Transsexual</option>
			<option value="I"<?php if($tipo=='I') echo 'selected';?>>Indefinido</option>
			</select>
			<br>
			
			Nacionalidade:
			<input type="name"	class="inputBox"
				   name="nacionalidade"
				   size="20"
				   maxlength="50"
				   placeholder="Informe a sua nacionalidade"
				   value="<?php echo $nacionalidade;?>">	
			
			
			UF:
				<select name="uf"  required>
				<option value="">Selecione</option>
				<option value="AC"<?php if($uf=='AC') echo 'selected';?>>Acre</option>
				<option value="AL"<?php if($uf=='AL') echo 'selected';?>>Alagoas</option>
				<option value="AP"<?php if($uf=='AP') echo 'selected';?>>Amapá</option>
				<option value="AM"<?php if($uf=='AM') echo 'selected';?>>Amazonas</option>
				<option value="BA"<?php if($uf=='BA') echo 'selected';?>>Bahia</option>
				<option value="CE"<?php if($uf=='CE') echo 'selected';?>>Ceará</option>
				<option value="DF"<?php if($uf=='DF') echo 'selected';?>>Distrito Federal</option>
				<option value="ES"<?php if($uf=='ES') echo 'selected';?>>Espirito Santo</option>
				<option value="GO"<?php if($uf=='GO') echo 'selected';?>>Goiás</option>
				<option value="MA"<?php if($uf=='MA') echo 'selected';?>>Maranhão</option>
				<option value="MS"<?php if($uf=='MS') echo 'selected';?>>Mato Grosso do Sul</option>
				<option value="MT"<?php if($uf=='MT') echo 'selected';?>>Mato Grosso</option>
				<option value="MG"<?php if($uf=='MG') echo 'selected';?>>Minas Gerais</option>
				<option value="PA"<?php if($uf=='PA') echo 'selected';?>>Pará</option>
				<option value="PB"<?php if($uf=='PB') echo 'selected';?>>Paraíba</option>
				<option value="PR"<?php if($uf=='PR') echo 'selected';?>>Paraná</option>
				<option value="PE"<?php if($uf=='PE') echo 'selected';?>>Pernambuco</option>
				<option value="PI"<?php if($uf=='PI') echo 'selected';?>>Piauí</option>
				<option value="RJ"<?php if($uf=='RJ') echo 'selected';?>>Rio de Janeiro</option>
				<option value="RN"<?php if($uf=='RN') echo 'selected';?>>Rio Grande do Norte</option>
				<option value="RS"<?php if($uf=='RS') echo 'selected';?>>Rio Grande do Sul</option>
				<option value="RO"<?php if($uf=='RO') echo 'selected';?>>Rondônia</option>
				<option value="RR"<?php if($uf=='RR') echo 'selected';?>>Roraima</option>
				<option value="SC"<?php if($uf=='SC') echo 'selected';?>>Santa Catarina</option>
				<option value="SP"<?php if($uf=='SP') echo 'selected';?>>São Paulo</option>
				<option value="SE"<?php if($uf=='SE') echo 'selected';?>>Sergipe</option>
				<option value="TO"<?php if($uf=='TO') echo 'selected';?>>Tocantins</option>
				<option value="EX"<?php if($uf=='EX') echo 'selected';?>>Estrangeiro</option>
				
		    </select>
			Estado Civil:
			<select name="estadoCivil">
			<option value="">Escolha seu estado civil</option>
			<option value="S"<?php if($estadoCivil=='S') echo 'selected';?>>Solteiro(a)</option>
			<option value="C"<?php if($estadoCivil=='C') echo 'selected';?>>Casado(a)</option>
			<option value="D"<?php if($estadoCivil=='D') echo 'selected';?>>Divorciado(a)</option>
			<option value="V"<?php if($estadoCivil=='V') echo 'selected';?>>Viúvo(a)</option>
			</select><br>
			
			Telefone: <br>
				DDD:
				<input 	type="ddd"	class="inputBox"
						name="dddTel"
						size="2"
						maxlength="2"
						placeholder="DDD"
						value="<?php echo $dddTel;?>"> 
				Número :
				<input 	type="number"	class="inputBox"
						name="telefone"
						size="15"
						maxlength="9"
						placeholder="Informe o seu nÃºmero"
						required
						value="<?php echo $telefone;?>">
			<br>
			E-mail:
			<input type="email"	class="inputBox"
				   name="email"
				   size="30"
				   maxlength="50"
				   placeholder="Informe seu email"
				   required
				   value="<?php echo $email;?>"><br>
				   
			Nome do pai:
			<input type="name"	class="inputBox"
				   name="nomePai"
				   size="30"
				   maxlength="50"
				   required
				   placeholder="Informe o nome do pai"
				   value="<?php echo $nomePai;?>">
			 Nome da mãe:
			<input type="name"	class="inputBox"
				   name="nomeMae"
				   size="30"
				   maxlength="50"
				   required
				   placeholder="Informe o nome da mÃ£e"
				   value="<?php echo $nomeMae;?>"><br>
				   
				   
			Endereço:
			<input type="text"		class="inputBox"
				   name="endereco"	
				   size="30"
				   maxlength="100"
				   placeholder="Informe o seu endereÃ§o"
				   required
				   value="<?php echo $endereco;?>">
			Nº:
			<input type="number"	class="inputBox"
				   name="numero"
				   placeholder="Número da residencial"
				   required
				   value="<?php echo $numero;?>">
			
			Bairro:
			<input type="text"	class="inputBox"
				   name="bairro"
				   placeholder="Informe o bairro"
				   maxlength="50"
				   required
				   value="<?php echo $bairro;?>">
			CEP:
			<input type="number"	class="inputBox"
			       name="cep"
				   placeholder="Informe o CEP"
				   maxlength="10"
				   required
				   value="<?php echo $cep;?>">
		
			</fieldset><br>
			<fieldset class="fieldset">
				<legend>Informações de Trabalho</legend>
			<br>Data de Admissão:
			<input 	type="date"	class="inputBox"
				name="admissao"
				min="2000-01-01"
				max="2019-12-31"
				required
				value="<?php echo $admissao;?>"> <br>
			
			Cargo de ocupação:
			<input type="text"	class="inputBox"
			       name="cargoEmpresa"
				   size="50"
				   maxlength="30"
				   required
				   placeholder="Informe seu cargo"
				   value="<?php echo $cargoEmpresa;?>"><br>			
			Horário de trabalho:
			<input 	type="time"	class="inputBox"
				name="cargaHoraria"
				min="04:00"
				max="10:00"
				required
				value="<?php echo $cargaHoraria;?>"><br>  
			<div class="radio">
			Diplomata?
			<label><input type="radio" name="diplomata" value="S" checked <?php if ($diplomata=="S") echo 'checked';?>><span class="sim">Sim</span></label>
			<label><input type="radio" name="diplomata" value="N" <?php if ($diplomata=="N") echo 'checked';?>><span class="nao">Não</span></label>
			<br>
			</div>
			<div class="radio">
			Estrangeiro?
			<label><input type="radio" name="estrangeiro" value="S" checked <?php if ($estrangeiro=="S") echo 'checked';?>><span class="sim">Sim</span></label>
			<label><input type="radio" name="estrangeiro" value="N"<?php if ($estrangeiro=="N") echo 'checked';?>><span class="nao">Não</span></label>
			</div>
			<br><br>
			Id do País:
			<input type="text"	class="inputBox"
			       name="idPais"
				   size="30"
				   maxlength="30"
				   placeholder="Opcional"
				   value="<?php echo $idPais;?>">
			<br><br>
			</fieldset>
			<fieldset class="fieldset">
				<legend>Informações Bancárias</legend>
			<br>Nome do banco:
			<input type="text"
			       name="nomeBanco"	class="inputBox"
				   size="20"
				   maxlength="20"
				   placeholder="Informe o nome do banco"
				   value="<?php echo $nomeBanco;?>"><br>
			<div class="radio">
			Tipo de conta:
			<label><input type="radio" name="tipoConta" value="CC" checked <?php if($tipoConta=='CC') echo 'selected';?>><span class="sim">Conta Corrente</span></label>
			<label><input type="radio" name="tipoConta" value="CP" <?php if($tipoConta=='CP') echo 'selected';?>><span class="nao">Conta Poupança</span></label>
			</div>
			<br>
			Agência:
				<input 	type="text"	class="inputBox"
						name="agencia"
						size="4"
						maxlength="4"
						placeholder="Agencia"
						value="<?php echo $agencia; ?>">
	        Número da conta:
				<input 	type="text"	class="inputBox"
						name="numeroConta"
						size="15"
						maxlength="15"
						placeholder="Nº da conta"
						value="<?php echo $numeroConta; ?>">
			</fieldset>	   
		
			<br>
			<input type="submit" value="Enviar">
						<p class="p2"><a href="index.html">Home Page</a></p>
						<p class="p3"><a href="listaFuncionarios.php">Listagem</a></p>
		</form>
	</div>
	</body>
</html>