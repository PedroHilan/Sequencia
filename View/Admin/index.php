<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

include '../../Model/M_Admin.php';
$admin = new M_Admin("", "", "");

#if ($_SESSION['loginadm'] == "Logou") {

#}else{
#  header("location: ../Login/index.php");
#} 

$botao = "Cadastar";
$namebotao = "cadastrar";
$nome = "";
$cnpj = "";
$email = "";
$senha = "";
$telefone = "";
$bairro = "";
$logradouro = "";
$nomelogra = "";
$numero = "";
$id = "";

if (isset($_GET['escid'])) {
  $result = $admin->buscarescolaid($_GET['escid']);
  $vetor = mysqli_fetch_array($result);
  $id = $_GET['escid'];
  $nome = $vetor['esc_nome'];
  $cnpj = $vetor['esc_cnpj'];
  $email = $vetor['esc_email'];
  $senha = $vetor['esc_senha'];
  $telefone = $vetor['esc_telefone'];
  $bairro = $vetor['esc_bairro'];
  $logradouro = $vetor['esc_logradouro'];
  $nomelogra = $vetor['esc_nomelogra'];
  $numero = $vetor['esc_numero'];

  $botao = "Editar";
  $namebotao = "editar";
  
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Sequência Didática</title>
  <link href="../frontend/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="icon" href="favicon2.png" type="image/x-icon" />
  <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko&display=swap" rel="stylesheet">
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body style="background-color: #368302;">
  <div>
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md fundocorpreto sombrafundo" id="sidenav-main">

      <div class="container-fluid fundocorpreto">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><img  width="25" height="25" src="../../assets/img/icons/icon-list.png"></span>
        </button>

        <div class="img111"><a class="" href="gprof.php" style="color: #fff;">
          <img class="img-fluid" src="../frontend/img/logo1.png" >
        </a></div>

        <div class="collapse navbar-collapse" id="sidenav-collapse-main">

          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="./../index.php">
                  <img class="img-fluid" src="../frontend/img/logo2.png" width="">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>

          <ul class="navbar-nav na1" style="font-family: 'Blinker', sans-serif!important;">
             
              <div class="col-12">

                <li class="nav-item">
                  <a class="nav-link" href="pagesAdm/destaque.php" style = "font-size: 110%!important;">
                   <i class="fas fa-search" ></i> Destaques
                 </a>
               </li>

                <li class="nav-item">
                  <a  class="nav-link" href="pagesAdm/gcoord.php" style = "font-size: 110%!important;">
                    <i class="fas fa-chart-line"></i> Gerenciar Coordenador
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="index.php" style = "font-size: 110%!important;">
                    <i class="fas fa-file-upload"></i> Gerenciar Escolas
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="pagesAdm/buscarsequencia.php" style = "font-size: 110%!important;">
                   <i class="fas fa-search" ></i> Buscar Sequência
                 </a>
               </li>

              <li class="nav-item">
               <a class="nav-link" href="#" data-toggle="modal" data-target="#modalsair" style = "font-size: 110%!important;">
                <i class="fas fa-sign-out-alt"></i> Sair
              </a>
            </li>
          </div>

        </ul>
        <hr class="my-3">

      </div>
    </div>
  </nav>

  <div  class="main-content">

    <div class="fundocolorx">
     <div class="text-center">
       <img class="img-fluid" src="../frontend/img/gescola1.png" width="70%">
     </div>
   </div> 

   <div class="container-fluid " style="background-color: #f3f3f3;">
    <div class="row">  
      
      <div class="col-xl-12 order-xl-2">
       <br><br>

       <h3 class="text-center" style="font-family: 'Teko', sans-serif; font-size:180%;" >Cadastro e Gerenciamento</h3>
       <br>
       <?php
      if (isset($_SESSION['alert_admin'])) {
        echo $_SESSION['alert_admin'];
        $_SESSION['alert_admin'] = null;
      }
      ?>
       <br>
       <form method="POST" action="../../Controller/C_Admin.php" enctype="multipart/form-data" class="appointment-form">
        <div style="font-family: 'Teko', sans-serif;">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label style="font-size:200%;" for="inputDataAula">Nome da Escola:</label>
              <input style="font-size: 180%;" type="text" name="nomeesc" class="form-control" id="" placeholder="Ex:E.E.M Nome da escola" required value="<?php echo $nome?>">

              <input type="hidden" name="escid" value="<?php echo $id?>">
            </div>

            <div class="form-group col-md-6">
              <label style="font-size:200%;" for="inputDuracao">CNPJ:</label>
              <input style="font-size: 180%;" type="text" name="cnpj" class="form-control" id="cnpj" placeholder="00.000.000/0000-00" required value="<?php echo $cnpj?>">
            </div>


          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label style="font-size:200%;" for="inputEspecificacao">Email:</label>
              <input style="font-size: 180%;"  type="email" name="email" class="form-control" id="inputEmail3" placeholder="escola@gmail.com" required value="<?php echo $email?>">
            </div>

            <div class="form-group col">
              <label style="font-size:200%;" for="inputArea">Senha:</label>
              <input style="font-size: 180%;"  type="password" name="senha" class="form-control" id="inputPassword3" placeholder="********" required value="<?php echo $senha?>">
            </div>

            <div class="form-group col py-5">
              <button class="btn" type="button" id="showPassword" ><i class="fas fa-eye"></i></button>
            </div>

          </div>

          <div class="form-row">
           <div class="form-group col-md-6">
            <label style="font-size:200%;" for="inputDesc">Telefone:</label>
            <input style="font-size: 180%;"  type="text" name="telefone" class="form-control" id="telefone" placeholder="(00) 0000-0000" required value="<?php echo $telefone?>">
          </div>

          <div class="form-group col-md-6">
            <label style="font-size:200%;" for="inputDesc">Bairro:</label>
            <input style="font-size: 180%;"  type="text" name="bairro" class="form-control" id="" placeholder="Ex:Bela Vista" required value="<?php echo $bairro?>">
          </div>
        </div>

        <div class="form-row">
         <div class="form-group col-md-5">
          <label style="font-size:200%;" for="inputDesc">Logradouro:</label>
          <input style="font-size: 180%;"  type="text" name="logradouro" class="form-control" id="" placeholder="Ex:Rua" required value="<?php echo $logradouro?>">
        </div>

        <div class="form-group col-md-5">
          <label style="font-size:200%;" for="inputDesc">Nome Logradouro:</label>
          <input style="font-size: 180%;"  type="text" name="nomelogra" class="form-control" id="" placeholder="Ex:Travessa Fortaleza" required value="<?php echo $nomelogra?>">
        </div>

        <div class="form-group col-md-2">
          <label style="font-size:200%;" for="inputDesc">Número:</label>
          <input style="font-size: 180%;"  type="number" name="numero" class="form-control" id="" placeholder="Ex:277" required value="<?php echo $numero?>">
        </div>
      </div>

      <div class="container">
          <div class="col-12">
            <div class="form-row">
            <div class="col-6">
            <div class="form-group ml-md-4 text-center">
              <input type="submit" value="<?php echo $botao?>" style="font-size: 140%;" name="<?php echo $namebotao?>" class="btn btn-success py-3 px-4">
            </div>
            </div>
            <div class="col-6">
              <div class="form-group ml-md-4 text-center">
              <a href="index.php"><input type="button" value="Limpar" style="font-size: 140%;" name="" class="btn btn-warning py-3 px-4"></a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <hr>
  <br><br>
  <div class="col-xl-12 order-xl-2">
   <br><br>
   <form method="POST" id="form-pesquisa" action="#">
    <div style="font-family: 'Teko', sans-serif;">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label style="font-size:200%;" for="inputEstado">Nome da Escola</label>
          <input style="font-size:180%;" type="text" class="form-control" id="pesquisa" name="pesquisa" placeholder="Pesquise aqui...">
        </div>

        <div class="form-group col-md-6">
         <table class="table table-striped table-responsive">
          <thead>
            <tr>
              <th style="font-size:80%;" scope="col">Editar</th>
              <th style="font-size:80%;" scope="col">Escola</th>
              <th style="font-size:80%;" scope="col">Cnpj</th>
            </tr>
          </thead>
          <tbody class="resultado">

          </tbody>
        </table>
      </div>


    </div>
  </div>
</form>
<footer class="footer" style="background-color: #f3f3f3;">
  <div class="row align-items-center justify-content-xl-between">
    <div class="">
     <div class=""  style="color: #0a0a0a !important;">
      <div class="col-12">
        <p class="text-muted text-center">© Copyright 2019 Crede 07 - All rights reserved. <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalExemplo">
  Desenvolvedores
</button></p>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="">
      <div class="modal-header">
      </div>
        <img class="img-fluid" src="../frontend/img/DESENVOLVEDORES.png" >
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
       
      </div>
    </div>
  </div>
</div>

</div>
</footer>
</div>
</div>
</div>
</div>



</div>
</div>
</div>


<div class="modal" tabindex="-1" role="dialog" id="modalsair">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container-fluid text-center">
          <img src="../img/logoestado1.png"> </br>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Deseja mesmo sair?</p>
      </div>
      <div class="modal-footer">
        <a href="../../Controller/C_Deslogar.php">
          Sair
        </a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<script src="../frontend/js/jquery-3.4.1.min.js"></script>
<script src="../frontend/js/jquery.min.js"></script>
<script src="../frontend/js/jquery.counterup.min.js"></script>
<script src="../frontend/js/jquery.countdown.min.js"></script>
<script src="../frontend/js/jquery.mask.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#dataNacimento').mask('00/00/0000');
    $('#cpf').mask('000.000.000-00');
    $('#cnpj').mask('00.000.000/0000-00');
    $('#cep').mask('00000-000');
    $('#telefone').mask('(00) 0000-0000');
  });
</script>

<script>
  $(function(){
    $("#pesquisa").keyup(function(){
      //pegar valor do campo pesquisa
      var pesquisa = $(this).val();
      //verificar se há algo digitado
      if (pesquisa != '') {
        var dados = {
          palavra : pesquisa
        }
        $.post('../../Controller/C_Buscarescola.php', dados, function(retorna){
          $(".resultado").html(retorna);
        });  
      }
    });
  });
</script>

<script src="../frontend/js/popper.js"></script>
<script src="../frontend/js/popper.js"></script>
<script src="../frontend/js/animate-in.js"></script>
<script src="../frontend/js/bootstrap.min.js"></script>
<script src="../frontend/js/bootstrap-notify.min.js"></script>
<script src="../frontend/js/waypoints.min.js"></script>
<script src="../frontend/js/owl.carousel.min.js"></script>
<script src="../frontend/js/parallax.min.js"></script>
<script src="../frontend/js/wow.min.js"></script>
<script src="../frontend/js/main.js"></script>
<script type="../frontend/js/smooth-scroll.js"></script>

<script src="../frontend/vendor/select2/select2.min.js"></script>

<script>
  $(document).ready(function(){

    $('#showPassword').on('click', function(){

      var passwordField = $('#inputPassword3');

      var passwordFieldType = passwordField.attr('type');

      if(passwordFieldType == 'password')
      {

        passwordField.attr('type', 'text');

        $(this).val('Hide');
      } else {

        passwordField.attr('type', 'password');

        
        $(this).val('Show');
      }
    });
  });
</script>

</body>
</html>