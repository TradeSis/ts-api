<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idPagina'])) {

    $idPagina = $jsonEntrada['idPagina'];
	$tituloPagina = $jsonEntrada['tituloPagina'];
	$conteudoHTML = $jsonEntrada['conteudoHTML'];
	$arquivoFonte = $jsonEntrada['arquivoFonte'];
	$arquivoSingle = $jsonEntrada['arquivoSingle'];
    
    $sql = "UPDATE `paginas` SET `tituloPagina`='$tituloPagina',`conteudoHTML`='$conteudoHTML',`arquivoFonte`='$arquivoFonte',`arquivoSingle`='$arquivoSingle' WHERE idPagina = $idPagina";
    //echo "-SQL->".json_encode($sql)."\n";
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