<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

include '../../../Model/M_Plano.php';
$plano = new M_Plano("", "");

if ($_SESSION['logincoo'] == "Logou") {

}else{
  header("location: ../Login/index.php");
} 

$nome = "";
$nomedisa = "disabled";
$cpf = "";
$cpfdisa = "disabled";
$email = "";
$emaildisa = "disabled";
$senha = "";
$senhadisa = "disabled";
$telefone = "";
$telefonedisa = "disabled";
$id = "";
$situacaodisa = "disabled";
$escoladisa = "disabled";
$botaodisa = "disabled";
$botaolimpadisa = "disabled";

if (isset($_GET['proid'])) {

  $result = $plano->pesquisarprofessor($_GET['proid']);
  $vetor = mysqli_fetch_array($result);    
  $nome = $vetor['pro_nome'];
  $cpf = $vetor['pro_cpf'];
  $email = $vetor['pro_email'];
  $senha = $vetor['pro_senha'];
  $telefone = $vetor['pro_telefone']; 
  $id = $_GET['proid'];

  $nomedisa = "";
  $cpfdisa = "";
  $emaildisa = "";
  $senhadisa = "";
  $telefonedisa = "";
  $situacaodisa = "";
  $escoladisa = "";
  $botaodisa = "";
  $botaolimpadisa = "";
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
  
  <link href="../../frontend/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="icon" href="../../frontend/img/favicon2.png" type="image/x-icon" />
  <link rel="stylesheet" href="../../fonts/flaticon/font/flaticon.css">
  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Blinker&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Teko&display=swap" rel="stylesheet">
  
  <link href="../../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
  
  <link type="text/css" href="../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

<body>

  <div>
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md fundocorpreto sombrafundo" id="sidenav-main">

      <div class="container-fluid fundocorpreto">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><img  width="25" height="25" src="../../assets/img/icons/icon-list.png"></span>
        </button>
        
        <div class="img111"><a class="" href="gprof.php" style="color: #fff;">
          <img class="img-fluid" src="../../frontend/img/logo1.png" >
        </a></div>
        
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">

          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="./../index.php">
                  <img class="img-fluid" src="../../frontend/img/logo2.png" width="">
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
            <form action="#" method="POST">  
              <div class="col-12">
                <li class="nav-item">
                  <a  class="nav-link" href="../index.php" style = "font-size: 110%!important;">
                    <i class="fas fa-chart-line"></i> Confirmação
                  </a>
                </li>
              </form>

             
                <li class="nav-item">
                  <a  class="nav-link" href="destaque.php" style = "font-size: 110%!important;">
                    <i class="fas fa-chart-line"></i> Destaque
                  </a>
                </li>
              </form>

              <form action="#" method="POST">
                <li class="nav-item">
                  <a class="nav-link" href="gprof.php" style = "font-size: 110%!important;">
                    <i class="fas fa-file-upload"></i> Gerenciar Professor
                  </a>
                </li>
              </form>

              <form action="#" method="POST">
                <li class="nav-item">
                  <a class="nav-link" href="buscarsequencia.php" style = "font-size: 110%!important;">
                    <i class="fas fa-file-upload"></i> Buscar Sequência
                  </a>
                </li>
              </form>

              <form action="#" method="POST">          
                <li class="nav-item">
                 <a class="nav-link" href="#" data-toggle="modal" data-target="#modalsair"  style = "font-size: 110%!important;">
                  <i class="fas fa-sign-out-alt"></i> Sair
                </a>
              </li>
            </div>

          </form>

        </ul>

        <hr class="my-3">

      </div>
    </div>
  </nav>

  <div  class="main-content">


    <div class="fundocolorx">
     <div class="text-center">
       <img class="img-fluid" src="../../frontend/img/gprof1.png" width="70%">
     </div>
   </div> 

   
   <div class="container-fluid " style="background-color: #f3f3f3;">
    
    <div class="row">  
      <div class="col-xl-12 order-xl-2">
        <br>
        <br>
        <?php
      if (isset($_SESSION['alert_professor'])) {
        echo $_SESSION['alert_professor'];
        $_SESSION['alert_professor'] = null;
      }
      ?>

        <h3 class="text-center" style="font-family: 'Teko', sans-serif; font-size:180%;" >Gerenciamento</h3>
        <br>
        
   <form method="POST" id="form-pesquisa" action="#">
    <div style="font-family: 'Teko', sans-serif;">
      <div class="form-row">
        <div class="form-group col-md-6">
        <label style="font-size:200%;" for="inputEstado">Nome do Professor</label>
        <input style="font-size:180%;" type="text" class="form-control" id="pesquisa" name="pesquisa" placeholder="Pesquise aqui...">
      </div>

      <div class="form-group col-md-6">
       <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th style="font-size:80%;" scope="col">Editar</th>
            <th style="font-size:80%;" scope="col">Professor</th>
            <th style="font-size:80%;" scope="col">Escola</th>
          </tr>
        </thead>
        <tbody class="resultado">

        </tbody>
      </table>
    </div>


  </div>
</div>
</form> </br></br></br>

        <form method="POST" action="../../../Controller/C_Professor.php" enctype="multipart/form-data" class="appointment-form">
          <div style="font-family: 'Teko', sans-serif;">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label style="font-size:200%;" for="inputDataAula">Nome Completo:</label>
                <input style="font-size: 180%;" type="text" name="nome" value="<?php echo $nome?>" class="form-control" <?php echo $nomedisa?> placeholder="Ex:Pedro Hilan Duarte Braz" required="">

                <input type="hidden" name="idpro" value="<?php echo $id?>">
              </div>

              <div class="form-group col-md-6">
                <label style="font-size:200%;" for="inputDuracao">CPF:</label>
                <input style="font-size: 180%;" type="text" name="cpf" value="<?php echo $cpf?>" class="form-control" id="cpf" <?php echo $cpfdisa?> placeholder="Ex:000.000.000-00" required="">
              </div>


            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label style="font-size:200%;" for="inputEspecificacao">Email:</label>
                <input style="font-size: 180%;"  type="email" name="email" value="<?php echo $email?>" class="form-control" <?php echo $emaildisa?> id="inputEmail3" placeholder="emerson@gmail.com" required="">
              </div>

              <div class="form-group col">
                <label style="font-size:200%;" for="inputArea">Senha:</label>
                <input style="font-size: 180%;"  type="password" name="senha" value="<?php echo $senha?>" class="form-control" <?php echo $senhadisa?> id="inputPassword3" placeholder="********" required>
              </div>

              <div class="form-group col py-5">
                <button class="btn" type="button" id="showPassword" ><i class="fas fa-eye"></i></button>
              </div>

            </div> 

            <div class="form-row">
             <div class="form-group col-md-6">
              <label style="font-size:200%;" for="inputDesc">Telefone:</label>
              <input style="font-size: 180%;"  type="text" name="telefone" value="<?php echo $telefone?>" class="form-control" <?php echo $telefonedisa?> id="telefone" placeholder="(00) 0000-0000"required>
            </div>

            <div class="form-group col-md-6">
              <label style="font-size:200%;" for="inputDesc">Situação:</label>
              <select <?php echo $situacaodisa?> id="inputArea" class="form-control" name="situacao">
                <option style="font-size: 180%;" value="0">ATIVO</option>
                <option style="font-size: 180%;" value="1">INATIVO</option>
              </select>
            </div>
          </div>

          <div class="form-row">
           <div class="form-group col-md-12">
            <label style="font-size:200%;" for="inputDesc">Escola:</label>
            <select <?php echo $escoladisa?> id="idesc" class="form-control" name="idescola">
              <option style="font-size: 180%;" value='<?php echo $_SESSION['idescola']?>' > <?php echo $_SESSION['nomeescola']?> </option>

            </select>
          </div>

        </div>

        <div class="container">
          <div class="col-12">
            <div class="form-row">
              <div class="col-6">
              <div class="form-group col-md-12 text-center">
                <input <?php echo $botaodisa; ?> style="font-size: 140%;" type="submit" value="Editar" name="editar" class="btn btn-success px-4">
              </div>
              </div>
              <div class="col-6">
                <div class="form-group col-md-12 text-center">
                <a href="gprof.php"><input <?php echo $botaolimpadisa; ?> style="font-size: 140%;" type="button" value="Limpar" name="editar" class="btn btn-warning px-4"> </a>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>
  <hr>
  <br><br>
  <div class="col-xl-12 order-xl-2">
   
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
        <img class="img-fluid" src="../../frontend/img/DESENVOLVEDORES.png" >
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

<div style="font-family: 'Teko', sans-serif;" class="modal" tabindex="-1" role="dialog" id="modalsair">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container-fluid text-center">
          <img src="../../img/logoestado1.png"> </br>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Deseja mesmo sair?</p>
      </div>
      <div class="modal-footer">
        <a href="../../../Controller/C_Deslogar.php">
          Sair
        </a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script src="../../frontend/js/jquery-3.4.1.min.js"></script>
<script src="../../frontend/js/jquery.min.js"></script>
<script src="../../frontend/js/jquery.counterup.min.js"></script>
<script src="../../frontend/js/jquery.countdown.min.js"></script>
<script src="../../frontend/js/jquery.mask.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#dataNacimento').mask('00/00/0000');
    $('#cpf').mask('000.000.000-00');
    $('#cep').mask('00000-000');
    $('#telefone').mask('(00) 0000-0000');
  });
</script>

<script src="../../frontend/js/popper.js"></script>
<script src="../../frontend/js/popper.js"></script>
<script src="../../frontend/js/animate-in.js"></script>
<script src="../../frontend/js/bootstrap.min.js"></script>
<script src="../../frontend/js/bootstrap-notify.min.js"></script>
<script src="../../frontend/js/waypoints.min.js"></script>
<script src="../../frontend/js/owl.carousel.min.js"></script>
<script src="../../frontend/js/parallax.min.js"></script>
<script src="../../frontend/js/wow.min.js"></script>
<script src="../../frontend/js/main.js"></script>
<script type="../../frontend/js/smooth-scroll.js"></script>

<script src="../../frontend/vendor/select2/select2.min.js"></script>


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

<script>
  $(function(){
    $("#pesquisa").keyup(function(){
      //pegar valor do campo pesquisa
      var pesquisa = $(this).val();
      var idesc = document.getElementById('idesc').value;
      //verificar se há algo digitado
      if (pesquisa != '') {
        var dados = {
          palavra : pesquisa,
          id : idesc
        }
        $.post('../../../Controller/C_BuscarProf.php', dados, function(retorna){
          $(".resultado").html(retorna);
        });  
      }
    });
  });
</script>

</body>
</html>