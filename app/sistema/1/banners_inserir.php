<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['nomeBanner'])) {

    $nomeBanner = $jsonEntrada['nomeBanner'];
	$imgBanner = $jsonEntrada['imgBanner'];
	$statusBanner = $jsonEntrada['statusBanner']; 

    
    $sql = "INSERT INTO `banners`(`nomeBanner`, `imgBanner`, `statusBanner`) VALUES ('$nomeBanner','$imgBanner','$statusBanner')";
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