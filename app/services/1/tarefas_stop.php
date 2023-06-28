<?php
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

date_default_timezone_set('America/Sao_Paulo');

$conexao = conectaMysql();
if (isset($jsonEntrada['idTarefa'])) {
    $idTarefa = $jsonEntrada['idTarefa'];
    $horaInicio = $jsonEntrada['horaInicio'];
    $horaStop = date('H:i:00');
    $idDemanda = $jsonEntrada['idDemanda'];
    $idTipoStatus = $jsonEntrada['idTipoStatus'];

    $calculo = "SELECT TIMEDIFF('$horaStop','$horaInicio') AS total";
    $busca = mysqli_query($conexao, $calculo);
    $row = mysqli_fetch_array($busca);
    $horasReal = $row['total'];

    $sql = "UPDATE `tarefa` SET `horaStop`='$horaStop', `horasReal`='$horasReal' WHERE idTarefa = $idTarefa";
    $atualizar = mysqli_query($conexao, $sql);

    // busca dados tipostatus    
    $sql2 = "SELECT * FROM tipostatus WHERE idTipoStatus = $idTipoStatus";
    $buscar2 = mysqli_query($conexao, $sql2);
    $row = mysqli_fetch_array($buscar2, MYSQLI_ASSOC);
    $posicao = $row["mudaPosicaoPara"];
    $statusDemanda = $row["mudaStatusPara"];

    $sql3 = "UPDATE demanda SET idTipoStatus=$idTipoStatus, dataAtualizacaoAtendente=CURRENT_TIMESTAMP(), statusDemanda='$statusDemanda' WHERE idDemanda = $idDemanda";
    $atualizar3 = mysqli_query($conexao, $sql3);

    if ($atualizar && $atualizar3) {
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
        "retorno" => "Faltaram parâmetros"
    );
}