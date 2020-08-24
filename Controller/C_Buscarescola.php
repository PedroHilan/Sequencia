<?php
include '../Model/M_Admin.php';
session_start();
$admin = new M_Admin("", "", "");

$nomeescola = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

$resultado = $admin->buscarescola($nomeescola);
$linhas = mysqli_num_rows($resultado);
$contador = 1;
if ($linhas >= 1) {
	while ($dados = mysqli_fetch_assoc($resultado)) {
		echo "<tr>
	
		<td style='font-size:20%;'><a href='index.php?escid=".$dados['esc_id']."'><button type='button' class='btn btn-success'>Editar</button></a></td>
		<td style='font-size:71%;'>".$dados['esc_nome']."</td>
		<td style='font-size:71%;'>".$dados['esc_cnpj']."</td>
		</tr>";
	
	}
}else{
	echo "Nenhuma escola encontrada!";
}
?>