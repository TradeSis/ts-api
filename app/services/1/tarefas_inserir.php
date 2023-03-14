<?php
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['tituloTarefa'])) {
    $tituloTarefa = $jsonEntrada['tituloTarefa'];
    $idCliente = $jsonEntrada['idCliente'];
    $idDemanda = $jsonEntrada['idDemanda'];
    $idAtendente = $jsonEntrada['idAtendente'];
    $dataInicio = $jsonEntrada['dataExecucaoInicio'];
    $dataFim = $jsonEntrada['dataExecucaoFinal'];
    $idStatus = $jsonEntrada['idStatus'];

    $calculo = "SELECT TIMEDIFF('$dataFim','$dataInicio') AS total";
    $busca = mysqli_query($conexao, $calculo);
    while ($row = mysqli_fetch_array($busca)) {
        $tempo = $row['total'];

        $sql = "INSERT INTO tarefa(tituloTarefa, idCliente, idDemanda, idAtendente, dataExecucaoInicio, dataExecucaoFinal, tempo, idStatus) VALUES ('$tituloTarefa', $idCliente, $idDemanda, $idAtendente, '$dataInicio', '$dataFim', '$tempo', $idStatus)";
    }
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
