<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['nomeMarca'])) {

    $nomeMarca = $jsonEntrada['nomeMarca'];
	$imgMarca = $jsonEntrada['imgMarca'];

    if($imgMarca !== null) {
        preg_match("/\.(png|jpg|jpeg|svg){1}$/i", $imgMarca["name"],$ext);
    
        if($ext == true) {
            $pasta = "../img/";
            $nome_marca = md5(uniqid(time())) . "." . $ext[1];
            
            move_uploaded_file($imgMarca['tmp_name'], $pasta.$nome_marca);
    
        }else{
            $nome_marca = "sem_imgMarca";
        }

     
    }

    
    $sql = "INSERT INTO `marcas`(`nomeMarca`, `imgMarca`) VALUES ('$nomeMarca', '$nome_marca')";
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