<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
if (isset($jsonEntrada['nomeMarca'])) {

    $nomeMarca = $jsonEntrada['nomeMarca'];
    $imgMarca = $jsonEntrada['imgMarca'];
    $bannerMarca = $jsonEntrada['bannerMarca'];
    $descricaoMarca = $jsonEntrada['descricaoMarca'];
    $cidadeMarca = $jsonEntrada['cidadeMarca'];
    $estado = $jsonEntrada['estado'];
    $urlMarca = $jsonEntrada['urlMarca'];
    $ativoMarca = $jsonEntrada['ativoMarca'];
    $catalogo = $jsonEntrada['catalogo'];
    $lojasEspecializadas = $jsonEntrada['lojasEspecializadas'];
    
    
    $sql = "INSERT INTO marcas (`nomeMarca`,`imgMarca`,`bannerMarca`,`descricaoMarca`,`cidadeMarca`,`estado`,`urlMarca`,`ativoMarca`,`catalogo`,`lojasEspecializadas`) VALUES ('$nomeMarca','$imgMarca','$bannerMarca','$descricaoMarca','$cidadeMarca','$estado','$urlMarca','$ativoMarca','$catalogo','$lojasEspecializadas')";
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