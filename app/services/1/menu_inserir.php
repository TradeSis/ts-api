<?php

//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['nomeMenu'])) {
    $nomeMenu = $jsonEntrada['nomeMenu'];
    $aplicativo = $jsonEntrada['aplicativo'];
    $nivelMenu = $jsonEntrada['nivelMenu'];
    
    $sql = "INSERT INTO menu(nomeMenu, aplicativo, nivelMenu) VALUES ('$nomeMenu','$aplicativo',$nivelMenu)";
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

?>