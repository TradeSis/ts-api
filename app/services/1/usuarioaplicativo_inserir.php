<?php
//Lucas 05042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idUsuario'])) {
    $idUsuario = $jsonEntrada['idUsuario'];
    $aplicativo = $jsonEntrada['aplicativo'];
    $nivelMenu = $jsonEntrada['nivelMenu'];
    
    $sql = "INSERT INTO usuarioaplicativo(idUsuario, aplicativo, nivelMenu) VALUES ($idUsuario, '$aplicativo', $nivelMenu)";
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