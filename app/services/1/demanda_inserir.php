<?php
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['tituloDemanda'])) {
    $idCliente = $jsonEntrada['idCliente'];
    $idUsuario = $jsonEntrada['idUsuario'];
    $tituloDemanda = $jsonEntrada['tituloDemanda'];
    $descricao = $jsonEntrada['descricao'];
    $idTipoStatus = $jsonEntrada['idTipoStatus'];
    $idTipoOcorrencia = $jsonEntrada['idTipoOcorrencia'];
    $sql = "INSERT INTO demanda(prioridade, tituloDemanda, descricao, dataAbertura, idTipoStatus, idTipoOcorrencia, statusDemanda, idCliente, idUsuario) VALUES (99, '$tituloDemanda','$descricao', CURRENT_TIMESTAMP(), $idTipoStatus, $idTipoOcorrencia, 1, $idCliente, $idUsuario)";
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
