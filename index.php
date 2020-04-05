<?php
 session_start();
 error_reporting(0);
 ini_set("display_errors", 0 );
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
            <?php if(isset($_SESSION['compraOk'])){ ?>
              <small id="loginAcerto"><?php echo $_SESSION['compraOk'];?></small>
              <?php unset($_SESSION['compraOk']); } ?>
            <div class="col-md-12" id="login-link">
                <?php
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
            <?php if(isset($_SESSION['usuarioId'])){?>
             <li class="nav-item"><a href="meuCarrinho.php?usuarioId=<?= $_SESSION['usuarioId'];?>" class="nav-link">Meu Carrinho</a></li>
           <?php }else{?>
              <li class="nav-item"><a href="login.php" class="nav-link">Meu Carrinho</a></li>
            <?php } ?>
            <?php
            if(isset($_SESSION['usuarioId'])) {?>
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
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate">
          	<h2 class="subheading">Bem vindo ao AGRO Produtos</h2>
          	<h1>Ofertando os melhores produtos</h1>
            <p class="mb-4">Para sua plantação</p>
            <p><a href="produtos.php" class="btn btn-primary mr-md-4 py-2 px-4">Produtos <span class="ion-ios-arrow-forward"></span></a></p>
          </div>
        </div>
      </div>
    </div>
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
