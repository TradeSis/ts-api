<?php
//Lucas 05042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['nomeMenu'])) {
    $nomeMenu = $jsonEntrada['nomeMenu'];
    $idAplicativo = $jsonEntrada['idAplicativo'];
    $nivelMenu = $jsonEntrada['nivelMenu'];
    $menuHeader = $jsonEntrada['menuHeader'];
    
    $sql = "INSERT INTO menu(nomeMenu, idAplicativo, nivelMenu, menuHeader) VALUES ('$nomeMenu','$idAplicativo',$nivelMenu, $menuHeader)";
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