<?php

//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['aplicativo'])) {
    $aplicativo = $jsonEntrada['aplicativo'];
    
    $sql = "DELETE FROM aplicativo WHERE aplicativo = '$aplicativo'";
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