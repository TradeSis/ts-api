<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['nomeProduto'])) {

    $nomeProduto = $jsonEntrada['nomeProduto'];
	$valorProduto = $jsonEntrada['valorProduto'];
	$fotoProduto = $jsonEntrada['fotoProduto']; - //foto
	$destaque = $jsonEntrada['destaque'];

    
    $sql = "INSERT INTO `produtos`(`nomeProduto`, `valorProduto`, `fotoProduto`, `destaque`) VALUES ('$nomeProduto','$valorProduto','$fotoProduto ','$destaque')";
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