<?php
class Usuario
{		
	public function msg_notify($valor, $mostrar){
		$_SESSION['tentativa_cadastro'] = $mostrar;
		if($valor !== false){
			$_SESSION['mensagem'] = $valor;
		}
		else{
			$_SESSION['mensagem'] = $valor;
		}
	}
	
	public function cadastrar($nome, $senha, $nome_social, $email, $celular, $contato_email, $contato_celular, $social, $titulacao)
	{
		//verificar se já existe cadastro
		$connect = mysqli_connect("remotemysql.com:3306", "TBt55e2fqG", "AndFOXlW4k", "TBt55e2fqG");
		$comand_sql = mysqli_query($connect ,"SELECT * FROM clientes WHERE email = '{$email}'");
		if(mysqli_num_rows($comand_sql) == true)
		{
			return false; //já tem cadastro
		}
		else
		{
		    // caso nao, cadastrar
			$senha_codificada = md5($senha);
			$_SESSION['sen'] = $senha_codificada;
			if(isset($titulacao)){
				$comand_sql1 = "INSERT INTO clientes (nome, senha, nome_social, email, contato_email, celular, contato_celular, social, titulacao_id_titulacao) 
			VALUES ('$nome', '$senha_codificada', '$nome_social', '$email', '$contato_email', '$celular', '$contato_celular', '$social', '$titulacao')";
			}
			else{
				$comand_sql1 = "INSERT INTO clientes (nome, senha, nome_social, email, contato_email, celular, contato_celular, social) 
			VALUES ('$nome', '$senha_codificada', '$nome_social', '$email', '$contato_email', '$celular', '$contato_celular', '$social')";
			}
			mysqli_query($connect, $comand_sql1);
			mysqli_close($connect);
			return true;
		}	
	}
	
	public function finalizar($credito_autor, $formatos, $informatica, $edi_texto, $edi_apresen, $ativi_image, $image_video, $multimidia, $disp_ativi, $ativi_acad)
	{
		$connect = mysqli_connect("remotemysql.com:3306", "TBt55e2fqG", "AndFOXlW4k", "TBt55e2fqG");
		$email = $_SESSION['salvar_depois'];
		$comand_sql = mysqli_query($connect ,"SELECT * FROM clientes WHERE email = '{$email}'");
		if(mysqli_num_rows($comand_sql) == true)
		{
			$comand_sql1 = "UPDATE clientes SET credito_autor='$credito_autor', formatos_id_formatos = $formatos,informatica_id_informatica = $informatica,editor_texto_id_editor_texto = $edi_texto,editor_apresentacao_id_editor_apresentacao = $edi_apresen,atividades_imagens_id_atividades_imagens = $ativi_image,imagens_videos_id_imagens_videos = $image_video,multimidia_id_multimidia = $multimidia,disponibiliza_atividades_id_disponibiliza_atividades = $disp_ativi, atividades_academicas_id_atividades_academicas = $ativi_acad WHERE email = '$email'";
			mysqli_query($connect, $comand_sql1);
			mysqli_close($connect);
			return true;
		}
		else{
			return false;
		}
	}
	
	public function logar($email, $senha)
	{
		//verificar se o email e senha estao cadastrados
		$connect = mysqli_connect("remotemysql.com:3306", "TBt55e2fqG", "AndFOXlW4k", "TBt55e2fqG");
		$senha_codificada = md5($senha);
		$comand_sql = mysqli_query($connect , "SELECT * FROM clientes");
		while($result = mysqli_fetch_array($comand_sql))
		{
			$usu = $result["email"];
			$sen = $result["senha"];
			$name = $result["nome_social"];
			$social = $result["social"];
			if($email == $usu and $sen == $senha_codificada)
			{
				//Entrar no sistema 
				$_SESSION['nome'] = $name;
				$_SESSION['social'] = $social;
				$_SESSION['login'] = true;
				mysqli_close($connect);
				return true; //Logado com sucesso 
				break;
			}
		}
	}
	
	public function logarGoogle($email, $senha)
	{
		//verificar se o email e senha estao cadastrados
		$connect = mysqli_connect("remotemysql.com:3306", "TBt55e2fqG", "AndFOXlW4k", "TBt55e2fqG");
		$senha_codificada = md5($senha);
		$comand_sql = mysqli_query($connect , "SELECT * FROM clientes");
		while($result = mysqli_fetch_array($comand_sql))
		{
			$usu = $result["email"];
			$sen = $result["senha"];
			$name = $result["nome_social"];
			$social = $result["social"];
			if($email == $usu and $sen == $senha_codificada)
			{
				//Entrar no sistema
				$_SESSION['nome'] = $name;
				$_SESSION['social'] = $social;
				$_SESSION['login'] = true;
				mysqli_close($connect);
				return true; //Logado com sucesso 
				break;
			}
		}
	}
	
	//metodo para pegar e retornas informações das tabelas inferiores
	public function pegar($nome_tabela){
		//entrando no bd
		$connect = mysqli_connect("remotemysql.com:3306", "TBt55e2fqG", "AndFOXlW4k", "TBt55e2fqG");
		//selecionando a tabela
		$comand_sql = mysqli_query($connect , "SELECT * FROM $nome_tabela");
		$cont = 0;
		//loop para extrair as informaçoes de dentro da tabela
		while($result = mysqli_fetch_array($comand_sql)){
			$retorno1[$cont] = $result[0];
			$retorno2[$cont] = $result[1];
			$cont++;
		}
		//retornando uma matriz contendo a informaçao da tabela
		return array($retorno1, $retorno2);
		mysqli_close($connect);
	}

	public function esqueci($email)
	{
		$connect = mysqli_connect("remotemysql.com:3306", "TBt55e2fqG", "AndFOXlW4k", "TBt55e2fqG");
		$comand_sql = mysqli_query($connect ,"SELECT * FROM clientes WHERE email = '{$email}'");

		while($result = mysqli_fetch_array($comand_sql))
		{
			$usu = $result["email"];
			if($usu == $email)
			{
				//$erro[] = "O e-mail informado não existe no banco de dados.";

				$novasenha = substr(md5(time()), 0, 6);

				$senha_codificada = md5($novasenha);

				$sql_code = mysqli_query($connect ,"UPDATE clientes SET senha = '$senha_codificada' WHERE email = '$email'");

				mysqli_close($connect);
				return $novasenha;
				break;
			}
		}
	}
	
}

?>