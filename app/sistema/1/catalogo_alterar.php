<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
if (isset($jsonEntrada['idProduto']) && ($jsonEntrada['imgProduto'])) {

    $idProduto = $jsonEntrada['idProduto'];
    $nomeProduto = $jsonEntrada['nomeProduto'];
    $imgProduto = $jsonEntrada['imgProduto'];
    $idMarca = $jsonEntrada['idMarca'];
    $precoProduto = $jsonEntrada['precoProduto'];
    $ativoProduto = $jsonEntrada['ativoProduto'];
    $propagandaProduto = $jsonEntrada['propagandaProduto'];
    $descricaoProduto = $jsonEntrada['descricaoProduto'];

    $sql = "UPDATE  catalogo  SET nomeProduto ='$nomeProduto', imgProduto ='$imgProduto', idMarca ='$idMarca', precoProduto ='$precoProduto', ativoProduto ='$ativoProduto',    propagandaProduto ='$propagandaProduto', descricaoProduto ='$descricaoProduto' WHERE idProduto = $idProduto ";

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

if (isset($jsonEntrada['idProduto'])) {

    $idProduto = $jsonEntrada['idProduto'];
    $nomeProduto = $jsonEntrada['nomeProduto'];
    $imgProduto = $jsonEntrada['imgProduto'];
    $idMarca = $jsonEntrada['idMarca'];
    $precoProduto = $jsonEntrada['precoProduto'];
    $ativoProduto = $jsonEntrada['ativoProduto'];
    $propagandaProduto = $jsonEntrada['propagandaProduto'];
    $descricaoProduto = $jsonEntrada['descricaoProduto'];

    $sql = "UPDATE  catalogo  SET nomeProduto ='$nomeProduto', idMarca ='$idMarca', precoProduto ='$precoProduto', ativoProduto ='$ativoProduto',    propagandaProduto ='$propagandaProduto', descricaoProduto ='$descricaoProduto' WHERE idProduto = $idProduto ";

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