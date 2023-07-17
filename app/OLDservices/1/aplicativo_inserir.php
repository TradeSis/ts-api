<?php
//Lucas 05042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['nomeAplicativo'])) {
    $nomeAplicativo = $jsonEntrada['nomeAplicativo'];
    $appLink = $jsonEntrada['appLink'];
    $imgAplicativo = $jsonEntrada['imgAplicativo'];
    $pathImg = $jsonEntrada['pathImg'];
    
    $sql = "INSERT INTO aplicativo(nomeAplicativo, appLink, imgAplicativo, pathImg) VALUES ('$nomeAplicativo', '$appLink', '$imgAplicativo', '$pathImg')";
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