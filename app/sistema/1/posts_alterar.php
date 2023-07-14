<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
if (isset($jsonEntrada['idPost']) && ($jsonEntrada['imgDestaque'])) {

    $idPost = $jsonEntrada['idPost'];
    $imgDestaque = $jsonEntrada['imgDestaque'];
    $titulo = $jsonEntrada['titulo'];
    $idAutor = $jsonEntrada['idAutor'];
    $txtConteudo = $jsonEntrada['txtConteudo'];
    $idCategoria = $jsonEntrada['idCategoria'];

    $sql = "UPDATE posts SET imgDestaque='$imgDestaque', titulo ='$titulo', idAutor ='$idAutor', txtConteudo ='$txtConteudo', idCategoria ='$idCategoria' WHERE idPost = $idPost";
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

if (isset($jsonEntrada['idPost'])) {

    $idPost = $jsonEntrada['idPost'];
    $titulo = $jsonEntrada['titulo'];
    $idAutor = $jsonEntrada['idAutor'];
    $txtConteudo = $jsonEntrada['txtConteudo'];
    $idCategoria = $jsonEntrada['idCategoria'];

    $sql = "UPDATE posts SET  titulo ='$titulo', idAutor ='$idAutor', txtConteudo ='$txtConteudo', idCategoria ='$idCategoria' WHERE idPost = $idPost";
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