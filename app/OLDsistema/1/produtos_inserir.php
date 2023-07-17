<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
if (isset($jsonEntrada['nomeProduto'])) {

    $nomeProduto = $jsonEntrada['nomeProduto'];
    $imgProduto = $jsonEntrada['imgProduto'];
    $idMarca = $jsonEntrada['idMarca'];
    $precoProduto = $jsonEntrada['precoProduto'];
    $ativoProduto = $jsonEntrada['ativoProduto'];
    $propagandaProduto = $jsonEntrada['propagandaProduto'];
    $descricaoProduto = $jsonEntrada['descricaoProduto'];

    
    $sql = "INSERT INTO produtos (`nomeProduto`,`imgProduto`,`idMarca`,`precoProduto`,`ativoProduto`,`propagandaProduto`,`descricaoProduto`) VALUES ('$nomeProduto','$imgProduto','$idMarca','$precoProduto','$ativoProduto','$propagandaProduto','$descricaoProduto')";
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