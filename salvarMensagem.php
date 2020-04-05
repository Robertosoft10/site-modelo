<?php
session_start();
require_once 'admin/conexao.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$objetivo = $_POST['objetivo'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO contato_msg(nome, email, objetivo, mensagem)VALUES(:nome, :email, :objetivo, :mensagem)";

$cadastrar = $conexao->prepare($sql);

$cadastrar->bindParam(':nome', $nome);
$cadastrar->bindParam(':email', $email);
$cadastrar->bindParam(':objetivo', $objetivo);
$cadastrar->bindParam(':mensagem', $mensagem);

$cadastrar->execute();
if($cadastrar > 0){
  $_SESSION['msgOk'] = "Mensagem Enviada com sucesso";
  header('location: contato.php');
}else{
    $_SESSION['msgErro'] = "Erro no cadastro";
    header('location: contato.php');
}
?>
