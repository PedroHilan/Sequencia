<?php
include '../../../Model/M_Plano.php';
session_start();
if ($_SESSION['logincoo'] == "Logou") {

}else{
  header("location: ../Login/index.php");
} 

$plano = new M_Plano("", "");
$result = $plano->exibir();
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
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="../../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Russo+One&display=swap" rel="stylesheet">
  <link type="text/css" href="../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.foundation.min.css">
</head>

<body>
  <div>
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md fundocorpreto sombrafundo" id="sidenav-main" style="">

      <div class="container-fluid fundocorpreto">
        <!-- Toggler -->
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
      
    </div>
  </div>
</nav>
<div  class="main-content">
  <div class="fundocolorx">
   <div class="text-center">
     <img class="img-fluid" src="../../frontend/img/buscarsequencia1.png" width="70%">
   </div>
 </div>
 <div class="content" style="overflow: auto;">
  <div class="container-fluid " style="background-color: #f3f3f3;">
    <div class="row">
      <div class="col-xl-12 order-xl-12">
       <div style="font-family: 'Teko', sans-serif;">
        <div class="form-group">
          <div class="form-group col-md-12">
           </br> <table id="tabela" class="display" style="width:100%">
              <thead>
                <tr>
                  <th>PDF</th>
                  <th>Professor</th>
                  <th>Escola</th>
                  <th>Disciplina</th>
                  <th>Especificação</th>
                  <th>Turma</th>
                  <th>Descritor(es)</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                while ($dados = mysqli_fetch_array($result)) {
                  echo "<tr>
                  <td style='font-size:20%;'><a href='../../../Controller/C_Download.php?file=".$dados['pla_id']."'><button type='button' class='btn btn-success'>Download</button></a></td>
                  <td>".$dados['pro_nome']."</td>
                  <td>".$dados['esc_nome']."</td>
                  <td>".$dados['des_disciplina']."</td>
                  <td>".$dados['des_especificacao']."</td>
                  <td>".$dados['pla_turma']."</td>
                  <td>".$dados['des_descritor']."</td>
                  </tr>"; 
                }
                ?>
             </tbody>
            </table>
          </div>
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
        <button style="" type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
       
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
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalsair" style="font-family: 'Teko', sans-serif;">
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

<script>
  $(document).ready(function() {
    $('#tabela').DataTable({
                "bJQueryUI": true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
            });
  });
</script>

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

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.foundation.min.js"></script>
</body>
</html>