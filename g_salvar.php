<?php
session_start();
require_once "usuarios.php";
$us = new Usuario;

$email = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);
$user = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
$usersocialname = filter_input(INPUT_POST, 'userfistname', FILTER_SANITIZE_STRING);
$senha = '0000';

//salvano as informa��es na base de dados
$verificador = $us->cadastro($user, $senha, $usersocialname, $email, '99999999999', 'nao', 'nao', 'google');
if($verificador !== false){
	$_SESSION['carregar'] = true;
	$_SESSION['Guser'] = $email;
	$_SESSION['Gsenha']= $senha;
	$verificado = $us->logarGoogle($email, $senha);
	if($verificado == true){
		echo "areaprivada.php";
	}
}
else{
	$_SESSION['carregar'] = true;
	$_SESSION['Guser'] = $email;
	$_SESSION['Gsenha']= $senha;
	$_SESSION['logando'] = true;
	$_SESSION['login'] = true;
	$verificado = $us->logarGoogle($email, $senha);
	if($verificado == true){
		echo "areaprivada.php";
	}
}
?>