<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
if (isset($jsonEntrada['tituloNoticia'])) {

    $tituloNoticia = $jsonEntrada['tituloNoticia'];
    $conteudoNoticia = $jsonEntrada['conteudoNoticia'];
    $idAutor = $jsonEntrada['idAutor'];
    $imgNoticia = $jsonEntrada['imgNoticia'];
    $idCategoria = $jsonEntrada['idCategoria'];
    
    
    $sql = "INSERT INTO noticias (`tituloNoticia`,`conteudoNoticia`,`idAutor`,`imgNoticia`,`idCategoria`) VALUES ('$tituloNoticia','$conteudoNoticia','$idAutor','$imgNoticia','$idCategoria')";
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