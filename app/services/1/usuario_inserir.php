<?php
//gabriel 06022023 16:52
/* echo "-ENTRADA->".json_encode($jsonEntrada)."\n"; */


$conexao = conectaMysql();
$idUsuario = null;

if (isset($jsonEntrada['nomeUsuario'])) {

    $nomeUsuario = $jsonEntrada['nomeUsuario'];
    $idCliente = $jsonEntrada['idCliente'];
    $email = $jsonEntrada['email'];
    $password = $jsonEntrada['password'];
    $idAplicativo = $jsonEntrada['idAplicativo'];
    $nivelMenu = $jsonEntrada['nivelMenu'];

    $sql = "INSERT INTO `usuario`( `nomeUsuario`, `email`, `password`) VALUES ('$nomeUsuario','$email','$password')";

    if ($atualizar = mysqli_query($conexao, $sql)) {

            //buscar idUsuario inserido
            $sqlusu = "SELECT usuario.* FROM usuario ";
            $sqlusu = $sqlusu . "where email = '" . $jsonEntrada["email"] . "'";
            $buscarUsu = mysqli_query($conexao, $sqlusu);
            $row = mysqli_fetch_array($buscarUsu, MYSQLI_ASSOC);
            if (isset($row["idUsuario"])) {
                $idUsuario = $row["idUsuario"];
            }

        // Inserir usuarioaplicativo
        $sqlInsert = "INSERT INTO usuarioaplicativo(idUsuario, idAplicativo, nivelMenu) VALUES ($idUsuario, '$idAplicativo', $nivelMenu)";
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