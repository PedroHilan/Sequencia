<!-- Modal Sair -->

<div style="font-family: 'Teko', sans-serif;" class="modal" tabindex="-1" role="dialog" id="modalsair">
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

<div style="font-family: 'Teko', sans-serif;" class="modal" tabindex="-1" role="dialog" id="modalbemvindo">
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
        <p>Bem vindo coordenador <?php echo $_SESSION['coo_nome'];?> !</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Cancelar -->

<div style="font-family: 'Teko', sans-serif;" class="modal" tabindex="-1" role="dialog" id="modalcancelar">
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
        <p>Deseja mesmo excluir?</p>
      </div>
      <div class="modal-footer">
        <a href='../../Controller/C_Professor.php?idprofcanc= <?php echo $_GET['idprofcanc']?>'>
        Excluir
        </a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Confirmar -->

<div style="font-family: 'Teko', sans-serif;" class="modal" tabindex="-1" role="dialog" id="modalconfirmar">
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
        <p>Deseja mesmo confirmar?</p>
      </div>
      <div class="modal-footer">
        <a href='../../Controller/C_Professor.php?idprof= <?php echo $_GET['idprofconf']?> '>
        Confirmar <?php echo $_GET['idprofconf']?>
        </a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>