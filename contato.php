<?php
session_start();
include_once 'admin/conexao.php';
$sql = $conexao->query("SELECT * FROM contato_msg");
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
            <?php if(isset($_SESSION['msgOk'])){ ?>
              <small id="loginAcerto"><?php echo $_SESSION['msgOk'];?></small>
              <?php unset($_SESSION['msgOk']); } ?>

              <?php if(isset($_SESSION['msgErro'])){ ?>
                <small id="loginErro"><?php echo $_SESSION['msgErro'];?></small>
                <?php unset($_SESSION['msgErro']); } ?>
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

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Nosso Contato</h1>
          </div>
        </div>
      </div>
    </section>
    <hr>
    <div class="row no-gutters">
      <div class="col-md-7">
        <div class="contact-wrap w-100 p-md-5 p-4">
          <h3 class="mb-4">Fale conosco</h3>
          <div id="form-message-warning" class="mb-4"></div>
          <form action="salvarMensagem.php" method="POST" id="contactForm" name="contactForm" class="contactForm">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="label" for="name">Seu Nome *</label>
                  <input type="text" class="form-control" name="nome" id="name" placeholder="Name" required="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="label" for="email">Seu E-mail *</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email"  required="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="label" for="subject">Qual seu Objetivo ?</label>
                  <input type="text" class="form-control" name="objetivo" id="subject" placeholder="Objetivo">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="label" for="#">Sua Messagem *</label>
                  <textarea name="mensagem" class="form-control" id="message" cols="30" rows="4" placeholder="Mensagem"  required=""></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <input type="submit" value="Enviar Mensagem" class="btn btn-primary">
                  <div class="submitting"></div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-5 d-flex align-items-stretch">
        <div class="info-wrap w-100 p-5 img" style="background-image: url(images/about.jpg);">
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  </div>
  </section>
  <hr>
  <table class="table table-hover " id="dataTables-example">
  <tr>
    <?php while($msg = $sql->fetch(PDO:: FETCH_OBJ)){ ?>
      <td>
        Nome: <?php echo $msg->nome;?><br>
        Mensagem: <?php echo $msg->mensagem;?>
      </td>
  </tr>
<?php } ?>
  </table>
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
