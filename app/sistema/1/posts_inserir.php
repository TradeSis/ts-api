<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['slug'])) {

    $slug = $jsonEntrada['slug'];
    $titulo = $jsonEntrada['titulo'];
    $imgDestaque = $jsonEntrada['imgDestaque']; //foto
    $autor = $jsonEntrada['autor']; 
    $data = $jsonEntrada['data'];
    $comentarios = $jsonEntrada['comentarios'];
    $textoIntro = $jsonEntrada['textoIntro'];
    $txtConteudo = $jsonEntrada['txtConteudo'];
    $categoria = $jsonEntrada['categoria'];


    
    $sql = "INSERT INTO `posts`(`slug`, `titulo`, `imgDestaque`, `autor`, `data`, `comentarios`, `textoIntro`, `txtConteudo`, `categoria`) VALUES ('$slug','$titulo', '$imgDestaque' ,'$autor','$data','$comentarios','$textoIntro','$txtConteudo','$categoria')";
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