<?php
//gabriel 220323 11:10 alterado para status 6(validado) ao encerrar
//gabriel 06022023 16:52
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idDemanda'])) {
    $idDemanda = $jsonEntrada['idDemanda'];
    $sql = "UPDATE demanda SET idTipoStatus=6, dataFechamento=CURRENT_TIMESTAMP()  WHERE idDemanda = $idDemanda";
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