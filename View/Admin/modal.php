<!-- Modal Sair -->

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
<!-- Bem Vindo -->

<div class="modal" tabindex="-1" role="dialog" id="<?php echo $modal;?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="container-fluid text-center">
          <img src="../img/logoestado.png"> </br>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Bem vindo administrador <?php echo $_SESSION['adm_nome'];?> !</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>