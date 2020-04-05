<?php
session_start();
require 'admin/conexao.php';
$email = $_POST['email'];
$senha =  sha1($_POST['senha']);

if (empty($email) || empty($senha))
{
    $_SESSION['loginVazio'] = "Informe o usuário e a senha, ou faça seu cadastro";
  header('location: login.php');
    exit;
}
$sql = "SELECT * FROM usuario_compras WHERE email = :email AND senha = :senha";
$login = $conexao->prepare($sql);

$login->bindParam(':email', $email);
$login->bindParam(':senha', $senha);
$login->execute();
$result = $login->fetchAll(PDO::FETCH_ASSOC);

if (count($result) <= 0)
{
  $_SESSION['loginIncorreto'] = "Usuário  ou senha incorreto, tente navamente";
  header('location: login.php');
    exit;
}
$result = $result[0];

$_SESSION['logged_in'] = true;
$_SESSION['usuarioId'] = $result['usuarioId'];
$_SESSION['nome'] = $result['nome'];
header('Location: index.php');
?>
