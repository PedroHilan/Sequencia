<?php
include '../Model/M_Plano.php';

session_start();
$plano = new M_Plano("", "");

$nome = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
$id_escola = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

$resultado = $plano->pesquisarprofessoresc($id_escola, $nome);

$linhas = mysqli_num_rows($resultado);
$contador = 1;
if ($linhas >= 1) {
	while ($dados = mysqli_fetch_assoc($resultado)) {
		echo "<tr>
	
		<td style='font-size:20%;'><a href='gprof.php?proid=".$dados['pro_id']."'><button type='button' class='btn btn-success'>Editar</button></a></td>
		<td style='font-size:90%;'>".$dados['pro_nome']."</td>
		<td style='font-size:90%;'>".$dados['esc_nome']."</td>
		</tr>";
	
	}
}else{
	echo "Nenhum dado encontrado!";
}
?>