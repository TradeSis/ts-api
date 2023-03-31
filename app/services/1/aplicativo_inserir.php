<?php

//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['nomeAplicativo'])) {
    $aplicativo = $jsonEntrada['aplicativo'];
    $nomeAplicativo = $jsonEntrada['nomeAplicativo'];
    $imgAplicativo = $jsonEntrada['imgAplicativo'];
    
    $sql = "INSERT INTO aplicativo(aplicativo, nomeAplicativo, imgAplicativo) VALUES ('$aplicativo','$nomeAplicativo','$imgAplicativo')";
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