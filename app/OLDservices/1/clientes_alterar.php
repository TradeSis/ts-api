<?php
// helio 31012023 criacao
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idCliente'])) {
    $idCliente = $jsonEntrada['idCliente'];
    $nomeCliente = $jsonEntrada['nomeCliente'];
    $sql = "UPDATE cliente SET nomeCliente='$nomeCliente' WHERE idCliente = $idCliente";
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