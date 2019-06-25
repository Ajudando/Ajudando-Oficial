<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/completar.css">
</head>

<body>
	<div class="fundo-completar">
		<form method="POST" class="form-completar">
			<img src="images/ajudandotitle.png" alt="" class="sub-image">
			<span class="sub-title">Para você assinar a versão premium é necessário completar o seu cadastro. Responda as perguntas de acordo com seu nível de conhecimento sobre o assunto.</span>
			<div class="question">
				<p>Como você se considera em relação a informática de um modo geral ?</p>
				<select name="informatica">
					<?php
					require_once "usuarios.php";
					$us = new Usuario;
					//exibindo os valores da tabela do bd
					$receber = $us->pegar("informatica");
					$i = 0;
					while ($receber[0][$i] > $i) {
						$valor = $receber[0][$i];
						$str = $receber[1][$i];
						echo "<option value='$valor'>$str</option>";
						$i++;
					}
					?>
				</select>
			</div>
			<div class="question">
				<p>Como você se considera em relação ao uso de editores de texto (word,...)</p>
				<select name="editores_texto">
					<?php
					//exibindo os valores da tabela do bd
					$receber = $us->pegar("editor_texto");
					$i = 0;
					while ($receber[0][$i] > $i) {
						$valor = $receber[0][$i];
						$str = $receber[1][$i];
						echo "<option value='$valor'>$str</option>";
						$i++;
					}
					?>
				</select>
			</div>
			<div class="question">
				<p>Como você se considera em relação aos editores de apresentação (Power Point)</p>
				<select name="apresentacao">
					<?php
					//exibindo os valores da tabela do bd
					$receber = $us->pegar("editor_apresentacao");
					$i = 0;
					while ($receber[0][$i] > $i) {
						$valor = $receber[0][$i];
						$str = $receber[1][$i];
						echo "<option value='$valor'>$str</option>";
						$i++;
					}
					?>
				</select>
			</div>
			<div class="question">
				<p>Ao falarmos de edição de imagens e vídeos. Como você se considera?</p>
				<select name="imagem_video">
					<?php
					//exibindo os valores da tabela do bd
					$receber = $us->pegar("imagens_videos");
					$i = 0;
					while ($receber[0][$i] > $i) {
						$valor = $receber[0][$i];
						$str = $receber[1][$i];
						echo "<option value='$valor'>$str</option>";
						$i++;
					}
					?>
				</select>
			</div>
			<div class="question">
				<p>Quando tem alguma dificuldade no uso de recursos de multimídia, o que costuma fazer?</p>
				<select name="multimidia">
					<?php
					//exibindo os valores da tabela do bd
					$receber = $us->pegar("multimidia");
					$i = 0;
					while ($receber[0][$i] > $i) {
						$valor = $receber[0][$i];
						$str = $receber[1][$i];
						echo "<option value='$valor'>$str</option>";
						$i++;
					}
					?>
				</select>
			</div>
			<div class="question">
				<p>Quando precisa de atividades acadêmicas, como costuma a consegui-las?</p>
				<select name="atividades_academicas">
					<?php
					//exibindo os valores da tabela do bd
					$receber = $us->pegar("atividades_academicas");
					$i = 0;
					while ($receber[0][$i] > $i) {
						$valor = $receber[0][$i];
						$str = $receber[1][$i];
						echo "<option value='$valor'>$str</option>";
						$i++;
					}
					?>
				</select>
			</div>
			<div class="question">
				<p>Como costuma buscar imagens para elaborar suas atividades acadêmicas?</p>
				<select name="atividades_imagem">
					<?php
					//exibindo os valores da tabela do bd
					$receber = $us->pegar("atividades_imagens");
					$i = 0;
					while ($receber[0][$i] > $i) {
						$valor = $receber[0][$i];
						$str = $receber[1][$i];
						echo "<option value='$valor'>$str</option>";
						$i++;
					}
					?>
				</select>
			</div>
			<div class="question">
				<p>E costuma manter os créditos aos autores das atividades acadêmicas?</p>
				<span><input type="radio" value="sim" name="credito_autor"> Sim ou
					<input type="radio" value="nao" name="credito_autor"> Não</span>
			</div>
			<div class="question">
				<p>O AJUDANDO disponibiliza uma série de atividades elaboradas por professores e estudantes de educação. O que acha disto?</p>
				<select name="disponibiliza_atividades">
					<?php
					//exibindo os valores da tabela do bd
					$receber = $us->pegar("disponibiliza_atividades");
					$i = 0;
					while ($receber[0][$i] > $i) {
						$valor = $receber[0][$i];
						$str = $receber[1][$i];
						echo "<option value='$valor'>$str</option>";
						$i++;
					}
					?>
				</select>
			</div>
			<div class="question">
				<p>Ao solicitar atividades acadêmicas, o AJUDANDO irá envia-las para você por e-mail. Estas atividades podem ser enviadas em 3 formatos. Qual prefere?</p>
				<span>
					<?php
					//exibindo os valores da tabela do bd
					$receber = $us->pegar("formatos");
					$i = 0;
					while ($receber[0][$i] > $i) {
						$valor = $receber[0][$i];
						$str = $receber[1][$i];
						echo "<input type='radio' value='$valor' name='formato'>$str";
						$i++;
					}
					?>
				</span>
			</div class="question">
			<input type="submit" value="Salvar" class="btn-complementar">
		</form>
	</div>
	<?php

	session_start();

	if (isset($_POST['formato'])) {
		//pegando as informações
		$informatica = (int)addslashes($_POST['informatica']);
		$editor_texto = (int)addslashes($_POST['editores_texto']);
		$apresentacao = (int)addslashes($_POST['apresentacao']);
		$imagem_video = (int)addslashes($_POST['imagem_video']);
		$multimidia = (int)addslashes($_POST['multimidia']);
		$atividades_academicas = (int)addslashes($_POST['atividades_academicas']);
		$atividades_imagem = (int)addslashes($_POST['atividades_imagem']);
		$credito_autor = addslashes($_POST['credito_autor']);
		$disponibiliza_atividades = (int)addslashes($_POST['disponibiliza_atividades']);
		$formato = (int)addslashes($_POST['formato']);

		//salvando as informações
		$verifica = $us->finalizar($credito_autor, $formato, $informatica, $editor_texto, $apresentacao, $atividades_imagem, $imagem_video, $multimidia, $disponibiliza_atividades, $atividades_academicas);
		if ($verifica == true) {
			//logando 
			$emial = $_SESSION['salvar_depois'];
			$senha = $_SESSION['sen'];
			$verificar = $us->logar($email, $senha);
			if ($verificar == true) {
				header("location: areaprivada.php");
			} else {
				header("location: index.php");
			}
		}
	}
	?>
</body>

</html>