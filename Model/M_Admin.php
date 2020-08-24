    <?php
include 'M_Conexao.php';

class M_Admin{
 
    private  $adm_id;
    private  $adm_login;
    private  $adm_senha;

    function __construct($adm_id, $adm_login, $adm_senha) {
        $this->id = $adm_id;
        $this->login = $adm_login;
        $this->senha = $adm_senha;
    }

//-----------------------
    function getId() {
        return $this->id;
    }
    function setId($adm_id) {
        $this->id = $adm_id;
    }
//-----------------------
    function getLogin() {
        return $this->login;
    }
    function setLogin($adm_login) {
        $this->login = $adm_login;
    }
//-----------------------
    function getSenha() {
        return $this->senha;
    }
    function setSenha($adm_senha) {
        $this->senha = $adm_senha;
    }

    function login($adm_email, $adm_senha) {
        $sql = "Select * from tb_admin where adm_email = '$adm_email' and adm_senha = '$adm_senha'";       
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;   
    }

    function cadastroescola($email, $senha, $nome, $cnpj, $telefone, $bairro, $logradouro, $nomelogra, $numero) {
        $sql = "INSERT INTO `tb_escola` (`esc_email`, `esc_senha`, `esc_nome`, `esc_cnpj`, `esc_telefone`, `esc_bairro`, `esc_logradouro`, `esc_nomelogra`, `esc_numero`) VALUES ('$email', '$senha', '$nome', '$cnpj', '$telefone', '$bairro', '$logradouro', '$nomelogra', '$numero');";
        $Conexao = new Conexao();
        $Conexao->conectar();    
        $Conexao->executarSQL($sql);
        $Conexao->desconectar();
    }

    function cadastrocoordenador($email, $senha, $nome, $cpf, $telefone, $idesc) {
        $sql = "INSERT INTO `tb_coordenador` (`coo_email`, `coo_senha`, `coo_nome`, `coo_cpf`, `coo_telefone`, `esc_id`) VALUES ('$email', '$senha', '$nome', '$cpf', '$telefone', '$idesc');";
        $Conexao = new Conexao();
        $Conexao->conectar();    
        $Conexao->executarSQL($sql);
        $Conexao->desconectar();
    }
    //--------------------------------------------------------    
    function verificaremail($email) {
        $sql = "Select * FROM `tb_escola` WHERE esc_email = '$email' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificaremaileditar($email, $id) {
        $sql = "Select * FROM `tb_escola` WHERE esc_email = '$email' AND esc_id != $id";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificarnome($nome) {
        $sql = "Select * FROM `tb_escola` WHERE esc_nome = '$nome' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificarnomeeditar($nome, $id) {
        $sql = "Select * FROM `tb_escola` WHERE esc_nome = '$nome' AND esc_id != $id";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificarcnpj($cnpj) {
        $sql = "Select * FROM `tb_escola` WHERE esc_cnpj = '$cnpj' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificarcnpjeditar($cnpj, $id) {
        $sql = "Select * FROM `tb_escola` WHERE esc_cnpj = '$cnpj' AND esc_id != $id";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificartelefone($telefone) {
        $sql = "Select * FROM `tb_escola` WHERE esc_telefone = '$telefone' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificartelefoneeditar($telefone, $id) {
        $sql = "Select * FROM `tb_escola` WHERE esc_telefone = '$telefone' AND esc_id != $id";
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

    function verificaremaileditarcoo($email, $id) {
        $sql = "Select * FROM `tb_coordenador` WHERE coo_email = '$email' AND coo_id != $id";
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

    function verificarnomeeditarcoo($nome, $id) {
        $sql = "Select * FROM `tb_coordenador` WHERE coo_nome = '$nome' AND coo_id != $id";
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

    function verificarcpfeditarcoo($cpf, $id) {
        $sql = "Select * FROM `tb_coordenador` WHERE coo_cpf = '$cpf' AND coo_id != $id";
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

    function verificartelefoneeditarcoo($telefone, $id) {
        $sql = "Select * FROM `tb_coordenador` WHERE coo_telefone = '$telefone' AND coo_id != $id";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }
    //--------------------------------------------------------
    function verificaremailpro($email) {
        $sql = "Select * FROM `tb_professor` WHERE pro_email = '$email' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificarnomepro($nome) {
        $sql = "Select * FROM `tb_professor` WHERE pro_nome = '$nome' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificarcpfpro($cpf) {
        $sql = "Select * FROM `tb_professor` WHERE pro_cpf = '$cpf' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function verificartelefonepro($telefone) {
        $sql = "Select * FROM `tb_professor` WHERE pro_telefone = '$telefone' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }
    //--------------------------------------------------------
    function buscarescola($nome) {
        $sql = "Select * FROM `tb_escola` WHERE esc_nome LIKE '%$nome%' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function buscarcoo($nome) {
        $sql = "Select * FROM `tb_coordenador` INNER JOIN tb_escola ON(tb_coordenador.esc_id = tb_escola.esc_id) WHERE coo_nome LIKE '%$nome%' ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function buscarescolaid($id) {
        $sql = "Select * FROM `tb_escola` WHERE esc_id = $id ";
        $Conexao = new conexao();
        $Conexao->conectar();       
        $this->result = $Conexao->PesquisarSQL($sql);
        $Conexao->desconectar();
        return $this->result;
    }

    function editarescola($email, $senha, $nome, $cnpj, $telefone, $bairro, $logradouro, $nomelogra, $numero, $id) {
        $sql = "UPDATE `tb_escola` SET `esc_email` = '$email', `esc_senha` = '$senha', `esc_nome` = '$nome', `esc_cnpj` = '$cnpj', `esc_telefone` = '$telefone', `esc_bairro` = '$bairro', `esc_logradouro` = '$logradouro', `esc_nomelogra` = '$nomelogra', `esc_numero` = '$numero' WHERE `tb_escola`.`esc_id` = $id;";
        $Conexao = new Conexao();
        $Conexao->conectar();    
        $Conexao->executarSQL($sql);
        $Conexao->desconectar();
    }
    
    function editarcoordenador($email, $senha, $nome, $cpf, $telefone, $escid, $cooid) {
        $sql = "UPDATE `tb_coordenador` SET `coo_email` = '$email', `coo_senha` = '$senha', `coo_nome` = '$nome', `coo_cpf` = '$cpf', `coo_telefone` = '$telefone', `esc_id` = '$escid' WHERE `tb_coordenador`.`coo_id` = $cooid;";
        $Conexao = new Conexao();
        $Conexao->conectar();    
        $Conexao->executarSQL($sql);
        $Conexao->desconectar();
    }
    
}
?>