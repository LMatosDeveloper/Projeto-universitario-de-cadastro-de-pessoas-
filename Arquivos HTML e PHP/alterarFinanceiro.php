<!DOCTYPE html>
<html> 
	<head>
		<title>Alteração do Financeiro</title>
		<link rel="stylesheet" type="text/css"  href="estilos/estilosFinanceiro.css">
	</head>
	<body>
	<div class="formulario">
		<h2>Alteração de Sistema Financeiro</h2>
		<?php
		ini_set('default_charset', 'ansi');
			// código do pet veio?
			if ( ! isset($_GET["c"]))
				die("Programa chamado de forma incorreta.");
			
			// crio variável com o código do colaborador
			$codigo = $_GET["c"];

			// conecto no mysql e abro o banco
			include "conexao.php";
			
			// Comando SQL para localizar o colaborador
			$comandoSQL = "SELECT * FROM financeiro 
				WHERE codigo=$codigo";
				
			// Enviar o comando para o MYSQL
			$registro=mysqli_query( $conexao , 
									$comandoSQL) or 
				die("Erro na seleção do pet: " . mysqli_error($conexao));
			
			// Achou algum registro (do colaborador?)
			$linhas = mysqli_num_rows($registro);
			
			if($linhas<1)
				die("Código $codigo não encontrado.");
			
			$dados = mysqli_fetch_array($registro);
			
			$ativo                 	=$dados["ativo"];
			$tipoPessoa            	=$dados["tipoPessoa"];
			$nomeColaborador	   	=$dados["nomeColaborador"];
			$departamento		   	=$dados["departamento"];
			$cpf				   	=$dados["cpf"];
			$nomeBanco			   	=$dados["nomeBanco"];
		    $tipoConta			   	=$dados["tipoConta"];
			$numConta			   	=$dados["numConta"];	
			$referente			   	=$dados["referente"];	
            $tipoPag			   	=$dados["tipoPag"];      
			$valor				   	=$dados["valor"];
			$dataPagamento         	=$dados["dataPagamento"];
			$obs				   	=$dados["obs"];

		
?>
					<form   action ="gravarDadosFinanceiro.php"
					enctype="multipart/form-data"
					method="post">
					<input type="hidden" name="codigo" value="<?php echo $codigo; ?>">
					
					
		<fieldset class="fieldset">
			<legend>Empregados e Terceirizados</legend>
		<br><br>
		<div class="cartao">
						<!-- <div class="frente"><img src="estilos/brasil5.png"></div> -->
						<div class="back">
						<h3>Informação Importante</h3><br>
						<p class="p1"> 
							<ul>
								<li> Preencha todos os campos corretamente para não ter problemas no ato do pagamento.</li><br>
									<li> Evite usar caracter especiais.</li><br>
									<br>
							</ul>
						</p><br><br>
						<h3>Onde voce quer ir?</h3><br><br>
						<p class="p2"><a href="index.html">Home Page</a></p>
						<p class="p3"><a href="listagemFinanceiro.php">Listagem</a></p>
						</div>
					</div>
	     <div class="radio">
		<label>Tipo de Pessoa: <br>         
		<input   type="radio"    value="F"   name="tipoPessoa" <?php if ($tipoPessoa =='F') echo 'checked';?>><span class="sim">Pessoa Física</span></label>
		<label><input   type="radio"    value="J"   name="tipoPessoa" <?php if ($tipoPessoa =='J') echo 'checked';?>><span class="nao">Pessoa Jurídica</span></label><br>
         </div>
        <br><br>
		<div class="inputBox">
		<label>Nome do Funcionário:</label><br>
		<input  name="nomeColaborador"
				type="text"  
				value="<?php echo $nomeColaborador;?>" 
                maxlength="50"
                size="30"
				placeholder="Escreva seu nome completo" required> 
				</div>
				<br><br>
			 <label>Departamento:</label>
			 
			 <select  name="departamento" required>
									<option  value="">Escolha</option>
									<option  value="adm"    <?php if ($departamento =="adm")    echo 'selected';?>>Administrativa</option>
									<option  value="consul" <?php if ($departamento =="consul") echo 'selected';?>>Consular</option>
									<option  value="jurid"  <?php if ($departamento =="jurid")  echo 'selected';?>>Jurídico</option>
									<option  value="financ" <?php if ($departamento =="financ") echo 'selected';?>>Financeiro</option>
									<option  value="polit"  <?php if ($departamento =="polit")  echo 'selected';?>>Políticas</option>
									<option  value="impres" <?php if ($departamento =="impres") echo 'selected';?>>Impressa</option>
									<option  value="comer"  <?php if ($departamento =="comer")  echo 'selected';?>>Comercial</option>
									<option  value="educ"   <?php if ($departamento =="educ")   echo 'selected';?>>Educação e Cultura</option>
									<option  value="recep"  <?php if ($departamento =="recep")  echo 'selected';?>>Recepção</option>
									<option  value="segur"  <?php if ($departamento =="segur")  echo 'selected';?>>Segurança</option>
									<option  value="limp"   <?php if ($departamento =="limp")   echo 'selected';?>>Limpreza</option></select>
			   <br><br>
			   <div class="inputBox">
					<label>CPF:</label><br>
						<input	type="number"	name="cpf" min="0"
								size="15"		maxlength="13" required="" value="<?php echo $cpf;?>">
					</div>
					<br><br>
					
               <div class="inputBox">
		<label>Banco</label> <select name="nomeBanco" required>
					     <option  value="">Escolha</option>
					     <option  value="SA"  <?php if ($nomeBanco =="SA")    echo 'selected';?>>033- Santander</option>
  				         <option  value="BR"  <?php if ($nomeBanco =="BR")    echo 'selected';?>>237- Bradesco</option>
					     <option  value="BB"  <?php if ($nomeBanco =="BB")    echo 'selected';?>>001- Banco do Brasil</option>
					     <option  value="IT"  <?php if ($nomeBanco =="IT")    echo 'selected';?>>341- Itaú - Unibanco</option>
					     <option  value="CF"  <?php if ($nomeBanco =="CF")    echo 'selected';?>>104- Caixa Econômica Federal</option>
						 <option  value="OU"  <?php if ($nomeBanco =="OU")    echo 'selected';?>>Outros</option></select>
			<br><br>
			<div class="radio">
			<label>Tipo da Conta:<br>        
			<input   type="radio"    value="CS"   name="tipoConta" <?php if ($tipoConta =='CS') echo 'checked';?>><span class="sim">Conta Salário</span></label>
   			<label><input   type="radio"    value="CC"   name="tipoConta" <?php if ($tipoConta =='CC') echo 'checked';?>><span class="nao">Conta Corrente</span></label><br><br>
		    </div>
			<br><br>
			
	        <div class="inputBox">
			<label>Nº da Conta:</label><br> 
			<input  name="numConta"
					type="number"
                    value="<?php echo $numConta;?>"
                    maxlength="13"
                    size="15"
                    placeholder="Sem Espaço"></div>
                    <br><br><br>
			 
			<label>Refente ao mês de:</label>
			<select  name="referente"  class="selecao" required>
					     <option  value="">Escolha</option>
					     <option  value="Jan" <?php if ($referente =="Jan")    echo 'selected';?>>Janeiro</option>
  				         <option  value="Fev" <?php if ($referente =="Fev")    echo 'selected';?>>Fevereiro</option>
					     <option  value="Mar" <?php if ($referente =="Mar")    echo 'selected';?>>Março</option>
					     <option  value="Abr" <?php if ($referente =="Abr")    echo 'selected';?>>Abril</option>
						 <option  value="Mai" <?php if ($referente =="Mai")    echo 'selected';?>>Maio</option>
					     <option  value="Jun" <?php if ($referente =="Jun")    echo 'selected';?>>Junho</option>
  				         <option  value="Jul" <?php if ($referente =="Jul")    echo 'selected';?>>Julho</option>
					     <option  value="Ago" <?php if ($referente =="Ago")    echo 'selected';?>>Agosto</option>
					     <option  value="Set" <?php if ($referente =="Set")    echo 'selected';?>>Setembro</option>
					     <option  value="Out" <?php if ($referente =="Out")    echo 'selected';?>>Outubro</option>
					     <option  value="Nov" <?php if ($referente =="Nov")    echo 'selected';?>>Novembro</option>
					     <option  value="Dez" <?php if ($referente =="Dez")    echo 'selected';?>>Dezembro</option>
					     
			</select>
			<br><br>
			 <div class="radio">
			<label>Tipo de pagamento: <br>       
			<input   type="radio"    value="T"      name="tipoPag" <?php if ($tipoPag =='T') echo 'checked';?>><span class="sim">Total</span></label>
            <label><input   type="radio"    value="P"    name="tipoPag"   <?php if ($tipoPag =='P') echo 'checked';?>><span class="nao">Parcial</span></label><br><br>

			<br><br>
			<div class="inputBox">
			<label>Valor R$</label><br>
			<input type="number"  name="valor"  min="0" max="99999.99" step="0.01" required value="<?php echo $valor;?>">
			</div></fieldset>
			<br><br>
			<div class="inputBox">
			<label>Data de Pagamento:</label><br></b> <input  type="date"  name="dataPagamento" value="<?php echo $dataPagamento; ?>"></div>
			<br><br>
			<div class="inputBoxText">
			<label>Observações:</label><br>
			 <textarea   
			               name="obs" 
							rows="3"
							cols="80"
							style="width:500px; height:100px"
							placeholder="Digite aqui o seu Texto"><?php echo $obs;?></textarea></div>
			<br>
			<input type="submit" value="Alterar Dados">
					<input type="reset" value="Cancelar">			
					</fieldset>
				</form>		
		</div>
	
	</body>


</html>