﻿<?php
/*
O arquivo database.php permite a comunicação com o banco de dados.
Vamos estabelecer a ponte com o servidor e acessar o banco usando nome de 
usuário e senha
*/
class Database{
    public $conn;

    public function getConnection(){
        try{
            $conn = new PDO("mysql:host=localhost;port=3306;dbname=dbcabelereiro","root","");
            $conn->exec("set names utf8");
        }
        catch(PDOException $ex){
            echo "Erro ao tentar estabelecer a comunicação com o banco de dados. ".$ex->getMessage();
        }
        return $conn;
    }

}
?>