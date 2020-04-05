<?php
session_start();
include_once 'conexao.php';
$produtoId = $_GET['produtoId'];
$sql = $conexao->query("SELECT * FROM produtos WHERE produtoId = '$produtoId'");
$produto = $sql->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Cadastro de Produtos</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
         <link href="css/style.css" rel="stylesheet">

    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">Cadastro de Produtos</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <ul class="dropdown-menu dropdown-user">
                            <li class="divider"></li>
                            <li>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">

                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="produtos.php" class="active"> Produtos</a>
                            </li>
                            <li>
                                <a href="usuarios.php" class="active"> Usuários</a>
                            </li>
                            <li>
                                <a href="logout.php" class="active"> Sair</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Produtos</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                   Formulário para alterar dados do produto
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form" action="atualizarProduto.php?produtoId=<?= $produto->produtoId;?>"  method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Produto: </label>
                                                    <input type="text" class="form-control" name="produto"
                                                    value="<?php echo $produto->produto;?>">
                                                </div>
                                                <div class="form-group col-xs-4">
                                                    <label>Código: </label>
                                                    <input type="number" class="form-control"  name="codigo"
                                                    value="<?php echo $produto->codigo;?>">
                                                </div>
                                                <div class="form-group col-xs-4">
                                                    <label>Preço:  </label>
                                                    <input class="form-control" type="number" name="preco"
                                                    value="<?php echo $produto->preco;?>">
                                                </div>
                                                <div class="form-group col-xs-4">
                                                    <label>Imagem:  </label>
                                                    <input class="form-control" type="file" name="imagem" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Descrição: </label>
                                                    <textarea type="text" class="form-control" name="descricao" rows="3"><?php echo $produto->descricao;?></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success">Salvar Alterações</button>
                                            </form>
                                        </div>
                            <!-- /.panel .chat-panel -->
                        </div>

                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>

                    </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="js/raphael.min.js"></script>
        <script src="js/morris.min.js"></script>
        <script src="js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>
</html>
