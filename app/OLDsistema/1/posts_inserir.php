<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['slug'])) {

    $slug = $jsonEntrada['slug'];
    $titulo = $jsonEntrada['titulo'];
    $imgDestaque = $jsonEntrada['imgDestaque']; 
    $idAutor = $jsonEntrada['idAutor']; 
    $data = $jsonEntrada['data'];
    $txtConteudo = $jsonEntrada['txtConteudo'];
    $idCategoria = $jsonEntrada['idCategoria'];


    
    $sql = "INSERT INTO `posts`(`slug`, `titulo`, `imgDestaque`, `idAutor`, `data`, `txtConteudo`, `idCategoria`) VALUES ('$slug','$titulo', '$imgDestaque' ,'$idAutor','$data','$txtConteudo','$idCategoria')";
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