<?php
session_start();
include_once 'conexao.php';
$sql = $conexao->query("SELECT * FROM usuarios");
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
                            <h1 class="page-header">Usuário</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                          <?php if(isset($_SESSION['userOk'])){ ?>
                          <h4> <?php echo $_SESSION['userOk']; ?> </h4>
                          <?php unset($_SESSION['userOk']); }?>

                          <?php if(isset($_SESSION['userErro'])){ ?>
                          <h4> <?php echo $_SESSION['userErro']; ?> </h4>
                          <?php unset($_SESSION['userErro']); }?>

                          <?php if(isset($_SESSION['userAtualiaOk'])){ ?>
                          <h4> <?php echo $_SESSION['userAtualiaOk']; ?> </h4>
                          <?php unset($_SESSION['userAtualiaOk']); }?>

                          <?php if(isset($_SESSION['userAtualiaErro'])){ ?>
                          <h4> <?php echo $_SESSION['userAtualiaErro']; ?> </h4>
                          <?php unset($_SESSION['userAtualiaErro']); }?>

                          <?php if(isset($_SESSION['userDeleteOk'])){ ?>
                          <h4> <?php echo $_SESSION['userDeleteOk']; ?> </h4>
                          <?php unset($_SESSION['userDeleteOk']); }?>

                          <?php if(isset($_SESSION['userDeleteErro'])){ ?>
                          <h4> <?php echo $_SESSION['userDeleteErro']; ?> </h4>
                          <?php unset($_SESSION['userDeleteErro']); }?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                   Formulário para cadastro de usuário
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form" action="salvarUsuario.php"  method="post">
                                                <div class="form-group">
                                                    <label>Nome: </label>
                                                    <input type="text" class="form-control" name="usuario"  required="">
                                                </div>
                                                <div class="form-group col-xs-6">
                                                    <label>E-mail: </label>
                                                    <input type="email" class="form-control"  name="email">
                                                </div>
                                                <div class="form-group col-xs-6">
                                                    <label>Senha:  </label>
                                                    <input class="form-control" type="password" name="senha"  required="">
                                                </div>
                                                <button type="submit" class="btn btn-success">Cadastrar</button>
                                                <button type="reset" class="btn btn-danger">Cancelar</button>
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
            <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                   Lista de Usuários
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Usuário</th>
                                                    <th>E-mail</th>
                                                    <th id="btn-acao"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while($usuario = $sql->fetch(PDO::FETCH_OBJ)){ ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $usuario->usuario;?></td>
                                                    <td><?php echo $usuario->email;?></td>
                                                    <td>
                                                      <a href="alterarUsuario.php?usuarioId=<?= $usuario->usuarioId;?>">
                                                      <button class="btn btn-warning">Editar</button></a>
                                                       <a href="deletarUsuario.php?usuarioId=<?= $usuario->usuarioId;?>">
                                                       <button class="btn btn-danger">Excluir</button></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                           </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
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
