<?php 
include '../../../Model/M_Professor.php';

session_start();
$professor = new M_Professor("", "", "", "", "","");
$result = $professor->escolas();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastre - se</title>
	<meta charset="utf-8">
	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
	
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
	<!--===============================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
	<!--===============================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
	<!--===============================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
	<!--===============================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<!--header start here -->
	<nav class="navbar navbar-light bg-light" style="">
		<a class="navbar-brand" href="#">
			<img src="../../frontend/img/logo2.png" width="40%" alt="">
		</a>
	</nav>
	<div style="background-color: #ea7b00; padding: 0.2%;">

	</div>

	<section >
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="../../../Controller/C_Professor.php">
						<span class="login100-form-title">
							Realize seu Cadastro
						</span>
						<?php
						if(isset($_SESSION['alert_professor'])){
							echo $_SESSION['alert_professor'];
							$_SESSION['alert_professor'] = null;
						}else{}
						?>
						<div class="wrap-input100 validate-input m-b-16" data-validate="Por favor insira um email válido">
							<input class="input100" type="text" name="nome" placeholder="Nome completo" required>
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-16" data-validate="Por favor insira um cpf válido">
							<input class="input100" type="text" name="cpf" placeholder="CPF" required>
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-16" data-validate="Por favor insira um telefone válido">
							<input class="input100" type="text" name="telefone" placeholder="Telefone" required>
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-16" data-validate="Por favor insira um email válido">
							<input class="input100" type="text" name="email" placeholder="Email" required>
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-16" data-validate = "Por favor insira uma senha válida">
							<input class="input100" type="password" name="pass" placeholder="Senha" required>
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Por favor insira uma senha válida">
							<input class="input100" type="password" name="passconf" placeholder="Confirme sua senha" required>
							<span class="focus-input100"></span>
						</div>
						
						<br>
						<div class="wrap-input100 validate-input" data-validate = "">
							
							<select id="inputArea" class="input100" name="idescola">
								<div class="input100">
									<?php while ($dados = mysqli_fetch_assoc($result)) { ?>
									<option style="font-size: 180%;" value="<?php echo $dados['esc_id'];?>"> <?php echo $dados['esc_nome'];?> </option>	
								<?php	} ?> 
								</div>
								
								
							</select>
							<span class="focus-input100"></span>
						</div>
					</br>
					<div class="wrap-input100 validate-input">
						<input type="checkbox" required>
						<label class="form-check-label" for="exampleCheck1">Li e aceito <a href="../../termos.pdf" target="_blank">os termos</a>...</label>
					</div>
					<br>

					<div class="container-login100-form-btn">
						<button type="submit" name="precadastrar" class="login100-form-btn">
							Entrar
						</button>
					</div>
				</br>
				<div class="flex-col-c p-b-40">

					<a href="../index.php" class="txt3">
						Cancelar
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

<!--===============================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================-->
<script src="js/main.js"></script>
<!--===============================-->
</body>
</html>