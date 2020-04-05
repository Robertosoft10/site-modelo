<?php
session_start();
  $codCliente = $_SESSION['usuarioId'];

if(@count($_SESSION['produtoSession']) == 0){
 }else{
 $somaValor = 0;
 require_once 'admin/conexao.php';
 foreach($_SESSION['produtoSession'] as $produtoId => $qtdProduto){
   $sqlProduto = $conexao->query("SELECT * FROM produtos WHERE produtoId = '$produtoId'");
   $linhaP = $sqlProduto->fetch(PDO::FETCH_OBJ);
   $subTotal = $linhaP->preco * $qtdProduto;
   $somaValor += $linhaP->preco * $qtdProduto;
 }
}
          foreach($_SESSION['produtoSession'] as $produtoId => $qtdProduto){

                      $sql = "INSERT INTO pedidos(cliente_cod, produto_cod, qtdProduto, somaValor)
                    VALUES(:codCliente, :produtoId, :qtdProduto, :somaValor)";
                       $cadastro = $conexao->prepare($sql);
                       $cadastro->bindParam(':codCliente', $codCliente);
                       $cadastro->bindParam(':produtoId', $produtoId);
                       $cadastro->bindParam(':qtdProduto', $qtdProduto);
                       $cadastro->bindParam(':somaValor', $somaValor);
                       $cadastro->execute();
                       $_SESSION['fimPedido'] = "Pedido realizado com sucesso!";
                       header('location: comprar.php');
                      }

    ?>
