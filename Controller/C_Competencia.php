<?php 
include '../Model/M_Plano.php';
$plano = new M_Plano("", "");

	$areaconhecimento = $_REQUEST['areaconhecimento'];
	
	$result = $plano->exibircompetencia($areaconhecimento);

	while ($linhas = mysqli_fetch_assoc($result) ) {
		$area_post[] = array(
			'competencia' => $linhas['des_competencia'],
		);
	}
	
	echo(json_encode($area_post));
