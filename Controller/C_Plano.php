<?php
include '../Model/M_Plano.php';

session_start();
$plano = new M_Plano("", "");

if (isset($_POST['descritor'])) {
    
}else{ $_POST['descritor'] = 1; }

$idprof = $_POST['idprof'];
$iddes = $_POST['descritor'];
$data = $_POST['dataNacimento'];
$duracao = $_POST['duracao'];
$turma = $_POST['serie']." - ".$_POST['turma'];
$detalhamento = $_POST['detalhamento'];

    	if ($_FILES["fileToUpload"]["name"] != null) {

    		$target_dir ="../View/PDFS/";
    		$extensao = pathinfo($_FILES["fileToUpload"]["name"]);
    		$extensao = ".".$extensao['extension'];
    		$pdf = time().uniqid(md5("")).$extensao;
    		$target_file = $target_dir . basename($pdf);
    		$uploadOk = 1;
    		$pdfFileType = pathinfo($target_file);

        // Verifica o tamanho do arquivo
    		if ($_FILES["fileToUpload"]["size"] > 9000000) {
               $_SESSION['erroup'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
               Arquivo muito grande! <i class='far fa-thumbs-down'></i>
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
               </button>
               </div>";
               ?>
               <script type="text/javascript">
                location.href = '../View/Professor/index.php';
            </script>
            <?php
            $uploadOk = 0;
        }
        // Verifica se o arquivo é '.pdf'
        if($pdfFileType['extension'] != "pdf") {
         $_SESSION['erroup'] = "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
         Somente arquivos PDF! <i class='far fa-thumbs-down'></i>
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
         <span aria-hidden='true'>&times;</span>
         </button>
         </div>";
         ?>
         <script type="text/javascript">
            location.href = '../View/Professor/index.php';
        </script>
        <?php
        $uploadOk = 0;
    }
        // Verifica se deu algum erro
    if ($uploadOk == 0) {
        ?>
        <script type="text/javascript">
            location.href = '../View/Professor/index.php';
        </script>
        <?php
        // Se tudo estiver ok, ele tenta fazer o upload
    } else {

     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       
         $plano->setPdf($pdf);

         $plano->cadastro($data, $turma, $duracao, $detalhamento, $plano->getPdf(), $idprof, $iddes);
         $resultcont = $plano->pesquisardes($iddes);
         $dados = mysqli_fetch_array($resultcont);
         $qtde = $dados['des_contador'] + 1; 
         $plano->contardescritor($iddes, $qtde);
         
         $_SESSION['erroup'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
         Pronto, arquivo enviado! <i class='far fa-thumbs-up'></i>
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
         <span aria-hidden='true'>&times;</span>
         </button>
         </div>";
     } else {
        $_SESSION['erroup'] = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        Houve algum erro no upload! <i class='far fa-thumbs-down'></i>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        </div>";
    }
}
?>
<script type="text/javascript">
    location.href = '../View/Professor/index.php';
</script>

<?php	
}else{
    $_SESSION['erroup'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    Nenhum arquivo selecionado! <i class='far fa-thumbs-down'></i>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
    ?>
    <script type="text/javascript">
        location.href = '../View/Professor/index.php';
    </script> 
    <?php
}