<?php
// Lucas 10032023 - pequeno ajuste ao montar o slq, faltava uma virgula de pois de descricao='$descricao',
// gabriel 06032023 11:25 alteração de descricao demanda
// gabriel 02032023 12:13 alteração de titulo demanda
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$posicao = null;
$statusDemanda = null;

if (isset($jsonEntrada['idDemanda'])) {
    $idDemanda = $jsonEntrada['idDemanda'];
    $tituloDemanda = $jsonEntrada['tituloDemanda'];
    $descricao = $jsonEntrada['descricao'];
    $prioridade = $jsonEntrada['prioridade'];
    $idTipoStatus = $jsonEntrada['idTipoStatus'];
    $idTipoOcorrencia = $jsonEntrada['idTipoOcorrencia'];
    $tamanho = $jsonEntrada['tamanho'];
    $idAtendente = $jsonEntrada['idAtendente'];

    //busca dados tipostatus    
        $sql2 = "SELECT * FROM tipostatus WHERE idTipoStatus = $idTipoStatus";
        $buscar2 = mysqli_query($conexao, $sql2);
        $row = mysqli_fetch_array($buscar2, MYSQLI_ASSOC);
        $posicao = $row["mudaPosicaoPara"];
        $statusDemanda = $row["mudaStatusPara"];

    $sql = "UPDATE demanda SET prioridade=$prioridade, tituloDemanda='$tituloDemanda', descricao='$descricao', idTipoStatus=$idTipoStatus, idTipoOcorrencia=$idTipoOcorrencia, posicao=$posicao, statusDemanda=$statusDemanda, tamanho='$tamanho', idAtendente=$idAtendente, dataAtualizacaoAtendente=CURRENT_TIMESTAMP() WHERE idDemanda = $idDemanda";
    echo "-SQL->".json_encode($sql)."\n";
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
