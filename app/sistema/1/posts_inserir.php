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

    if($imgDestaque !== null) {
        preg_match("/\.(png|jpg|jpeg){1}$/i", $imgDestaque["name"],$ext);
    
        if($ext == true) {
            $pasta = "../img/";
            $nome_foto = md5(uniqid(time())) . "." . $ext[1];
            
            move_uploaded_file($imgDestaque['tmp_name'], $pasta.$nome_foto);
    
        }else{
            $nome_foto = "Sem_imagem";
        }

    }

    
    $sql = "INSERT INTO `posts`(`slug`, `imgDestaque`, `titulo`, `autor`, `data`, `comentarios`, `textoIntro`, `txtConteudo`) VALUES ('$slug','$nome_foto','$titulo','$autor','$data','$comentarios','$textoIntro','$txtConteudo')";
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