<?php
include '../Model/M_Plano.php';

session_start();
$plano = new M_Plano("", "");

$param = filter_input(INPUT_GET, "file" ,FILTER_DEFAULT);
$result = $plano->buscardownload($_GET['file']);

function InputHeader($FILENAME, $FILEPATH){
	header('Content-disposition: attachment; filename="'.$FILENAME.'"');
	header('Content-type: application/pdf');
	readfile($FILEPATH);
}

$dados = mysqli_fetch_assoc($result);

$FILENAME = $dados['pla_pdf'];
$FILEPATH = "../View/PDFS/".$FILENAME;
InputHeader($FILENAME, $FILEPATH);

$qtde_download = $dados['pla_download'] + 1;
$plano->contardownload($_GET['file'],$qtde_download);
header("location: ../View/Professor/pagesAdm/buscarsequencia.php");   

?>	