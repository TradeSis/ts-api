<?php
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idTarefa'])) {
    $idTarefa = $jsonEntrada['idTarefa'];
    $tituloTarefa = $jsonEntrada['tituloTarefa'];
    $dataInicio = $jsonEntrada['dataExecucaoInicio'];
    $dataFim = $jsonEntrada['dataExecucaoFinal'];

    $calculo = "SELECT TIMEDIFF('$dataFim','$dataInicio') AS total";
    $busca = mysqli_query($conexao, $calculo);
    while ($row = mysqli_fetch_array($busca)) {
        $tempo = $row['total'];

        $sql = "UPDATE `tarefa` SET `tituloTarefa`='$tituloTarefa', `dataExecucaoInicio`='$dataInicio', `dataExecucaoFinal`='$dataFim', `tempo` = '$tempo' WHERE idTarefa = $idTarefa";
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
