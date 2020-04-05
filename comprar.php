<?php
session_start();
include_once 'admin/conexao.php';
//pedido
  $sql = $conexao->query("SELECT * FROM pedidos PD JOIN produtos PT ON PD.produto_cod= PT.produtoId JOIN usuario_compras UC ON PD.cliente_cod= UC.usuarioId");
$pedido = $sql->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>AGRO Produtos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/folha_style.css">
  </head>
  <body>
    <div class="container pt-5 pb-4">
			<div class="row justify-content-between">
				<div class="col-md-8 order-md-last">
					<div class="row">
						<div class="col-md-6 text-center">
							<a class="navbar-brand" href="">AGRO<span>Produtos</span></a>
						</div>
            <?php if(isset($_SESSION['fimPedido'])){ ?>
              <small id="loginAcerto"><?php echo $_SESSION['fimPedido'];?></small>
              <?php unset($_SESSION['fimPedido']); } ?>
            <div class="col-md-12" id="login-link">
              <?php
              $usuario = $_SESSION['usuarioId'];
              if(isset($_SESSION['usuarioId'])) {
              echo $_SESSION['nome'];?>
            <a href="logout.php">Sair</a>
            <?php }else{?>
            <a href="login.php">Login</a>
            <a href="login.php">Cadastre-Se</a>
          <?php } ?>
          </div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid">
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav m-auto">
	        	<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="produtos.php" class="nav-link">Produtos</a></li>
	          <li class="nav-item"><a href="contato.php" class="nav-link">Contato</a></li>
            <?php
            if(isset($_SESSION['usuarioId'])) {
            echo $_SESSION['nome'];?>
          <a href="logout.php">Sair</a>
          <?php }else{?>
          <a href="login.php">Login</a>
          <a href="login.php">Cadastre-Se</a>
        <?php } ?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Finalizar minha Compra</h1>
          </div>
        </div>
      </div>
    </section>
    <hr>
    <div class="row no-gutters">
      <div class="col-md-12">
        <div class="contact-wrap w-100 p-md-5 p-4">
          <h3 class="mb-4">Finalizar Compra</h3>
          <div class="col-md-12 text-right">
            <a class="btn btn-primary" href="cancelarCompra.php?cliente_cod=<?= $pedido->cliente_cod;?>">Concelar Compra</a>
          </div>
          <h4>Valor da Compra: R$ <?php echo number_format($pedido->somaValor, 2, ',', '.');?></h4>

        <div id="form-message-warning" class="mb-4"></div>
        <form action="salvarCompra.php?usuario=<?= $usuario;?>" method="POST" id="contactForm" name="contactForm" class="contactForm">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="label" for="name">Endereço *</label>
                <input type="text" class="form-control" name="endereco" id="name" placeholder="Endereço para Entrega">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="label" for="email">Forma de Pagamento *</label>
                <select type="text" class="form-control" name="formaPag" id="email">
                  <option></option>
                  <option value="c">Cartão</option>
                  <option value="b">Boleto</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="label" for="subject">Total de Percelas *</label>
                <select type="text" class="form-control" name="parcelas" id="subject">
                  <option></option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                  <option>10</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="label" for="name">Nº  Cartão</label>
                <input type="text" class="form-control" name="ncartao" id="name" placeholder="Sendo no cartão, digite o nº aqui">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="label" for="name">Cpf *</label>
                <input type="text" class="form-control" name="cpf" id="name" placeholder="Digite seu cpf">
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <input type="submit" value="Finalizar Compra" class="btn btn-primary">
                <div class="submitting"></div>
              </div>
            </div>
          </div>
        </form>
                </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </section>
    <hr>
    <section class="ftco-intro bg-primary py-5">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="col-md-6">
						<h2>Entre em contato conosco</h2>
					</div>
					<div class="col-md-5 text-md-right">
						<span class="contact-number">+00(123) 375-45-04</span>
					</div>
				</div>
			</div>
		</section>
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg">
            <div class="ftco-footer-widget mb-4">
            </div>
          </div>
          <div class="col-md-6 col-lg">
            <div class="ftco-footer-widget mb-4 ml-md-5">
            </div>
          </div>
          <div class="col-md-6 col-lg">
            <div class="ftco-footer-widget mb-4">
            </div>
          </div>
          <div class="col-md-6 col-lg">
             <div class="ftco-footer-widget mb-4">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="" target="_blank"></a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

  </body>
</html>
