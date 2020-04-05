<?php
session_start();
include_once 'scripts/conexao.php';

$cliente_cod = $_GET['cliente_cod'];
$sql = "DELETE FROM pedidos WHERE cliente_cod=:cliente_cod";

$delete = $conexao->prepare($sql);
$delete->bindParam(':cliente_cod', $cliente_cod, PDO::PARAM_INT);

$delete->execute();

if($delete == true){
  $_SESSION['pedidoDeleteOk'] = "Pedido deletedo";
  header('location: pedido.php');
}else{
    $_SESSION['pedidoDeleteErro'] = "Erro ao deletar";
    header('location: pedido.php');
}
?>
