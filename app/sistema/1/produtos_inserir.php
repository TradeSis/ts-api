<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['nomeProduto'])) {

    $nomeProduto = $jsonEntrada['nomeProduto'];
	$valorProduto = $jsonEntrada['valorProduto'];
	$fotoProduto = $jsonEntrada['fotoProduto']; - //foto
	$destaque = $jsonEntrada['destaque'];

    if($fotoProduto !== null) {
        preg_match("/\.(png|jpg|jpeg){1}$/i", $fotoProduto["name"],$ext);
    
        if($ext == true) {
            $pasta = "../img/";
            $nome_foto = md5(uniqid(time())) . "." . $ext[1];
            
            move_uploaded_file($fotoProduto['tmp_name'], $pasta.$nome_foto);
    
        }else{
            $nome_foto = "sem_foto";
        }
    }

    
    $sql = "INSERT INTO `produtos`(`nomeProduto`, `valorProduto`, `fotoProduto`, `destaque`) VALUES ('$nomeProduto','$valorProduto','$nome_foto ','$destaque')";
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