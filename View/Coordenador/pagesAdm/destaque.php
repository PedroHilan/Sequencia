<?php
session_start();
include '../../../Model/M_Plano.php';
$plano = new M_Plano("", "");

if ($_SESSION['logincoo'] == "Logou") {

}else{
  header("location: ../Login/index.php");
} 

$result = $plano->rankprofessor();
$resultesc = $plano->rankescola();
$resultdes = $plano->rankdescritores();
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
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md fundocorpreto sombrafundo" id="sidenav-main" style="box-shadow: 0 5px 3px 5px rgba(0, 0, 0, 0.5) !important;">

      <div class="container-fluid fundocorpreto">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><img  width="25" height="25" src="../../assets/img/icons/icon-list.png"></span>
        </button>
        <div class="img111"><a class="" href="./../index.php" style="color: #fff;">
          <img class="img-fluid" src="../../frontend/img/logo1.png" >
        </a></div>
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Collapse header -->
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
     <img class="img-fluid" src="../../frontend/img/destaque1.png" width="70%">
   </div>
 </div>
 <div class="container-fluid " style="background-color: #f3f3f3;">
  <!-- Table -->
  <div class="row">

    <div class="col-xl-12 order-xl-2">
      <br><br>
      <div class="content" style="overflow: auto;">
        <div class="container-fluid">
          <h3>Professores</h3>
          <table style="" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Escola</th>
                <th scope="col">Downloads</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $linhas = mysqli_num_rows($result);
              $contador = 1;
              if ($linhas >= 1) {
                while ($dados = mysqli_fetch_assoc($result)) {
                  echo "<tr>
                  <th scope='row'>".$contador."</th>
                  <td>".$dados['pro_nome']."</td>
                  <td>".$dados['esc_nome']."</td>
                  <td>".$dados['SUM(pla_download)']."</td>
                  </tr>";
                  $contador++;
                }
              }else{
                echo "Nenhuma sequência encontrada!";
              }
              ?>
            </tbody>
          </table>
        </div>
        
      </div>

      <br><br>

      <div class="content" style="overflow: auto;">
        <div class="container-fluid">
          <h3>Escola</h3>
          <table style="" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Downloads</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $linhasesc = mysqli_num_rows($resultesc);
              $contador = 1;
              if ($linhasesc >= 1) {
                while ($dados = mysqli_fetch_assoc($resultesc)) {
                  echo "<tr>
                  <th scope='row'>".$contador."</th>
                  <td>".$dados['esc_nome']."</td>
                  <td>".$dados['esc_email']."</td>
                  <td>".$dados['SUM(pla_download)']."</td>
                  </tr>";
                  $contador++;
                }
              }else{
                echo "Nenhuma sequência encontrada!";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
      

      <br><br>
      <div class="content" style="overflow: auto;">
        <div class="container-fluid">
          <h3>Descritores</h3>
          <table style="" class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Especificação</th>
                <th scope="col">Descritor</th>
                <th scope="col">Usado</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $linhasdes = mysqli_num_rows($resultdes);
              $contador = 1;
              if ($linhasdes >= 1) {
                while ($dados = mysqli_fetch_assoc($resultdes)) {
                  echo "<tr>
                  <th scope='row'>".$contador."</th>
                  <td>".$dados['des_especificacao']."</td>
                  <td>".$dados['des_descritor']."</td>
                  <td>".$dados['des_contador']." vez(es)</td>
                  </tr>";
                  $contador++;
                }
              }else{
                echo "Nenhuma sequência encontrada!";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
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
</div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalsair">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container-fluid text-center">
          <img src="../../img/logoestado.png"> </br>
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
  function carregamento(a,b,c) {
    //contar os "filhos" do id='menu'
    tam = document.getElementById("menu").childElementCount;  
    
    fecharconteudo();
    
    for (i = 0; i < tam; i++) {
      document.getElementById("menu").children[i].onclick=function(){
        fecharconteudo();
        document.getElementById("conteudo").children[this.id].style.display="block";
      }
    }

    function fecharconteudo(){
      for (i = 0; i < document.getElementById("conteudo").childElementCount; i++) {
        //deixa os elementos do id='conteudo' ocultos
        document.getElementById("conteudo").children[i].style.display="none";
      }
    }

    document.getElementById("menu").children[c].click();
  }

  carregamento("menu","conteudo","b1");
</script>

</body>
</html>