<?php
include '../Model/M_Admin.php';
session_start();
$admin = new M_Admin("", "", "");

$nomecoo = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

$resultado = $admin->buscarcoo($nomecoo);
$linhas = mysqli_num_rows($resultado);
$contador = 1;
if ($linhas >= 1) {
	while ($dados = mysqli_fetch_assoc($resultado)) {
		echo "<tr>
	
		<td style='font-size:20%;'><a href='gcoord.php?cooid=".$dados['coo_id']."'><button type='button' class='btn btn-success'>Editar</button></a></td>
		<td style='font-size:71%;'>".$dados['coo_nome']."</td>
		<td style='font-size:71%;'>".$dados['esc_nome']."</td>
		</tr>";
	
	}
}else{
	echo "Nenhum coordenador(a) encontrado(a)!";
}
?>