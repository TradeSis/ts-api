<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['tituloSecao'])) {

	$tituloSecao = $jsonEntrada['tituloSecao'];
	$arquivoFonte = $jsonEntrada['arquivoFonte'];
    
    $sql = "INSERT INTO `secoes`(`tituloSecao`, `arquivoFonte`) VALUES ('$tituloSecao','$arquivoFonte')";
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