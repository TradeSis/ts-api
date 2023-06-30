<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
if (isset($jsonEntrada['nomeEvento'])) {

    $nomeEvento = $jsonEntrada['nomeEvento'];
    $descricaoEvento = $jsonEntrada['descricaoEvento'];
    $dataEvento = $jsonEntrada['dataEvento'];
    $cidadeEvento = $jsonEntrada['cidadeEvento'];
    $localEvento = $jsonEntrada['localEvento'];
    $capaEvento = $jsonEntrada['capaEvento'];
    $esconderEvento = $jsonEntrada['esconderEvento'];
    $tipoEvento = $jsonEntrada['tipoEvento'];
    $linkEvento = $jsonEntrada['linkEvento'];
    $bannerEvento = $jsonEntrada['bannerEvento'];

    
    $sql = "INSERT INTO eventos (`nomeEvento`,`descricaoEvento`,`dataEvento`,`cidadeEvento`,`localEvento`,`capaEvento`,`esconderEvento`,`tipoEvento`,`linkEvento`,`bannerEvento`) VALUES ('$nomeEvento','$descricaoEvento','$dataEvento','$cidadeEvento','$localEvento','$capaEvento','$esconderEvento','$tipoEvento','$linkEvento','$bannerEvento')";
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