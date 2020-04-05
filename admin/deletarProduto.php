<?php
session_start();
include_once 'conexao.php';
$produtoId = $_GET['produtoId'];
$sql = $conexao->query("SELECT imagem FROM produtos WHERE produtoId = '$produtoId'");
$produto = $sql->fetch(PDO::FETCH_OBJ);

    if(is_file('Imagens/produtos/'.$produto->imagem)){
      $delete = unlink('Imagens/produtos/'.$produto->imagem);
      if($delete){

$sql = "DELETE FROM produtos WHERE imagem=:imagem";
$delete = $conexao->prepare($sql);
$delete->bindParam(':produtoId', $produtoId, PDO::PARAM_INT);
$delete->execute();
}
}
if($delete == true){
  $sql = "DELETE FROM produtos WHERE produtoId=:produtoId";
  $delete = $conexao->prepare($sql);
  $delete->bindParam(':produtoId', $produtoId, PDO::PARAM_INT);
  $delete->execute();
  $_SESSION['prodDeleteOk'] = "Cadastro deletado";
  header('location: produtos.php');
}else{
    $_SESSION['prodDeleteErro'] = "Erro ao deletar";
    header('location: produtos.php');
}
?>
