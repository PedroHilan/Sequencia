<?php
include '../Model/M_Professor.php';

session_start();
$professor = new M_Professor("", "", "", "", "","");

if (isset($_POST['cadastrar'])) {
	if ($_POST['situacao'] == 0) {
		$situacao = "ATIVO";
	}else if($_POST['situacao'] == 1){
		$situacao = "INATIVO";
	}

	$nome = strtoupper($_POST['nome']);
	$cpf = $_POST['cpf'];
	$email = strtoupper($_POST['email']);
  $senha = $_POST['senha'];
  $telefone = $_POST['telefone'];
  $escola = $_POST['idescola'];

  $professor->setEmail($email);
  $result = $professor->verificaremail($professor->getEmail());
  $linhas = mysqli_num_rows($result);

  $professor->setNome($nome);
  $resultnome = $professor->verificarnome($professor->getNome());
  $linhasnome = mysqli_num_rows($resultnome);

  $professor->setCpf($cpf);
  $resultcpf = $professor->verificarcpf($professor->getCpf());
  $linhascpf = mysqli_num_rows($resultcpf);

  $professor->setTelefone($telefone);
  $resulttel = $professor->verificartelefone($professor->getTelefone());
  $linhastel = mysqli_num_rows($resulttel);

  $resultcoo = $professor->verificaremailcoo($email);
  $linhascoo = mysqli_num_rows($resultcoo);

  $resultnomecoo = $professor->verificarnomecoo($nome);
  $linhasnomecoo = mysqli_num_rows($resultnomecoo);

  $resultcpfcoo = $professor->verificarcpfcoo($cpf);
  $linhascpfcoo = mysqli_num_rows($resultcpfcoo);

  $resulttelcoo = $professor->verificartelefonecoo($telefone);
  $linhastelcoo = mysqli_num_rows($resulttelcoo);
     //verificar se existe email igual  o banco   
  if($linhas >= 1){
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O email informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
       //verificar se existe nome igual  o banco   
  }else if($linhascpf >= 1){
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O cpf informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
        //verificar se existe telefone igual no banco
  }else if ($linhastel >= 1) {
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O telefone informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
  }else if($linhascoo >= 1){
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O email informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
       //verificar se existe nome igual  o banco   
  }else if($linhascpfcoo >= 1){
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O cpf informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
        //verificar se existe telefone igual no banco
  }else if ($linhastelcoo >= 1) {
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O telefone informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
    
  }else{

    //----------------------------------------
    $professor->setSenha($senha);

    $professor->cadastrar($professor->getEmail(), $professor->getSenha(), $professor->getNome(), $professor->getCpf(), $professor->getTelefone(), $situacao, $escola);

    $_SESSION['alert_professor'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Pronto, professor cadastrado! <i class='far fa-thumbs-up'></i>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
  }
}
//PRE CADASTRO --------------------------
else if (isset($_POST['precadastrar'])) {
  $senha = $_POST['pass'];
  $senhaconf = $_POST['passconf'];

  $nome = strtoupper($_POST['nome']);
  $cpf = $_POST['cpf'];
  $email = strtoupper($_POST['email']);
  $telefone = $_POST['telefone'];
  $escola = $_POST['idescola'];

  $professor->setEmail($email);
  $result = $professor->verificaremail($professor->getEmail());
  $linhas = mysqli_num_rows($result);

  $professor->setNome($nome);
  $resultnome = $professor->verificarnome($professor->getNome());
  $linhasnome = mysqli_num_rows($resultnome);

  $professor->setCpf($cpf);
  $resultcpf = $professor->verificarcpf($professor->getCpf());
  $linhascpf = mysqli_num_rows($resultcpf);

  $professor->setTelefone($telefone);
  $resulttel = $professor->verificartelefone($professor->getTelefone());
  $linhastel = mysqli_num_rows($resulttel);

  $resultcoo = $professor->verificaremailcoo($email);
  $linhascoo = mysqli_num_rows($resultcoo);

  $resultnomecoo = $professor->verificarnomecoo($nome);
  $linhasnomecoo = mysqli_num_rows($resultnomecoo);

  $resultcpfcoo = $professor->verificarcpfcoo($cpf);
  $linhascpfcoo = mysqli_num_rows($resultcpfcoo);

  $resulttelcoo = $professor->verificartelefonecoo($telefone);
  $linhastelcoo = mysqli_num_rows($resulttelcoo);

     //verificar se existe email igual  o banco   
  if($linhas >= 1){
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O email informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Login/cadastro/index.php';

    </script>
    <?php
       //verificar se existe nome igual  o banco   
  }else if($linhascpf >= 1){
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O cpf informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Login/cadastro/index.php';

    </script>
    <?php
        //verificar se existe telefone igual no banco
  }else if ($linhastel >= 1) {
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O telefone informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Login/cadastro/index.php';

    </script>
    <?php
  }else if($linhascoo >= 1){
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O email informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Login/cadastro/index.php';

    </script>
    <?php
       //verificar se existe nome igual  o banco   
  }else if($linhascpfcoo >= 1){
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O cpf informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Login/cadastro/index.php';

    </script>
    <?php
        //verificar se existe telefone igual no banco
  }else if ($linhastelcoo >= 1) {
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O telefone informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Login/cadastro/index.php';

    </script>
    <?php
    
  }else if ($senha != $senhaconf){

     $_SESSION['alert_professor'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
     As senhas não coincidem!
     <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
     <span aria-hidden='true'>&times;</span>
     </button>
     </div>";
     ?>
     <script type="text/javascript">
      location.href = '../View/Login/cadastro/index.php';

    </script>
    <?php
  }else{
    //----------------------------------------
    $professor->setSenha($senha);

    $professor->precadastrar($professor->getEmail(), $professor->getSenha(), $professor->getNome(), $professor->getCpf(), $professor->getTelefone(), $escola);

    $_SESSION['alert_professor'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Pronto, professor pré - cadastrado! <i class='far fa-thumbs-up'></i>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Login/index.php';

    </script>
    <?php

  }
}
else if(isset($_GET['idprof'])){
    $idprof = $_GET['idprof'];
    $professor->ativarprofessor($idprof);

    $_SESSION['alert_professor'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Confirmado, professor cadastrado! <i class='far fa-thumbs-up'></i>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/index.php';

    </script>
    <?php
}
else if(isset($_GET['idprofcanc'])){
    $idprofcance = $_GET['idprofcanc'];
    $professor->excluirprofessor($idprofcance);    
    
        $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    Pronto, professor excluído! <i class='far fa-thumbs-up'></i>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/index.php';

    </script>
    <?php
}
  //EDITAR PROF --------------------------
  else if (isset($_POST['editar'])) {
    if ($_POST['situacao'] == 0) {
    $situacao = "ATIVO";
  }else if($_POST['situacao'] == 1){
    $situacao = "INATIVO";
  }

  $nome = strtoupper($_POST['nome']);
  $cpf = $_POST['cpf'];
  $email = strtoupper($_POST['email']);
  $senha = $_POST['senha'];
  $telefone = $_POST['telefone'];
  $id = $_POST['idpro'];

  $professor->setEmail($email);
  $result = $professor->verificaremaileditar($professor->getEmail(), $id);
  $linhas = mysqli_num_rows($result);

  $professor->setNome($nome);
  $resultnome = $professor->verificarnomeeditar($professor->getNome(), $id);
  $linhasnome = mysqli_num_rows($resultnome);

  $professor->setCpf($cpf);
  $resultcpf = $professor->verificarcpfeditar($professor->getCpf(), $id);
  $linhascpf = mysqli_num_rows($resultcpf);

  $professor->setTelefone($telefone);
  $resulttel = $professor->verificartelefoneeditar($professor->getTelefone(), $id);
  $linhastel = mysqli_num_rows($resulttel);

  $resultcoo = $professor->verificaremailcoo($email);
  $linhascoo = mysqli_num_rows($resultcoo);

  $resultnomecoo = $professor->verificarnomecoo($nome);
  $linhasnomecoo = mysqli_num_rows($resultnomecoo);

  $resultcpfcoo = $professor->verificarcpfcoo($cpf);
  $linhascpfcoo = mysqli_num_rows($resultcpfcoo);

  $resulttelcoo = $professor->verificartelefonecoo($telefone);
  $linhastelcoo = mysqli_num_rows($resulttelcoo);

     //verificar se existe email igual  o banco   
  if($linhas >= 1){
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O email informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
       //verificar se existe nome igual  o banco   
  }else if($linhascpf >= 1){
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O cpf informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
        //verificar se existe telefone igual no banco
  }else if ($linhastel >= 1) {
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O telefone informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
  }else if($linhascoo >= 1){
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O email informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
       //verificar se existe nome igual  o banco   
  }else if($linhascpfcoo >= 1){
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O cpf informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
        //verificar se existe telefone igual no banco
  }else if ($linhastelcoo >= 1) {
    $_SESSION['alert_professor'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O telefone informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
    
  }else{

    //----------------------------------------
    $professor->setSenha($senha);

    $professor->editarprofessor($professor->getEmail(), $professor->getSenha(), $professor->getNome(), $professor->getCpf(), $professor->getTelefone(), $id);

    $_SESSION['alert_professor'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Pronto, dados do professor editados! <i class='far fa-thumbs-up'></i>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Coordenador/pagesAdm/gprof.php';

    </script>
    <?php
  }
  }
?>