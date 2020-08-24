<?php
include 'M_Conexao.php';

class M_Plano{
 
    private  $id;
    private  $pdf;

    function __construct($id, $pdf) {
        $this->id = $id;
        $this->pdf = $pdf;
    }

//-----------------------
    function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
//-----------------------
    function getPdf() {
        return $this->pdf;
    }
    function setPdf($pdf) {
        $this->pdf = $pdf;
    }

    function cadastro($data, $turma, $duracao, $detalhamento, $pdf, $pro_id, $des_id) {
        $sql = "INSERT INTO `tb_plano`( `pla_dataaula`, `pla_turma`, `pla_duracao`, `pla_detalhamento`,`pla_pdf`, `pro_id`, `des_id`) VALUES ('$data', '$turma', '$duracao', '$detalhamento','$pdf','$pro_id','$des_id')";
        $Conexao = new Conexao();
        $Conexao->conectar();    
        $Conexao->executarSQL($sql);
        $Conexao->desconectar();
    }

    function exibirdisciplina($nome) {
        $sql = "SELECT des_id, des_disciplina FROM tb_descritores WHERE des_especificacao = '$nome' GROUP BY(des_disciplina)";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function exibircompetencia($nome) {
        $sql = "SELECT des_id, des_competencia FROM tb_descritores WHERE des_disciplina = '$nome' GROUP BY(des_competencia)";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }
    
    function exibirdescritor($nome) {
        $sql = "SELECT * FROM tb_descritores WHERE des_competencia = '$nome'";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function buscardownload($id) {
        $sql = "SELECT * FROM tb_plano WHERE pla_id = $id";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function contardownload($id, $qtde) {
        $sql = "UPDATE `tb_plano` SET `pla_download` = $qtde WHERE `tb_plano`.`pla_id` = $id;";
        $Conexao = new Conexao();
        $Conexao->conectar();    
        $Conexao->executarSQL($sql);
        $Conexao->desconectar();
    }

    function rankprofessor() {
        $sql = "SELECT tb_professor.pro_nome, tb_escola.esc_nome, SUM(pla_download) FROM `tb_plano` INNER JOIN tb_professor ON (tb_plano.pro_id = tb_professor.pro_id) INNER JOIN tb_escola ON (tb_professor.esc_id = tb_escola.esc_id) GROUP BY (pro_nome) ORDER BY SUM(pla_download) DESC LIMIT 5";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }    

    function rankescola() {
        $sql = "SELECT tb_escola.esc_nome, tb_escola.esc_email, SUM(pla_download) FROM `tb_plano` INNER JOIN tb_professor ON(tb_plano.pro_id = tb_professor.pro_id) INNER JOIN tb_escola ON(tb_professor.esc_id = tb_escola.esc_id) GROUP BY(tb_escola.esc_nome) ORDER BY SUM(pla_download) DESC LIMIT 5";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function rankdescritores() {
        $sql = "SELECT tb_descritores.des_especificacao, tb_descritores.des_descritor, tb_descritores.des_contador FROM tb_descritores ORDER BY tb_descritores.des_contador DESC LIMIT 5";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }
    
    function pesquisardes($iddes) {
        $sql = "SELECT des_contador FROM tb_descritores WHERE des_id = $iddes";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function contardescritor($iddes, $qtde) {
        $sql = "UPDATE `tb_descritores` SET des_contador = $qtde WHERE `tb_descritores`.`des_id` = $iddes;";
        $Conexao = new Conexao();
        $Conexao->conectar();    
        $Conexao->executarSQL($sql);
        $Conexao->desconectar();
    }
    
    function pesquisarnomedes($iddes) {
        $sql = "SELECT des_id, des_descritor FROM `tb_descritores` WHERE des_id = $iddes";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function pesquisarprofessoresc($id, $nome) {
        $sql = "SELECT * FROM `tb_professor` INNER JOIN tb_escola ON(tb_professor.esc_id = tb_escola.esc_id) WHERE tb_professor.esc_id = $id AND pro_nome LIKE '%$nome%' AND tb_professor.pro_verificacao = 'ATIVO' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function pesquisarprofessor($id) {
        $sql = "SELECT * FROM `tb_professor` INNER JOIN tb_escola ON(tb_professor.esc_id = tb_escola.esc_id) WHERE tb_professor.pro_id = $id";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function exibir(){
        $sql = "SELECT * FROM `tb_plano` INNER JOIN tb_descritores ON (tb_descritores.des_id = tb_plano.des_id) INNER JOIN tb_professor ON (tb_plano.pro_id = tb_professor.pro_id) INNER JOIN tb_escola ON (tb_professor.esc_id = tb_escola.esc_id)";
        $Conexao = new Conexao();
        $Conexao->conectar();        
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;   
    }
}
?>