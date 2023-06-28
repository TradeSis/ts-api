<?php
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['tituloTarefa'])) {
    $tituloTarefa = $jsonEntrada['tituloTarefa'];
    $idCliente = $jsonEntrada['idCliente'];
    $idDemanda = $jsonEntrada['idDemanda'];
    $idAtendente = $jsonEntrada['idAtendente'];
    $data = $jsonEntrada['data'];
    $horaInicio = $jsonEntrada['horaInicio'];
    $horaFinal = $jsonEntrada['horaFinal'];
    $idTipoOcorrencia = $jsonEntrada['idTipoOcorrencia'];

    $calculo = "SELECT TIMEDIFF('$horaFinal','$horaInicio') AS total";
    $busca = mysqli_query($conexao, $calculo);
    while ($row = mysqli_fetch_array($busca)) {
        $horasCobrado = $row['total'];

        $sql = "INSERT INTO tarefa(tituloTarefa, idCliente, idDemanda, idAtendente, `data`, horaInicio, horaFinal, horasCobrado, idTipoOcorrencia) VALUES ('$tituloTarefa', $idCliente, $idDemanda, $idAtendente, $data, '$horaInicio', '$horaFinal', '$horasCobrado', $idTipoOcorrencia)";
    }
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
