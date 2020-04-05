<?php
session_start();
require_once 'admin/conexao.php';

$usuario = $_GET['usuario'];
$endereco = $_POST['endereco'];
$formaPag = $_POST['formaPag'];
$parcelas = $_POST['parcelas'];
$ncartao = $_POST['ncartao'];
$cpf = $_POST['cpf'];

$sql = "INSERT INTO pagamentos(usuario, endereco, formaPag, parcelas, ncartao, cpf)VALUES(:usuario, :endereco, :formaPag, :parcelas, :ncartao, :cpf)";

$cadastrar = $conexao->prepare($sql);

$cadastrar->bindParam(':usuario', $usuario);
$cadastrar->bindParam(':endereco', $endereco);
$cadastrar->bindParam(':formaPag', $formaPag);
$cadastrar->bindParam(':parcelas', $parcelas);
$cadastrar->bindParam(':ncartao', $ncartao);
$cadastrar->bindParam(':cpf', $cpf);

$cadastrar->execute();

if($cadastrar > 0){
  $_SESSION['compraOk'] = "Compra finalizada com sucesso! Pode acessar seu carrinho";
  header('location: index.php');
}else{
    $_SESSION['compraErro'] = "Erro no cadastro";
    header('location: comparar.php');
}

?>
