<?php
/*
Esta classe representa a tabela do banco de dados
na camada da aplicação.
Aqui, nós também iremos adicionar os comandos
 de DML para a execução do CRUD

    C -> Create(insert)
    R -> Read(Select)
    U -> Update(Atualização)
    D -> Delete(Apagar)
*/
class Preco{
    public $idpreco;
    public $preco;
    

    //Vamos criar o construtor da classe
    public function __construct($db){
        $this->conn = $db;
    }

    /*
    Vamos criar uma estrutura de listagem de dados cadastrados
    no banco e na tabela usuarios
    */
    public function listar(){
        //Vamos criar uma consulta para listar os usuarios
        $query = "select * from preco";

        //Vamos preparar a consulta para ser executada
        $stmt = $this->conn->prepare($query);

        //Agora vamos executar a consulta
        $stmt->execute();

        return $stmt;
    }

    public function cadastro(){
        $query = "insert into preco
                    set preco=:p";
        
        $stmt=$this->conn->prepare($query);

        $this->preco = htmlspecialchars(strip_tags($this->preco));
    
        $stmt->bindParam(":p",$this->preco);

        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function atualizar(){
        $query = "update preco
                    set preco=:p where id=:i";
        
        $stmt=$this->conn->prepare($query);

        $this->preco = htmlspecialchars(strip_tags($this->preco));
        $this->idpreco = htmlspecialchars(strip_tags($this->idpreco));
            
        $stmt->bindParam(":p",$this->preco);
        $stmt->bindParam(":i",$this->idpreco);
    
        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function apagar(){
        $query = "delete from preco where id=?";

        $stmt = $this->conn->prepare($query);

        $this->idpreco=htmlspecialchars(strip_tags($this->idpreco));

        $stmt->bindParam(1,$this->idpreco);

        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

}
?>