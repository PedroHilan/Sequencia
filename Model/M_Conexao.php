<?php
header('Content-Type: text/html; charset=utf-8');
class conexao{

    //------------conexão----------
    public function conectar(){
        $servidor = "localhost";
        $usuario = "root";
        $senha = "root";
        $banco = "bd_sequencia";

         $this->conexao = mysqli_connect($servidor, $usuario, $senha, $banco) or die("ERRROOOOOOOOO");
         $this->executarSQL('SET NAMES UTF8');
         
       //------------funçoes da conexão----------         
    }
    
    public function ExecutarSQL($sql) {
        $this->result = mysqli_query($this->conexao, $sql);
        
    }
    public function PesquisarSQL($sql) {
        $this->result = mysqli_query($this->conexao, $sql);
        return $this->result;  
        
    }
    
    public function desconectar() {
        mysqli_close($this->conexao);
    }

     
}
   