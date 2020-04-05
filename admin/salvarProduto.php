<?php
session_start();
require_once 'conexao.php';

$produto = $_POST['produto'];
$codigo = $_POST['codigo'];
$preco = $_POST['preco'];
$imagem = $_FILES['imagem'];
$descricao = $_POST['descricao'];

if(isset($_FILES['imagem'])){
            $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
            $novo_nome = sha1(time()) . $extensao;
            $diretorio = "Imagens/produtos/";
            move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome);

$sql = "INSERT INTO produtos (produto, codigo, preco, imagem, descricao)VALUES(:produto, :codigo, :preco, :imagem, :descricao)";

$cadastrar = $conexao->prepare($sql);

$cadastrar->bindParam(':produto', $produto);
$cadastrar->bindParam(':codigo', $codigo);
$cadastrar->bindParam(':preco', $preco);
$cadastrar->bindParam(':imagem', $novo_nome);
$cadastrar->bindParam(':descricao', $descricao);

$cadastrar->execute();
}
if($cadastrar > 0){
  $_SESSION['prodOk'] = "Cadastro efetuado";
  header('location: produtos.php');
}else{
    $_SESSION['prodErro'] = "Erro no cadastro";
    header('location: produto.php');
}
?>
