<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['slug'])) {

    $slug = $jsonEntrada['slug'];
	$tituloPagina = $jsonEntrada['tituloPagina'];
	$conteudoHTML = $jsonEntrada['conteudoHTML'];
	$arquivoFonte = $jsonEntrada['arquivoFonte'];
	$arquivoSingle = $jsonEntrada['arquivoSingle'];
    $idTema = $jsonEntrada['idTema'];
    
    $sql = "INSERT INTO `paginas`(`slug`, `tituloPagina`, `conteudoHTML`, `arquivoFonte`, `arquivoSingle`, `idTema`) VALUES ('$slug','$tituloPagina','$conteudoHTML','$arquivoFonte','$arquivoSingle','$idTema')";
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