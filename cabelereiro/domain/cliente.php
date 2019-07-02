<?php

class Cliente{
    public $idcliente;
    public $nome;
    public $cpf;
    public $sexo;
    public $idendereco;
    public $idcontato;
    public $idusuario;

    public function __construct($db){
        $this->conn = $db;
    }

    public function listar(){
        $query = "select * from cliente";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();   

        return $stmt;
    }

    public function cadastro(){
        $query = "insert into cliente set nome=:n, cpf=:c, sexo=:s, idendereco=:ie, idcontato=:ic, idusuario=:iu";
        
        $stmt=$this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->sexo = htmlspecialchars(strip_tags($this->sexo));
        $this->idendereco = htmlspecialchars(strip_tags($this->idendereco));
        $this->idcontato = htmlspecialchars(strip_tags($this->idcontato));
        $this->idusuario = htmlspecialchars(strip_tags($this->idusuario));


        $stmt->bindParam(":n",$this->nome);
        $stmt->bindParam(":c",$this->cpf);
        $stmt->bindParam(":s",$this->sexo);
        $stmt->bindParam(":ie",$this->idendereco);
        $stmt->bindParam(":ic",$this->idcontato);
        $stmt->bindParam(":iu",$this->idusuario);


        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function atualizar(){
        $query = "update cliente set nome=:n, cpf=:c, sexo=:s, idendereco=:ie, idcontato=:ic, idusuario=:iu where id=:idc";
        
        $stmt=$this->conn->prepare($query);

        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->sexo = htmlspecialchars(strip_tags($this->sexo));
        $this->idendereco = htmlspecialchars(strip_tags($this->idendereco));
        $this->idcontato = htmlspecialchars(strip_tags($this->idcontato));
        $this->idusuario = htmlspecialchars(strip_tags($this->idusuario));
        $this->idcliente = htmlspecialchars(strip_tags($this->idcliente));


        $stmt->bindParam(":n",$this->nome);
        $stmt->bindParam(":c",$this->cpf);
        $stmt->bindParam(":s",$this->sexo);
        $stmt->bindParam(":ie",$this->idendereco);
        $stmt->bindParam(":ic",$this->idcontato);
        $stmt->bindParam(":iu",$this->idusuario);
        $stmt->bindParam(":idc",$this->idcliente);


        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }


    public function apagar(){
        $query = "delete from cliente where id=?";

        $stmt = $this->conn->prepare($query);

        $this->idcliente=htmlspecialchars(strip_tags($this->idcliente));

        $stmt->bindParam(1,$this->idcliente);

        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

}


