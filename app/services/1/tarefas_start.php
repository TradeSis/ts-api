<?php
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['tituloTarefa'])) {
    $tituloTarefa = $jsonEntrada['tituloTarefa'];
    $idCliente = $jsonEntrada['idCliente'];
    $idDemanda = $jsonEntrada['idDemanda'];
    $idAtendente = $jsonEntrada['idAtendente'];
    $idStatus = $jsonEntrada['idStatus'];

    $sql = "INSERT INTO tarefa(tituloTarefa, idCliente, idDemanda, idAtendente, idStatus, dataExecucaoInicio) VALUES ('$tituloTarefa', $idCliente, $idDemanda, $idAtendente, $idStatus, DATE_FORMAT(CURRENT_TIMESTAMP(), '%Y-%m-%d %H:%i'))";
    echo $sql;
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