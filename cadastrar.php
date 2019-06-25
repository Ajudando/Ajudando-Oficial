<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Ajudando - Cadastro</title>
    <link rel="icon" href="images/ajudinhaicone.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="background">
        <div class="form-cadastro">
            <img src="images/ajudandotitle.png" class="ajudandotitle-cadastro" />
            <h1 class="cadastrotitle">Cadastro</h1>
            <form role="form" class="corpo-form" method="post">
                <div class="form-itens">
                    <label class="label-cadastro">Nome:</label>
                    <input name="nome" type="text" placeholder="Digite seu nome completo" class="inputname" maxlength="90">
                </div>
                <div class="form-itens">
                    <label class="label-cadastro">Senha:</label>
                    <input name="password" type="password" placeholder="Digite sua senha" class="inputname" maxlength="90">
                </div>
                <div class="form-itens">
                    <label class="label-cadastro">Como devemos te chamar?:</label>
                    <input name="socialname" type="text" placeholder="Digite seu nome social" class="inputname" maxlength="90">
                </div>
                <div class="form-itens">
                    <label class="label-cadastro">E-mail:</label>
                    <input name="email" type="email" placeholder="Digite seu email" class="inputname" maxlength="120">
                </div>
                <div class="form-itens">
                    <label class="label-cadastro">Celular:</label>
                    <input name="celular" id="celular" type="text" placeholder="Digite seu numero de celular (COM DDD)" class="inputname">
                </div>
                <div class="form-itens">
                    <label class="checkbox-cadastro">Podemos te contatar por e-mail?
                        <span class="yes-or-no"><input type="radio" value="sim" name="checked1"> Sim ou
                            <input type="radio" value="nao" name="checked1"> Não</span>
                    </label>
                </div>
                <div class="form-itens">
                    <label class="checkbox-cadastro">Podemos te contatar por celular?
                        <span><input type="radio" value="sim" name="checked2"> Sim ou
                            <input type="radio" value="nao" name="checked2"> Não</span>
                    </label>
                </div>
                <div class="form-itens-titulacao">
                    <span>Qual a sua titulação?</span>
                    <select class="titulacao" name="titula">
					<?php
					//exibindo os valores da tabela do bd
					    require_once "usuarios.php";
						$us = new Usuario;
						$receber = $us->pegar("titulacoes");
						$i=0;
						while($receber[0][$i]>$i){
							$valor = $receber[0][$i];
							$str = $receber[1][$i];
							echo "<option value='$valor'>$str</option>";
							$i++;
						}
					?>
                    </select>
                </div>
                <input type="submit" class="btn-cadastro" name="signup" value="Cadastrar">
            </form>
        </div>
<?php
	session_start();
    //verificar se clicou no botão entrar
    if (isset($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $senha = addslashes($_POST['password']);
        $nome_social = addslashes($_POST['socialname']);
        $email = addslashes($_POST['email']);
        $celular = addslashes($_POST['celular']);
        $email_confirma = addslashes($_POST['checked1']);
        $celular_confirma = addslashes($_POST['checked2']);
        $titulacao = (int) addslashes($_POST['titula']);
		
		//$_SESSION['salvar_depois'] = $email;

        //verificar se está campos preenchido
        if (!empty($nome) && !empty($senha) && !empty($nome_social) && !empty($email) && !empty($celular) && !empty($email_confirma) && !empty($celular_confirma) && !empty($titulacao)) {
			$verificar = $us->cadastrar($nome, $senha, $nome_social, $email, $celular, $email_confirma, $celular_confirma, "ajudando", $titulacao);
            if ($verificar !== false){
				$verificador = $us->logar($email, $senha);
                header("location: areaprivada.php");
            } 
			else{
                $msg_not = $us->msg_notify(false, true);
                header("location: index.php");
            }
        } 
		else{
            echo "<div class='modal-error-cadastro'><span>Preencha todos os campos!</span></div>";
        }
	}
?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $("#celular").mask("(00) 00000-0000");
    </script>
</body>

</html>