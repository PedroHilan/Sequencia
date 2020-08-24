<?php   
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

	<title>Sequência Didática</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body>

	<!--header start here -->
	<nav class="navbar navbar-light bg-light" style="">
		<a class="navbar-brand" href="#">
			<img src="../frontend/img/logo2.png" width="40%" alt="">
		</a>
	</nav>
	<div style="background-color: #ea7b00; padding: 0.2%;">

	</div>

	<!--header end here-->

	<section >
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="../../Controller/C_Login.php">
						<span class="login100-form-title">
							Realize seu Login
						</span>
						<?php
						if(isset($_SESSION['msgerro'])){
							echo $_SESSION['msgerro'];
							$_SESSION['msgerro'] = null;
						}else if(isset($_SESSION['alert_professor'])){
							echo $_SESSION['alert_professor'];
							$_SESSION['alert_professor'] = null;
						}else{}
						?>
						<div class="wrap-input100 validate-input m-b-16" data-validate="Por favor insira um email válido">
							<input class="input100" type="text" name="email" placeholder="Login" id="email">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Por favor insira uma senha válida">
							<input class="input100" type="password" name="pass" placeholder="*******">
							<span class="focus-input100"></span>
						</div>

						<br>

						<div class="container-login100-form-btn">
							<button type="submit" class="login100-form-btn">
								Logar
							</button>
						</div>

						<div class="flex-col-c p-t-70 p-b-10">

							<a href="cadastro/index.php" class="txt3">
								Realize seu Cadastro
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<div style="background-color: #ea7b00; padding: 0.2%;">
		
	</div>
	<footer style="background-color: white; color: black;">
		<p class="text-center">© Copyright 2019 Crede 07 - All rights reserved.</p>
	</footer>
	
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!--===============================================================================================-->
	<script type="text/javascript">
		email = document.getElementById('email');
		email.value = "";
		email.focus();
	</script>

</body>
</html>