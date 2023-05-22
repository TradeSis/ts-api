<?php
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

date_default_timezone_set('America/Sao_Paulo'); 

$conexao = conectaMysql();
if (isset($jsonEntrada['idTarefa'])) {
    $idTarefa = $jsonEntrada['idTarefa'];
    $dataInicio = $jsonEntrada['dataExecucaoInicio'];
    $dataFim = date('Y-m-d H:i:00');

    $calculo = "SELECT TIMEDIFF('$dataFim','$dataInicio') AS total";
    $busca = mysqli_query($conexao, $calculo);
    while ($row = mysqli_fetch_array($busca)) {
        $tempo = $row['total'];

        $sql = "UPDATE `tarefa` SET `dataExecucaoFinal`='$dataFim', `tempo` = '$tempo' WHERE idTarefa = $idTarefa";
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
