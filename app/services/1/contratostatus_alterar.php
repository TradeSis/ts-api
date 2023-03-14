<?php
// Lucas 07022023 criacao
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idContratoStatus'])) {
    $idContratoStatus = $jsonEntrada['idContratoStatus'];
    $nomeContratoStatus = $jsonEntrada['nomeContratoStatus'];
    $sql = "UPDATE contratostatus SET nomeContratoStatus='$nomeContratoStatus' WHERE idContratoStatus = $idContratoStatus";
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

?>