<?php
//gabriel 06022023 16:52
/* echo "-ENTRADA->".json_encode($jsonEntrada)."\n"; */

$conexao = conectaMysql();
if (isset($jsonEntrada['nomeUsuario'])) {
    $nomeUsuario = $jsonEntrada['nomeUsuario'];
    $idCliente = $jsonEntrada['idCliente'];
    $email = $jsonEntrada['email'];
    $password = $jsonEntrada['password'];
    $statusUsuario = 0;

    

    $sql = "INSERT INTO `usuario`( `nomeUsuario`, `idCliente`, `email`, `password`, `statusUsuario`) VALUES ('$nomeUsuario', $idCliente, '$email',' $password', $statusUsuario)";
   /*  echo "-SQL->".json_encode($sql)."\n"; */

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