<?php 
include '../Model/M_Plano.php';
$plano = new M_Plano("", "");

	$competencia = $_REQUEST["competencia"];
	
	$result = $plano->exibirdescritor($competencia);

	while ($linhas = mysqli_fetch_assoc($result) ) {
		$area_post[] = array(
			'id' => $linhas['des_id'],
			'descritor' => $linhas['des_descritor'],
		);
	}
	
	echo(json_encode($area_post));
