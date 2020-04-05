<?php
session_start();
include_once 'conexao.php';

$usuarioId = $_GET['usuarioId'];
$sql = "DELETE FROM usuarios WHERE usuarioId=:usuarioId";

$delete = $conexao->prepare($sql);
$delete->bindParam(':usuarioId', $usuarioId, PDO::PARAM_INT);

$delete->execute();

if($delete == true){
  $_SESSION['userDeleteOk'] = "Cadastro deletedo";
  header('location: usuarios.php');
}else{
    $_SESSION['userDeleteErro'] = "Erro ao deletar";
    header('location: usuarios.php');
}
?>
