<?php 
include '../Model/M_Plano.php';
$plano = new M_Plano("", "");

	$especificacao = $_REQUEST['espec'];
	
	$result = $plano->exibirdisciplina($especificacao);

	while ($linhas = mysqli_fetch_assoc($result) ) {
		$area_post[] = array(
			'areaconhecimento' => $linhas['des_disciplina'],
		);
	}
	
	echo(json_encode($area_post));
