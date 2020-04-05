<?php
session_start();
include_once 'conexao.php';

$usuarioId = $_GET['usuarioId'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "UPDATE usuarios SET usuario=:usuario, email=:email, senha=:senha WHERE usuarioId=:usuarioId";

$atualizar = $conexao->prepare($sql);

$atualizar->bindParam(':usuario', $usuario);
$atualizar->bindParam(':email', $email);
$atualizar->bindParam(':senha', $senha);
$atualizar->bindParam(':usuarioId', $usuarioId, PDO::PARAM_INT);

$atualizar->execute();

if($atualizar > 0){
  $_SESSION['userAtualiaOk'] = "Cadastro atualizado";
  header('location: usuarios.php');
}else{
    $_SESSION['userAtualiaErro'] = "Erro ao atualizar";
    header('location: usuarios.php');
}
?>
