<?php
session_start();
require_once 'admin/conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = sha1($_POST['senha']);

$sql = "INSERT INTO usuario_compras(nome, email, senha)VALUES(:nome, :email, :senha)";

$cadastrar = $conexao->prepare($sql);

$cadastrar->bindParam(':nome', $nome);
$cadastrar->bindParam(':email', $email);
$cadastrar->bindParam(':senha', $senha);

$cadastrar->execute();

if($cadastrar > 0){
  $_SESSION['userOk'] = "Cadastro efetuado! Já pede fazer login";
  header('location: login.php');
}
?>
