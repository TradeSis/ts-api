<?php

//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['progrNome'])) {
    $IDMenu = $jsonEntrada['IDMenu'];
    $progrNome = $jsonEntrada['progrNome'];
    $aplicativo = $jsonEntrada['aplicativo'];
    $progrLink = $jsonEntrada['progrLink'];
    $nivelMenu = $jsonEntrada['nivelMenu'];
    
    $sql = "INSERT INTO menuprograma(IDMenu, progrNome, aplicativo, progrLink, nivelMenu) VALUES ('$IDMenu','$progrNome','$aplicativo', '$progrLink', $nivelMenu)";
   // echo "-SQL->".json_encode($sql)."\n";
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