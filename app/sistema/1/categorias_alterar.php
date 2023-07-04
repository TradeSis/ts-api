<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
if (isset($jsonEntrada['idCategoria'])) {

    $idCategoria = $jsonEntrada['idCategoria'];
    $nomeCategoria = $jsonEntrada['nomeCategoria'];
    

    $sql = "UPDATE categoria SET nomeCategoria ='$nomeCategoria' WHERE idCategoria = $idCategoria ";

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