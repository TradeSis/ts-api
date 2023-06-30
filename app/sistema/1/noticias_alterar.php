<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
if (isset($jsonEntrada['idNoticia'])) {

    $idNoticia = $jsonEntrada['idNoticia'];
    $tituloNoticia = $jsonEntrada['tituloNoticia'];
    $conteudoNoticia = $jsonEntrada['conteudoNoticia'];
    $idAutor = $jsonEntrada['idAutor'];
    $imgNoticia = $jsonEntrada['imgNoticia'];
    $idCategoria = $jsonEntrada['idCategoria'];
    

    $sql = "UPDATE noticias SET tituloNoticia ='$tituloNoticia', conteudoNoticia ='$conteudoNoticia', idAutor ='$idAutor', imgNoticia ='$imgNoticia', idCategoria ='$idCategoria' WHERE idNoticia = $idNoticia ";

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