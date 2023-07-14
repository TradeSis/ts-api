<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
if (isset($jsonEntrada['idMarca']) && isset($jsonEntrada['imgMarca'])) {

    $idMarca = $jsonEntrada['idMarca'];
    $nomeMarca = $jsonEntrada['nomeMarca'];
    $imgMarca = $jsonEntrada['imgMarca'];
    /* $bannerMarca = $jsonEntrada['bannerMarca']; */
    $descricaoMarca = $jsonEntrada['descricaoMarca'];
    $cidadeMarca = $jsonEntrada['cidadeMarca'];
    $estado = $jsonEntrada['estado'];
    $urlMarca = $jsonEntrada['urlMarca'];
    $ativoMarca = $jsonEntrada['ativoMarca'];
    $catalogo = $jsonEntrada['catalogo'];
    $lojasEspecializadas = $jsonEntrada['lojasEspecializadas'];
    

    $sql = "UPDATE marcas SET nomeMarca ='$nomeMarca', imgMarca ='$imgMarca', descricaoMarca ='$descricaoMarca', cidadeMarca ='$cidadeMarca', estado ='$estado', urlMarca ='$urlMarca', ativoMarca ='$ativoMarca', catalogo ='$catalogo', lojasEspecializadas ='$lojasEspecializadas' WHERE idMarca = $idMarca ";

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


if (isset($jsonEntrada['idMarca'])) {

    $idMarca = $jsonEntrada['idMarca'];
    $nomeMarca = $jsonEntrada['nomeMarca'];
    $descricaoMarca = $jsonEntrada['descricaoMarca'];
    $cidadeMarca = $jsonEntrada['cidadeMarca'];
    $estado = $jsonEntrada['estado'];
    $urlMarca = $jsonEntrada['urlMarca'];
    $ativoMarca = $jsonEntrada['ativoMarca'];
    $catalogo = $jsonEntrada['catalogo'];
    $lojasEspecializadas = $jsonEntrada['lojasEspecializadas'];
    

    $sql = "UPDATE marcas SET nomeMarca ='$nomeMarca', descricaoMarca ='$descricaoMarca', cidadeMarca ='$cidadeMarca', estado ='$estado', urlMarca ='$urlMarca', ativoMarca ='$ativoMarca', catalogo ='$catalogo', lojasEspecializadas ='$lojasEspecializadas' WHERE idMarca = $idMarca ";

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