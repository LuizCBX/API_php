<?php


//Permite o acesso a qualquer protocolo(https, http, file)
header("Access-Control-Allow-Origin:*");

//Formato de trânsito, json com acentuação
header("Content-Type: application/json;charset=utf-8");

include_once "../../config/database.php";

include_once "../../domain/cliente.php";

$database = new Database();
$db = $database->getConnection();

$cliente = new Cliente($db);

$stmt =$cliente->listar();

if($stmt->rowCount()>0){
    $cliente_arr = array();
    $cliente_arr["saida"]=array();
    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($linha);
        $array_item = array(
            "idcliente"=>$id,
            "nome"=>$nome,
            "cpf"=>$cpf,
            "sexo"=>$sexo,
            "idendereco"=>$idendereco,
            "idcontato"=>$idcontato,
            "idusuario"=>$idusuario
        );

        array_push($cliente_arr["saida"],$array_item);
    
    }
    header('HTTP/1.0 200');
    echo json_encode($cliente_arr);
}
else
{
    header('HTTP/1.0 400');
    echo json_encode(array("mensagem"=>"Não há clientes cadastrados"));
}



?>

