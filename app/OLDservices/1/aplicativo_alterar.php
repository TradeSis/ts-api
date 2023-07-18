<?php
//Lucas 05042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idAplicativo'])) {
    $idAplicativo = $jsonEntrada['idAplicativo'];
    $nomeAplicativo = $jsonEntrada['nomeAplicativo'];
    $appLink = $jsonEntrada['appLink'];
    $imgAplicativo = $jsonEntrada['imgAplicativo'];
    $pathImg = $jsonEntrada['pathImg'];
    
    $sql = "UPDATE aplicativo SET nomeAplicativo ='$nomeAplicativo', appLink ='$appLink', imgAplicativo ='$imgAplicativo' WHERE idAplicativo = $idAplicativo";

   //echo "-SQL->".json_encode($sql)."\n";

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