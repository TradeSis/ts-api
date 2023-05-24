<?php
//gabriel 06022023 16:52
/* echo "-ENTRADA->".json_encode($jsonEntrada)."\n"; */

/* não gera mais secret */

$conexao = conectaMysql();
if (isset($jsonEntrada['nomeUsuario'])) {
    $nomeUsuario = $jsonEntrada['nomeUsuario'];
    $idCliente = $jsonEntrada['idCliente'];
    $email = $jsonEntrada['email'];
    $cpfCnpj = $jsonEntrada['cpfCnpj'];
    $telefone = $jsonEntrada['telefone'];
    $password = $jsonEntrada['password'];

    $statusUsuario = 0;

    $sql = "INSERT INTO `usuario`( `nomeUsuario`, `idCliente`, `email`, `cpfCnpj`, `telefone`, `password`, `statusUsuario`) VALUES ('$nomeUsuario', $idCliente, '$email', '$cpfCnpj', '$telefone', '$password', $statusUsuario)";
    
    if ($idCliente=="") { // sem id , tira do insert para deixar NULL
        $sql = "INSERT INTO `usuario`( `nomeUsuario`, `email`, `cpfCnpj`, `telefone`, `password`, `statusUsuario`) VALUES ('$nomeUsuario', '$email', '$cpfCnpj', '$telefone', '$password', $statusUsuario)";
    };


        //echo "-SQL->".$sql."\n"; 

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