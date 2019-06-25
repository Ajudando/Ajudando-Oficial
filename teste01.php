<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php
require_once "usuarios.php";
$us = new Usuario;
				
$receber = $us->pegar("informatica");
$i=0;
$var = extract($receber[0]);
var_dump($var);
/*while($receber[0][$var]> $i){
	//echo "<option value='$receber[0][$i]'>$receber[1][1]</option>";
	$teste = $receber[0][$i];
	echo "$teste";
	$i++;
}*/

//$senha = 123456;
/*
$connect = mysqli_connect("remotemysql.com:3306", "TBt55e2fqG", "AndFOXlW4k", "TBt55e2fqG");
$comand_sql = mysqli_query($connect ,"UPDATE clientes SET credito_autor='sim', formatos_id_formatos = 1,informatica_id_informatica = 1,editor_texto_id_editor_texto = 1,editor_apresentacao_id_editor_apresentacao = 1,atividades_imagens_id_atividades_imagens = 1,imagens_videos_id_imagens_videos = 1,multimidia_id_multimidia = 1,disponibiliza_atividades_id_disponibiliza_atividades = 1 WHERE email = 'kleydson122@gmail.com'");
var_dump( $comand_sql);
mysqli_close($connect);

$nome_tabela = "formatos";
$connect = mysqli_connect("remotemysql.com:3306", "TBt55e2fqG", "AndFOXlW4k", "TBt55e2fqG");
$comand_sql = mysqli_query($connect , "SELECT * FROM $nome_tabela");
while($result = mysqli_fetch_array($comand_sql)){
	//var_dump($result);
	echo "</br>";
	echo "</br>";
	var_dump($result[0], $result[1]);
}


if(mysqli_num_rows($comand_sql) == false)
{
	echo "nao foi"; //já tem cadastro
}
else
{
    // caso nao, cadastrar
	$senha_codificada = md5($senha);
	$comand_sql1 = "UPTADE clientes SET formatos_id_formatos = 1,informatica_id_informatica = 1,editor_texto_id_editor_texto = 1,editor_apresentacao_id_editor_apresentacao = 1,atividades_imagens_id_atividades_imagens = 1,imagens_videos_id_imagens_videos = 1,multimidia_id_multimidia = 1,disponibiliza_atividades_id_disponibiliza_atividades = 1 WHERE email = 'kleydson122@gmail.com'";
	mysqli_query($connect, $comand_sql1);
	mysqli_close($connect);
	echo "$comand_sql1";
}	
*/
?>
</body>
</html>