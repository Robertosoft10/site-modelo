<?php
session_start();
include_once 'conexao.php';

$mensagemId = $_GET['mensagemId'];
$sql = "DELETE FROM contato_msg WHERE mensagemId=:mensagemId";

$delete = $conexao->prepare($sql);
$delete->bindParam(':mensagemId', $mensagemId, PDO::PARAM_INT);

$delete->execute();

if($delete == true){
  $_SESSION['msgDeleteOk'] = "Cadastro deletedo";
  header('location: mensagemSite.php');
}else{
    $_SESSION['msgDeleteErro'] = "Erro ao deletar";
    header('location: usuarimensagemSite.php');
}
?>
