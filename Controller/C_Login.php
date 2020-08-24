<?php
include '../Model/M_Professor.php';

session_start();
$login = new M_Professor("", "", "", "", "","");

if (isset($_POST['email']) && isset($_POST['pass'])) {

    $email_m = strtoupper($_POST['email']);
    $email = $email_m;
    $senha = $_POST['pass'];
    
    $login->setEmail($email);   
    $login->setSenha($senha);
    
    $result = $login->loginprofessor($login->getEmail(), $login->getSenha());
    $linhas=mysqli_num_rows($result);

    $resultcoo = $login->logincoordenador($email, $senha);
    $linhascoo =mysqli_num_rows($resultcoo);
     
    $resultadm = $login->loginadm($email,$senha);
    $linhasadm = mysqli_num_rows($resultadm);
            
    if ($linhas >= 1) {
       $dados = mysqli_fetch_array($result);
       $_SESSION['nomeprof'] = $dados['pro_nome'];
       $_SESSION['idprof'] = $dados['pro_id'];
        
       $_SESSION['loginprof'] = "Logou";
       $_SESSION['modal'] = "sim";
       header("location: ../View/Professor/index.php");

    }else if ($linhascoo >= 1) {
        $coo = mysqli_fetch_array($resultcoo);
        $_SESSION['nomeescola'] = $coo['esc_nome'];
        $_SESSION['idescola'] = $coo['esc_id'];
        
        $_SESSION['coo_nome'] = $coo['coo_nome'];
        $_SESSION['modal'] = "sim";
        $_SESSION['logincoo'] = "Logou";
        header("location: ../View/coordenador/index.php");

    }else if ($linhasadm >= 1) {
        $adm = mysqli_fetch_array($resultadm);
        $_SESSION['adm_nome'] = $adm['coo_nome'];
        $_SESSION['modal'] = "sim";
        $_SESSION['loginadm'] = "Logou";
        header("location: ../View/Admin/index.php");
        
    }else{
        $_SESSION['msgerro'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        Email e/ou senha incorreto(s)!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
        header("location: ../View/Login/index.php");
    }
               
    }else{
        ?>
        <script type="text/javascript">
            location.href = '../View/Login/index.php';
        </script>
        <?php
    }
