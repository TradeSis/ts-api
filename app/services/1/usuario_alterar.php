<?php
// Lucas 03032023 - criação 
 //echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idUsuario'])) {
    $idUsuario = $jsonEntrada['idUsuario'];
    $nomeUsuario = $jsonEntrada['nomeUsuario'];
    $email = $jsonEntrada['email'];
    $cpfCnpj = $jsonEntrada['cpfCnpj'];
    $telefone = $jsonEntrada['telefone'];
    $password = $jsonEntrada['password'];

    $sql = "UPDATE `usuario` SET `nomeUsuario`='$nomeUsuario', `email`='$email', `cpfCnpj`='$cpfCnpj', `telefone`='$telefone', `password` = '$password' WHERE idUsuario = $idUsuario";
   // echo "-ENTRADA->".$sql."\n"; 
    
    if ($atualizar = mysqli_query($conexao, $sql)) {
        $jsonSaida = array(
            "status" => 200,
            "retorno" => "ok"
        );
    } else {
        $jsonSaida = array(
            "status" => 500,
            "retorno" => "erro no mysql"
        );
    }
} else {
    $jsonSaida = array(
        "status" => 400,
        "retorno" => "Faltaram parametros"
    );

}

?>