<?php

//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['progrNome'])) {
    $IDMenu = $jsonEntrada['IDMenu'];
    $progrNome = $jsonEntrada['progrNome'];
    $idAplicativo = $jsonEntrada['idAplicativo'];
    $progrLink = $jsonEntrada['progrLink'];
    $nivelMenu = $jsonEntrada['nivelMenu'];
    
    $sql = "UPDATE menuprograma SET IDMenu = $IDMenu, progrNome ='$progrNome', idAplicativo ='$idAplicativo', progrLink ='$progrLink', nivelMenu = $nivelMenu WHERE progrNome = '$progrNome'";

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