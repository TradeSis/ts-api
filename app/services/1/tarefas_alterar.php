<?php
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();

if (isset($jsonEntrada['idTarefa'])) {
    $idTarefa = $jsonEntrada['idTarefa'];
    $idDemanda = $jsonEntrada['idDemanda'];
    $tituloTarefa = $jsonEntrada['tituloTarefa'];
    $horaInicio = $jsonEntrada['horaInicio'];
    $horaFinal = $jsonEntrada['horaFinal'];
    $idTipoOcorrencia = $jsonEntrada['idTipoOcorrencia'];

    $calculo = "SELECT TIMEDIFF('$horaFinal','$horaInicio') AS total";
    $busca = mysqli_query($conexao, $calculo);
    $row = mysqli_fetch_array($busca);
    $horasCobrado = $row['total'];

    $sql = "UPDATE `tarefa` SET `tituloTarefa`='$tituloTarefa', `horaInicio`='$horaInicio', `horaFinal`='$horaFinal', `horasCobrado`='$horasCobrado', `idTipoOcorrencia`='$idTipoOcorrencia' WHERE `idTarefa` = $idTarefa";

    if (mysqli_query($conexao, $sql)) {
        $sql2 = "UPDATE `demanda` SET `idTipoOcorrencia`='$idTipoOcorrencia' WHERE `idDemanda` = $idDemanda";
        if (mysqli_query($conexao, $sql2)) {
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