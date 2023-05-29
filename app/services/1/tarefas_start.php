<?php
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

date_default_timezone_set('America/Sao_Paulo'); 

$conexao = conectaMysql();
if (isset($jsonEntrada['tituloTarefa'])) {
    $tituloTarefa = $jsonEntrada['tituloTarefa'];
    $idCliente = $jsonEntrada['idCliente'];
    $idDemanda = $jsonEntrada['idDemanda'];
    $idAtendente = $jsonEntrada['idAtendente'];
    $idTipoOcorrencia = $jsonEntrada['idTipoOcorrencia'];
    $dataStart = date('Y-m-d H:i:00');

    $sql = "INSERT INTO tarefa(tituloTarefa, idCliente, idDemanda, idAtendente, idTipoOcorrencia, dataStart) VALUES ('$tituloTarefa', $idCliente, $idDemanda, $idAtendente, $idTipoOcorrencia, '$dataStart')";
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