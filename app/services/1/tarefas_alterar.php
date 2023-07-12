<?php
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();

if (isset($jsonEntrada['idTarefa'])) {
    $idTarefa = $jsonEntrada['idTarefa'];
    $idDemanda = $jsonEntrada['idDemanda'];
    $tituloTarefa = $jsonEntrada['tituloTarefa'];
   // $dataCobrado = $jsonEntrada['dataCobrado'];
   // $horaInicioCobrado = $jsonEntrada['horaInicioCobrado'];
   // $horaFinalCobrado = $jsonEntrada['horaFinalCobrado'];
    $dataCobrado = (is_null($jsonEntrada['dataCobrado']) ? null : $jsonEntrada['dataCobrado']);
    $horaInicioCobrado = (is_null($jsonEntrada['horaInicioCobrado']) ? null : $jsonEntrada['horaInicioCobrado']);
    $horaFinalCobrado = (is_null($jsonEntrada['horaFinalCobrado']) ? null : $jsonEntrada['horaFinalCobrado']);
  
    $idTipoOcorrencia = $jsonEntrada['idTipoOcorrencia'];

    $sql = "UPDATE `tarefa` SET `tituloTarefa`='$tituloTarefa',`dataCobrado`='$dataCobrado', `horaInicioCobrado`='$horaInicioCobrado', `horaFinalCobrado`='$horaFinalCobrado', `idTipoOcorrencia`=$idTipoOcorrencia WHERE `idTarefa` = $idTarefa";

    if (mysqli_query($conexao, $sql)) {
        $sql2 = "UPDATE `demanda` SET `idTipoOcorrencia`=$idTipoOcorrencia WHERE `idDemanda` = $idDemanda";
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