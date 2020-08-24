<?php
session_start();
include '../../Model/M_Professor.php';
include 'modal.php';

if ($_SESSION['logincoo'] == "Logou") {

}else{
  header("location: ../Login/index.php");
}

if (isset($_SESSION['modal']) ) {
 $modal = "modalbemvindo";
}

$idescola = $_SESSION['idescola'];
$professor = new M_Professor("", "", "", "", "",""); 
$resultprofessor = $professor->professorinativo($idescola);
$linhas = mysqli_num_rows($resultprofessor);

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
  <link rel="icon" href="../frontend/img/favicon2.png" type="image/x-icon" />
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

<body>

  <div>
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md fundocorpreto sombrafundo" id="sidenav-main">

      <div class="container-fluid fundocorpreto">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><img  width="25" height="25" src="../assets/img/icons/icon-list.png"></span>
        </button>

        <div class="img111"><a class="" href="index.php" style="color: #fff;">
          <img class="img-fluid" src="../frontend/img/logo1.png" >
        </a></div>

        
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="index.php">
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
              <div class="col-12">
                <li class="nav-item">
                  <a  class="nav-link" href="index.php" style = "font-size: 110%!important;">
                    <i class="fas fa-chart-line"></i> Confirmação
                  </a>
                </li>
           

              
                <li class="nav-item">
                  <a  class="nav-link" href="pagesAdm/destaque.php" style = "font-size: 110%!important;">
                    <i class="fas fa-chart-line"></i> Destaque
                  </a>
                </li>
          

                <li class="nav-item">
                  <a class="nav-link" href="pagesAdm/gprof.php" style = "font-size: 110%!important;">
                    <i class="fas fa-file-upload"></i> Gerenciar Professor
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="pagesAdm/buscarsequencia.php" style = "font-size: 110%!important;">
                    <i class="fas fa-file-upload"></i> Buscar Sequência
                  </a>
                </li>

                <li class="nav-item">
                 <a class="nav-link" href="#" data-toggle="modal" data-target="#modalsair"  style = "font-size: 110%!important;">
                  <i class="fas fa-sign-out-alt"></i> Sair
                </a>
              </li>
            </div>


        </ul>

        <hr class="my-3">

      </div>
    </div>
  </nav>

  
  <div  class="main-content" style="background-color: #f3f3f3;">


    <div class="fundocolorx">
     <div class="text-center">
       <img class="img-fluid" src="../frontend/img/sequenciaconfirmação1.png" width="70%">
     </div>
   </div>


   <div  class="content" style="overflow-y: auto;">
     <div class="container-fluid " style="background-color: #f3f3f3;">
      <br>
      <?php
      if(isset($_SESSION['alert_professor'])){
        echo $_SESSION['alert_professor'];
        $_SESSION['alert_professor'] = null;
      }else{}
      ?>
     
      <div class="row">
        <div class="col-xl-12 order-xl-12">
          <br><br>
          <div>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome Completo</th>
                  <th scope="col">CPF</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Confirmação</th>
                  <th scope="col">Cancelar</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $contador = 1;
                if ($linhas >= 1) {
                  while($dados = mysqli_fetch_assoc($resultprofessor)){
                    echo "<tr>
                    <th scope='row'>".$contador."</th>
                    <td>".$dados['pro_nome']."</td>
                    <td>".$dados['pro_cpf']."</td>
                    <td>".$dados['pro_telefone']."</td>
                    <td><a href='index.php?idprofconf=".$dados['pro_id']."'><button type='button' class='btn btn-dark'>Confirmar</button></a></td>
                    <td><a href='index.php?idprofcanc=".$dados['pro_id']."'><button type='button' class='btn btn-warning'>Cancelar</button></a></td>
                    </tr>
                    ";

                    $contador++;
                  }  
                } else {
                 echo "<h2>Nenhum professor solicitou confirmação!</h2>";
               }

               ?>
             </tbody>
           </table>

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


<script src="../frontend/js/jquery-3.4.1.min.js"></script>
<script src="../frontend/js/jquery.min.js"></script>
<script src="../frontend/js/jquery.counterup.min.js"></script>
<script src="../frontend/js/jquery.countdown.min.js"></script>
<script src="../frontend/js/jquery.mask.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#modalbemvindo').modal('show');
  });            
</script>
<?php unset( $_SESSION['modal'] ); ?>

<?php 
if (isset($_GET['idprofconf'])) { ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#modalconfirmar').modal('show');
    });            
  </script>
<?php } 

if (isset($_GET['idprofcanc'])) { ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#modalcancelar').modal('show');
    });            
  </script>
<?php } 

?>

<script type="text/javascript">
  $(document).ready(function(){
    $('#dataNacimento').mask('00/00/0000');
    $('#cpf').mask('000.000.000-00');
    $('#cep').mask('00000-000');
    $('#telefone').mask('(00) 0000-0000');
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

</body>
</html>