<?php
session_start();
require_once 'conexao.php';

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = sha1($_POST['senha']);

$sql = "INSERT INTO usuarios(usuario, email, senha)VALUES(:usuario, :email, :senha)";

$cadastrar = $conexao->prepare($sql);

$cadastrar->bindParam(':usuario', $usuario);
$cadastrar->bindParam(':email', $email);
$cadastrar->bindParam(':senha', $senha);

$cadastrar->execute();

if($cadastrar > 0){
  $_SESSION['userOk'] = "Cadastro efetuado";
  header('location: usuarios.php');
}else{
    $_SESSION['userErro'] = "Erro no cadastro";
    header('location: usuarios.php');
}
?>
