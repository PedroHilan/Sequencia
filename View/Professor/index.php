<?php
session_start();
include '../../Model/M_Plano.php';
$plano = new M_Plano("", "");
$modal = 0;
if ($_SESSION['loginprof'] == "Logou") {

}else{
  header("location: ../Login/index.php");
} 

if (isset($_SESSION['modal']) ) {
 $modal = "modalbemvindo";
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html charset=utf-8">
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
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md fundocorpreto sombrafundo" id="sidenav-main" style="box-shadow: 0 5px 3px 5px rgba(0, 0, 0, 0.5) !important;">

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

            <form action="#" method="POST">  
              <div class="col-12">
                <li class="nav-item">
                  <a  class="nav-link" href="pagesAdm/destaque.php" style = "font-size: 110%!important;">
                    <i class="fas fa-chart-line"></i> Destaques
                  </a>
                </li>
              </form>

              <form action="#" method="POST">
                <li class="nav-item">
                  <a class="nav-link" href="index.php" style = "font-size: 110%!important;">
                    <i class="fas fa-file-upload"></i> Cadastro de Sequência
                  </a>
                </li>
              </form>

              <form action="#" method="POST">
                <li class="nav-item">
                  <a class="nav-link" href="pagesAdm/buscarsequencia.php" style = "font-size: 110%!important;">
                   <i class="fas fa-search"></i> Buscar Sequência
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
<div class="main-content">
  <div class="fundocolorx">
   <div class="text-center">
     <img class="img-fluid" src="../frontend/img/sequenciacadastro1.png" width="70%">
   </div>
 </div>
 <div class="container-fluid " style="background-color: #f3f3f3;">
  <div class="row">
    <div class="col-xl-12 order-xl-2">
      <br>
      <br>
      <h3 class="text-center" style="font-family: 'Teko', sans-serif; font-size:180%;" >Cadastro e Gerenciamento</h3>
      <br>
      <br>
      <?php
      if (isset($_SESSION['erroup'])) {
        echo $_SESSION['erroup'];
                unset( $_SESSION['erroup'] );  // irá remover apenas os dados de 'erroup'
              }
              include 'modal.php';
              ?>
              <div style="font-family: 'Teko', sans-serif;">
                <div class="">
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label style="font-size:200%;" for="inputEspecificacao">Avaliação Externa:</label>
                      <select class="form-control" id="espec" name="espec">
                        <option style="font-size: 180%;" value="0">Selecione...</option>
                        <option style="font-size: 180%;" value="Enem">Enem</option>
                        <option style="font-size: 180%;" value="Spaece">Spaece</option> 
                      </select>
                    </div>

                    <div class="form-group col-md-4">
                     <label style="font-size:200%;" for="inputArea">Áreas do Conhecimento:</label>
                     <select id="areaconhecimento" class="form-control" name="areaconhecimento">
                      <option style="font-size: 180%;" value=""></option>
                    </select>
                  </div>

                   <div class="form-group col-md-4">
                   <label style="font-size:200%;" for="inputDesc">Domínio/Competência:</label>
                   <select id="competencia" class="form-control" name="competencia" >
                    <option style="font-size: 180%;" value=""></option>
                  </select>
                </div>

                </div>
              </br></br></br>

            </div>
            <form method="POST" action="../../Controller/C_Plano.php" enctype="multipart/form-data" class="appointment-form">
              <div style="font-family: 'Teko', sans-serif;">
                <div class="form-row">

                  <div class="form-group col-md-4">
                    <label style="font-size:200%;" for="inputDesc">Descritores:</label>
                    <select id="descritor" class="form-control" name="descritor">
                      <option style="font-size: 180%;" value=""></option>
                    </select>
                  </div>

                 <div class="form-group col-md-4">
                  <label style="font-size:200%;" for="inputDataAula">Data da Aula:</label>
                  <input style="font-size: 180%;" type="text" name="dataNacimento" class="form-control" id="dataNacimento" placeholder="Ex:12/09/2019">
                </div>

                <div class="form-group col-md-4">
                  <label style="font-size:200%;" for="inputDuracao">Duração:</label>
                  <input style="font-size: 180%;" type="text" name="duracao" class="form-control" id="duracao" placeholder="Ex:01:40">
                  <small style="font-size: 100%;" id="emailHelp" class="form-text text-muted">A duração de cada aula deverá ser feita em horas. Ex: (1:50) ou (00:30)</small>
                </div>

                <div class="form-group col-md-6">
                  <label style="font-size:200%;" for="inputSerie">Série Aplicada:</label>
                  <select style="" id="inputSerie" class="form-control" name="serie">
                    <option style="font-size: 180%;" value="1º Ano">1º Ano</option>
                    <option style="font-size: 180%;" value="2º Ano">2º Ano</option>
                    <option style="font-size: 180%;" value="3º Ano">3º Ano</option>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label style="font-size:200%;" for="inputSerie">Turma:</label>
                  <select style="" id="inputSeriet" class="form-control" name="turma">
                    <option style="font-size: 180%;" value="Curso Técnico">Curso Técnico</option>
                    <option style="font-size: 180%;" value="A">A</option>
                    <option style="font-size: 180%;" value="B">B</option>
                    <option style="font-size: 180%;" value="C">C</option>
                    <option style="font-size: 180%;" value="D">D</option>
                    <option style="font-size: 180%;" value="E">E</option>
                    <option style="font-size: 180%;" value="F">F</option>
                    <option style="font-size: 180%;" value="G">G</option>
                    <option style="font-size: 180%;" value="H">H</option>
                    <option style="font-size: 180%;" value="I">I</option>
                    <option style="font-size: 180%;" value="J">J</option>
                    <option style="font-size: 180%;" value="K">K</option>
                    <option style="font-size: 180%;" value="L">L</option>
                    <option style="font-size: 180%;" value="M">M</option>
                    <option style="font-size: 180%;" value="N">N</option>
                    <option style="font-size: 180%;" value="O">O</option>
                    <option style="font-size: 180%;" value="P">P</option>
                    <option style="font-size: 180%;" value="Q">Q</option>
                    <option style="font-size: 180%;" value="S">S</option>
                    <option style="font-size: 180%;" value="T">T</option>
                    <option style="font-size: 180%;" value="U">U</option>
                    <option style="font-size: 180%;" value="V">V</option>
                    <option style="font-size: 180%;" value="W">W</option>
                    <option style="font-size: 180%;" value="Y">Y</option>
                    <option style="font-size: 180%;" value="Z">Z</option>
                  </select>
                </div>
              </div>

              <div class="card-profile shadow" > </br>

                <div class="container">
                  <div class="col-12">
                    <div class="">
                      <div class="form-group text-center">
                        <div class='input-wrapper'>

                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id='input-file'name='fileToUpload' type='file' value='' >
                            <label style="font-size:150%;" class="custom-file-label" for="inputGroupFile01">Selecione o PDF</label>
                          </div>

                          <script>
                            var $input    = document.getElementById('input-file'),
                            $fileName = document.getElementById('file-name');

                            $input.addEventListener('change', function(){
                              $fileName.textContent = this.value;
                            });

                          </script>

                        </div>
                      </div>
                    </div>

                    <div class="">
                    </div>

                  </div>  
                </div>

                <input type="hidden" name="idprof" value="<?php echo $_SESSION['idprof']?>">
                <div class="form-group">
                  <label style="font-size:200%;" for="detalhamento">Conteúdo/Currículo:</label>
                  <textarea style="font-size:160%;" class="form-control" name="detalhamento" id="textodetalhamento" rows="3"></textarea>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group ml-md-4 text-center">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-success py-3 px-4">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>


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
        </div>
      </footer>
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

    <script src="../frontend/js/jquery-3.4.1.min.js"></script>
    <script src="../frontend/js/jquery.min.js"></script>
    <script src="../frontend/js/jquery.counterup.min.js"></script>
    <script src="../frontend/js/jquery.countdown.min.js"></script>
    <script src="../frontend/js/jquery.mask.min.js"></script>
    <script src="../frontend/js/popper.js"></script>
    <script src="../frontend/js/animate-in.js"></script>
    <script src="../frontend/js/bootstrap.min.js"></script>
    <script src="../frontend/js/bootstrap-notify.min.js"></script>
    <script src="../frontend/js/waypoints.min.js"></script>
    <script src="../frontend/js/owl.carousel.min.js"></script>
    <script src="../frontend/js/wow.min.js"></script>
    <script src="../frontend/js/main.js"></script>
    <script type="../frontend/js/smooth-scroll.js"></script>

    <script src="../frontend/vendor/select2/select2.min.js"></script>
    <!-- -->
    <!-- <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    -->
    <script type="text/javascript">
      $(document).ready(function(){
        $('#modalbemvindo').modal('show');
      });            
    </script>
  
    <?php unset( $_SESSION['modal'] ); ?>
   
    <script type="text/javascript">
      $(document).ready(function(){
        $('#dataNacimento').mask('00/00/0000');
        $('#cpf').mask('000.000.000-00');
        $('#cep').mask('00000-000');
        $('#telefone').mask('(00) 0000-0000');
        $('#duracao').mask('00:00');
      });
    </script>

  
    <script type="text/javascript">
      var area = document.getElementById("areaconhecimento");
      var competencia = document.getElementById("competencia");
      var descritor = document.getElementById("descritor");
      area.disabled = true;
      competencia.disabled = true;
      descritor.disabled = true;

      $(function(){
        $('#competencia').change(function(){
          //
          if( $(this).val() ) {
          //
            $.getJSON('../../Controller/C_Descritor.php?search=',{competencia: $(this).val(), ajax: 'true'},function(j){        
                
              var options = '<option style="font-size: 180%;" value="0">Selecione...</option>'; 
              for (var i = 0; i < j.length; i++) {
                options += '<option style="font-size: 180%;" value="'+ j[i].id +'">' + j[i].descritor + '</option>';
              } 
              descritor.disabled = false;
              $('#descritor').html(options).show();
            });
          } else {
            $('#descritor').html('<option value="">– Escolha... –</option>');
          }
        });
      });


      $(function(){
        $('#espec').change(function(){
          if( $(this).val() ) {
            $.getJSON('../../Controller/C_Areaconhecimento.php?search=',{espec: $(this).val(), ajax: 'true'}, function(j){
              var options = '<option style="font-size: 180%;" value="0">Selecione...</option>'; 
              for (var i = 0; i < j.length; i++) {
                options += '<option style="font-size: 180%;" value="'+ j[i].areaconhecimento +'">' + j[i].areaconhecimento + '</option>';
              } 
              area.disabled = false;
              descritor.value = null;
              descritor.disabled = true;
              competencia.value = null;
              competencia.disabled = true;
              $('#areaconhecimento').html(options).show();
            });
          } else {
            $('#areaconhecimento').html('<option value="">– Escolha... –</option>');
          }
        });
      });
    

      $(function(){
        $('#areaconhecimento').change(function(){
          if( $(this).val() ) {
            $.getJSON('../../Controller/C_Competencia.php?search=',{areaconhecimento: $(this).val(), ajax: 'true'}, function(j){
              var options = '<option style="font-size: 180%;" value="0">Selecione...</option>'; 
              for (var i = 0; i < j.length; i++) {
                options += '<option style="font-size: 180%;" value="'+ j[i].competencia +'">' + j[i].competencia + '</option>';
                  
              } 
              competencia.disabled = false;
              descritor.value = null;
              descritor.disabled = true;
              $('#competencia').html(options).show();
            });
          } else {
            $('#competencia').html('<option value="">– Escolha... –</option>');
          }
        });
      });
    </script>
  </body>
  </html>