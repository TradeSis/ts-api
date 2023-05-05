<?php

$conexao = conectaMysql();
if (isset($jsonEntrada['idUsuario'])) {
    $idUsuario = $jsonEntrada['idUsuario'];
    $nomeUsuario = $jsonEntrada['nomeUsuario'];
    $email = $jsonEntrada['email'];
    $password = $jsonEntrada['password'];
    $idAplicativo = $jsonEntrada['idAplicativo'];
    $nivelMenu = $jsonEntrada['nivelMenu'];

    $sql = "UPDATE `usuario` SET `nomeUsuario`='$nomeUsuario',`email`='$email',`password` = '$password',`statusUsuario`='1' WHERE idUsuario = $idUsuario";
    // echo "-ENTRADA->".$sql."\n"; 

    if ($atualizar = mysqli_query($conexao, $sql)) {

        // Inserir novo registro na tabela usuarioaplicativo
        $sqlInsert = "UPDATE usuarioaplicativo SET idAplicativo ='$idAplicativo', nivelMenu = $nivelMenu WHERE idUsuario = $idUsuario and idAplicativo = '$idAplicativo'";
        if (mysqli_query($conexao, $sqlInsert)) {
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
