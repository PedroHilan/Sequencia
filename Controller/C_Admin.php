<?php
include '../Model/M_Admin.php';
session_start();
$admin = new M_Admin("", "", "");

if (isset($_POST['cadastrar'])) {
	$nome = strtoupper($_POST['nomeesc']);
	$cnpj = $_POST['cnpj'];
	$email = strtoupper($_POST['email']);
	$senha = $_POST['senha'];
	$telefone = $_POST['telefone'];
	$bairro = strtoupper($_POST['bairro']);
	$logradouro = strtoupper($_POST['logradouro']);
	$nomelogra = strtoupper($_POST['nomelogra']);
	$numero = $_POST['numero'];

  $result = $admin->verificaremail($email);
  $linhas = mysqli_num_rows($result);

  $resultnome = $admin->verificarnome($nome);
  $linhasnome = mysqli_num_rows($resultnome);

  $resultcnpj = $admin->verificarcnpj($cnpj);
  $linhascnpj = mysqli_num_rows($resultcnpj);

  $resulttel = $admin->verificartelefone($telefone);
  $linhastel = mysqli_num_rows($resulttel);

     //verificar se existe email igual  o banco   
  if($linhas >= 1){
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O email informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/index.php';

    </script>
    <?php
       //verificar se existe nome igual  o banco   
  }else if ($linhastel >= 1) {
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O telefone informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/index.php';

    </script>
    <?php
  }else{

    //-----------CADASTRAR SE TUDO OK-----------
    $admin->cadastroescola($email, $senha, $nome, $cnpj, $telefone, $bairro, $logradouro, $nomelogra, $numero);

    $_SESSION['alert_admin'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Pronto, escola cadastrada! <i class='far fa-thumbs-up'></i>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/index.php';

    </script>
    <?php
  }
} 
//-------- EDITAR ESCOLA -----------------
else if (isset($_POST['editar'])) {
  $nome = strtoupper($_POST['nomeesc']);
  $cnpj = $_POST['cnpj'];
  $email = strtoupper($_POST['email']);
  $senha = $_POST['senha'];
  $telefone = $_POST['telefone'];
  $bairro = strtoupper($_POST['bairro']);
  $logradouro = strtoupper($_POST['logradouro']);
  $nomelogra = strtoupper($_POST['nomelogra']);
  $numero = $_POST['numero'];
  $id = $_POST['escid'];

  $result = $admin->verificaremaileditar($email, $id);
  $linhas = mysqli_num_rows($result);

  $resultnome = $admin->verificarnomeeditar($nome, $id);
  $linhasnome = mysqli_num_rows($resultnome);

  $resultcnpj = $admin->verificarcnpjeditar($cnpj, $id);
  $linhascnpj = mysqli_num_rows($resultcnpj);

  $resulttel = $admin->verificartelefoneeditar($telefone, $id);
  $linhastel = mysqli_num_rows($resulttel);

     //verificar se existe email igual  o banco   
  if($linhas >= 1){
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O email informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/index.php';

    </script>
    <?php
       //verificar se existe nome igual  o banco   
  }else if ($linhastel >= 1) {
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O telefone informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/index.php';

    </script>
    <?php
  }else{

    //-----------CADASTRAR SE TUDO OK-----------
    $admin->editarescola($email, $senha, $nome, $cnpj, $telefone, $bairro, $logradouro, $nomelogra, $numero, $id);

    $_SESSION['alert_admin'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Pronto, dados da escola editados! <i class='far fa-thumbs-up'></i>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/index.php';

    </script>
    <?php
  }
}
//----------- CADASTRAR COORDENADOR ----------
else if(isset($_POST['cadastrarcoo'])){
  $nome = strtoupper($_POST['nome']);
  $cpf = $_POST['cpf'];
  $email = strtoupper($_POST['email']);
  $senha = $_POST['senha'];
  $telefone = $_POST['telefone'];
  $idescola = $_POST['idescola'];

  $result = $admin->verificaremailcoo($email);
  $linhas = mysqli_num_rows($result);

  $resultnome = $admin->verificarnomecoo($nome);
  $linhasnome = mysqli_num_rows($resultnome);

  $resultcpf = $admin->verificarcpfcoo($cpf);
  $linhascpf = mysqli_num_rows($resultcpf);

  $resulttel = $admin->verificartelefonecoo($telefone);
  $linhastel = mysqli_num_rows($resulttel);

  $resultpro = $admin->verificaremailpro($email);
  $linhaspro = mysqli_num_rows($resultpro);

  $resultnomepro = $admin->verificarnomepro($nome);
  $linhasnomepro = mysqli_num_rows($resultnomepro);

  $resultcpfpro = $admin->verificarcpfpro($cpf);
  $linhascpfpro = mysqli_num_rows($resultcpfpro);

  $resulttelpro = $admin->verificartelefonepro($telefone);
  $linhastelpro = mysqli_num_rows($resulttelpro);
     //verificar se existe email igual  o banco   
  if($linhas >= 1){
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O email informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/pagesAdm/gcoord.php';

    </script>
    <?php
       //verificar se existe nome igual  o banco   
  }else if ($linhastel >= 1) {
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O telefone informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/pagesAdm/gcoord.php';

    </script>
    <?php
  }else if($linhaspro >= 1){
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O email informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/pagesAdm/gcoord.php';

    </script>
    <?php
       //verificar se existe nome igual  o banco   
  }else if($linhascpfpro >= 1){
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O cpf informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/pagesAdm/gcoord.php';

    </script>
    <?php
        //verificar se existe telefone igual no banco
  }else if ($linhastelpro >= 1) {
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O telefone informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/pagesAdm/gcoord.php';

    </script>
    <?php
  
  }else{

    //-----------CADASTRAR SE TUDO OK-----------
    $admin->cadastrocoordenador($email, $senha, $nome, $cpf, $telefone, $idescola);

    $_SESSION['alert_admin'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Pronto, coordenador(a) cadastrado(a)! <i class='far fa-thumbs-up'></i>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/pagesAdm/gcoord.php';

    </script>
    <?php
  }
}
//---------- EDITAR COO ----------------
else if (isset($_POST['editarcoo'])) {
    $nome = strtoupper($_POST['nome']);
  $cpf = $_POST['cpf'];
  $email = strtoupper($_POST['email']);
  $senha = $_POST['senha'];
  $telefone = $_POST['telefone'];
  $idescola = $_POST['idescola'];
  $cooid = $_POST['cooid'];

  $result = $admin->verificaremaileditarcoo($email, $cooid);
  $linhas = mysqli_num_rows($result);

  $resultnome = $admin->verificarnomeeditarcoo($nome, $cooid);
  $linhasnome = mysqli_num_rows($resultnome);

  $resultcpf = $admin->verificarcpfeditarcoo($cpf, $cooid);
  $linhascpf = mysqli_num_rows($resultcpf);

  $resulttel = $admin->verificartelefoneeditarcoo($telefone, $cooid);
  $linhastel = mysqli_num_rows($resulttel);

  $resultpro = $admin->verificaremailpro($email);
  $linhaspro = mysqli_num_rows($resultpro);

  $resultnomepro = $admin->verificarnomepro($nome);
  $linhasnomepro = mysqli_num_rows($resultnomepro);

  $resultcpfpro = $admin->verificarcpfpro($cpf);
  $linhascpfpro = mysqli_num_rows($resultcpfpro);

  $resulttelpro = $admin->verificartelefonepro($telefone);
  $linhastelpro = mysqli_num_rows($resulttelpro);

     //verificar se existe email igual  o banco   
  if($linhas >= 1){
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O email informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/gcoord.php';

    </script>
    <?php
       //verificar se existe nome igual  o banco   
  }else if ($linhastel >= 1) {
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O telefone informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/pagesAdm/gcoord.php';

    </script>
    <?php
  }else if($linhaspro >= 1){
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O email informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/pagesAdm/gcoord.php';

    </script>
    <?php
       //verificar se existe nome igual  o banco   
  }else if($linhascpfpro >= 1){
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O cpf informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/pagesAdm/gcoord.php';

    </script>
    <?php
        //verificar se existe telefone igual no banco
  }else if ($linhastelpro >= 1) {
    $_SESSION['alert_admin'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    O telefone informado já está sendo usado!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/pagesAdm/gcoord.php';

    </script>
    <?php
  
  }else{

    //-----------CADASTRAR SE TUDO OK-----------
    $admin->editarcoordenador($email, $senha, $nome, $cpf, $telefone, $idescola, $cooid);

    $_SESSION['alert_admin'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    Pronto, coordenador(a) editado(a)! <i class='far fa-thumbs-up'></i>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
      location.href = '../View/Admin/pagesAdm/gcoord.php';

    </script>
    <?php
  }
}
?>