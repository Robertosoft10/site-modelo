<?php
include_once 'conexao.php';

$produtoId = $_GET['produtoId'];
$produto = $_POST['produto'];
$codigo = $_POST['codigo'];
$preco = $_POST['preco'];
$imagem = $_FILES['imagem'];
$descricao = $_POST['descricao'];

$sql = $conexao->query("SELECT * FROM produtos WHERE produtoId = '$produtoId'");
while($produto = $sql->fetch(PDO::FETCH_OBJ)){
    $foto_db  = $produto->imagem;
}
unlink("Imagens/produtos/$foto_db");

if(isset($_FILES['imagem'])){
    $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
    $novo_nome = sha1(time()) . $extensao;
    $diretorio = "Imagens/produtos/";
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome);

$sql = "UPDATE produtos SET produto=:produto, codigo=:codigo, preco=:preco, imagem=:imagem, descricao=:descricao WHERE usuarioId=:usuarioId";

$atualizar = $conexao->prepare($sql);

$atualizar->bindParam(':produto', $produto);
$atualizar->bindParam(':codigo', $codigo);
$atualizar->bindParam(':preco', $codigo);
$atualizar->bindParam(':imagem', $novo_nome);
$atualizar->bindParam(':descricao', $descricao);
$atualizar->bindParam(':produtoId', $produtoId, PDO::PARAM_INT);

$atualizar->execute();
}
if($atualizar > 0){
  $_SESSION['prodAtualiaOk'] = "Cadastro atualizado";
  header('location: produtos.php');
}else{
    $_SESSION['prodAtualiaErro'] = "Erro ao atualizar";
    header('location: produtos.php');
}
?>
