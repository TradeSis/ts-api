<?php
//gabriel 220323
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idDemanda'])) {
    $idDemanda = $jsonEntrada['idDemanda'];
    $sql = "UPDATE demanda SET idTipoStatus=5, dataAtualizacaoCliente=CURRENT_TIMESTAMP()  WHERE idDemanda = $idDemanda";
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