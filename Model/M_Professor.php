<?php

include 'M_Conexao.php';

class M_Professor{
 
    private  $id;
    private  $email;
    private  $senha; 
    private  $nome;
    private  $cpf;
    private  $telefone;

    function __construct($id, $email, $senha, $nome, $cpf, $telefone) {
        $this->id = $id;
        $this->email = $email;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        
    }

    function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
//-----------------------
    function getEmail() {
        return $this->email;
    }
    function setEmail($email) {
        $this->email = $email;
    }
//-----------------------
    function setSenha($senha) {
        $this->senha = $senha;
    }
    function getSenha() {
        return $this->senha;
    }
//-----------------------
    function getNome() {
        return $this->nome;
    }
    function setNome($nome) {
        $this->nome = $nome;
    }
//-----------------------
    function getCpf() {
        return $this->cpf;
    }
    function setCpf($cpf) {
        $this->cpf = $cpf;
    }
//-----------------------
    function getTelefone() {
        return $this->telefone;
    }
    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
//-----------------------

    function loginprofessor($email, $senha) {
        $sql = "Select * from tb_professor where pro_email = '$email' and pro_senha = '$senha' and pro_verificacao = 'ATIVO' ";       
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;   
    }
    
    function logincoordenador($email, $senha) {
        $sql = "Select * from tb_coordenador inner join tb_escola on(tb_coordenador.esc_id = tb_escola.esc_id) where coo_email = '$email' and coo_senha = '$senha'";       
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;   
    }

    function loginescola($email, $senha) {
        $sql = "Select * from tb_escola where esc_email = '$email' and esc_senha = '$senha' ";       
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;   
    }
    
    function loginadm($adm_email, $adm_senha) {
        $sql = "Select * from tb_admin where adm_login = '$adm_email' and adm_senha = '$adm_senha'";       
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;   
    }

     function nomeescola() {
        $sql = "Select * FROM `tb_coordenador` INNER JOIN tb_escola ON(tb_coordenador.esc_id = tb_escola.esc_id)";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result; 
    }
    
    function cadastrar($email,$senha,$nome,$cpf,$telefone,$situacao,$idescola) {
        $sql = "INSERT INTO `tb_professor` (`pro_email`, `pro_senha`, `pro_nome`, `pro_cpf`, `pro_telefone`, `pro_verificacao`, `esc_id`) VALUES ('$email', '$senha', '$nome', '$cpf', '$telefone', '$situacao', '$idescola');";
        $Conexao = new Conexao();
        $Conexao->conectar();    
        $Conexao->executarSQL($sql);
        $Conexao->desconectar();
    }
    
    function escolas() {
        $sql = "Select * FROM `tb_escola`";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificaremail($email) {
        $sql = "Select * FROM `tb_professor` WHERE pro_email = '$email' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificaremaileditar($email, $id) {
        $sql = "Select * FROM `tb_professor` WHERE pro_email = '$email' AND pro_id != $id";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificarnome($nome) {
        $sql = "Select * FROM `tb_professor` WHERE pro_nome = '$nome' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificarnomeeditar($nome, $id) {
        $sql = "Select * FROM `tb_professor` WHERE pro_nome = '$nome' AND pro_id != $id";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificarcpf($cpf) {
        $sql = "Select * FROM `tb_professor` WHERE pro_cpf = '$cpf' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificarcpfeditar($cpf, $id) {
        $sql = "Select * FROM `tb_professor` WHERE pro_cpf = '$cpf' AND pro_id != $id";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificartelefone($telefone) {
        $sql = "Select * FROM `tb_professor` WHERE pro_telefone = '$telefone' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificartelefoneeditar($telefone, $id) {
        $sql = "Select * FROM `tb_professor` WHERE pro_telefone = '$telefone' AND pro_id != $id";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }
    //--------------------------------------------------------
    function verificaremailcoo($email) {
        $sql = "Select * FROM `tb_coordenador` WHERE coo_email = '$email' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificarnomecoo($nome) {
        $sql = "Select * FROM `tb_coordenador` WHERE coo_nome = '$nome' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificarcpfcoo($cpf) {
        $sql = "Select * FROM `tb_coordenador` WHERE coo_cpf = '$cpf' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificartelefonecoo($telefone) {
        $sql = "Select * FROM `tb_coordenador` WHERE coo_telefone = '$telefone' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }
    //--------------------------------------------------------
    function precadastrar($email,$senha,$nome,$cpf,$telefone,$idescola) {
        $sql = "INSERT INTO `tb_professor` (`pro_email`, `pro_senha`, `pro_nome`, `pro_cpf`, `pro_telefone`, `pro_verificacao`, `esc_id`) VALUES ('$email', '$senha', '$nome', '$cpf', '$telefone', 'INATIVO', '$idescola');";
        $Conexao = new Conexao();
        $Conexao->conectar();    
        $Conexao->executarSQL($sql);
        $Conexao->desconectar();
    }

    function professorinativo($idescola) {
        $sql = "Select * FROM `tb_professor` WHERE pro_verificacao = 'INATIVO' AND esc_id = '$idescola' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function ativarprofessor($id) {
        $sql = "UPDATE `tb_professor` SET `pro_verificacao` = 'ATIVO' WHERE `tb_professor`.`pro_id` = $id;";
        $Conexao = new Conexao();
        $Conexao->conectar();    
        $Conexao->executarSQL($sql);
        $Conexao->desconectar();
    }
    
    function excluirprofessor($id) {
        $sql = "DELETE FROM `tb_professor` WHERE `tb_professor`.`pro_id` = '$id';";
        $Conexao = new Conexao();
        $Conexao->conectar();    
        $Conexao->executarSQL($sql);
        $Conexao->desconectar();
    }

    function editarprofessor($email, $senha, $nome, $cpf, $telefone, $id) {
        $sql = "UPDATE `tb_professor` SET `pro_email` = '$email', `pro_senha` = '$senha', `pro_nome` = '$nome', `pro_cpf` = '$cpf', `pro_telefone` = '$telefone' WHERE `tb_professor`.`pro_id` = $id;";
        $Conexao = new Conexao();
        $Conexao->conectar();    
        $Conexao->executarSQL($sql);
        $Conexao->desconectar();
    }

    function buscarcooid($id) {
        $sql = "Select * FROM `tb_coordenador` WHERE coo_id = $id ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }
}