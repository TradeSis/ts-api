<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
if (isset($jsonEntrada['idAutor']) && isset($jsonEntrada['fotoAutor']) && ($jsonEntrada['bannerAutor'])) {

    $idAutor = $jsonEntrada['idAutor'];
    $nomeAutor = $jsonEntrada['nomeAutor'];
    $fotoAutor = $jsonEntrada['fotoAutor'];
    $bannerAutor = $jsonEntrada['bannerAutor'];
    $sobreMimAutor = $jsonEntrada['sobreMimAutor'];
    
    $sql = "UPDATE autor SET nomeAutor='$nomeAutor', fotoAutor ='$fotoAutor', bannerAutor ='$bannerAutor', sobreMimAutor ='$sobreMimAutor' WHERE idAutor = $idAutor";
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
} 
    if (isset($jsonEntrada['idAutor']) && isset($jsonEntrada['fotoAutor'])) {
        $idAutor = $jsonEntrada['idAutor'];
        $nomeAutor = $jsonEntrada['nomeAutor'];
        $fotoAutor = $jsonEntrada['fotoAutor'];
        $sobreMimAutor = $jsonEntrada['sobreMimAutor'];
        
        $sql = "UPDATE autor SET nomeAutor='$nomeAutor', fotoAutor ='$fotoAutor', sobreMimAutor ='$sobreMimAutor' WHERE idAutor = $idAutor";
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
    }

    if (isset($jsonEntrada['idAutor']) && ($jsonEntrada['bannerAutor'])) {

        $idAutor = $jsonEntrada['idAutor'];
        $nomeAutor = $jsonEntrada['nomeAutor'];
        $bannerAutor = $jsonEntrada['bannerAutor'];
        $sobreMimAutor = $jsonEntrada['sobreMimAutor'];
        
        $sql = "UPDATE autor SET nomeAutor='$nomeAutor', bannerAutor ='$bannerAutor', sobreMimAutor ='$sobreMimAutor' WHERE idAutor = $idAutor";
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
    } 

if (isset($jsonEntrada['idAutor'])) {

    $idAutor = $jsonEntrada['idAutor'];
    $nomeAutor = $jsonEntrada['nomeAutor'];
    $fotoAutor = $jsonEntrada['fotoAutor'];
    $bannerAutor = $jsonEntrada['bannerAutor'];
    $sobreMimAutor = $jsonEntrada['sobreMimAutor'];
    
    $sql = "UPDATE autor SET nomeAutor='$nomeAutor', fotoAutor ='$fotoAutor', bannerAutor ='$bannerAutor', sobreMimAutor ='$sobreMimAutor' WHERE idAutor = $idAutor";
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

if (isset($jsonEntrada['idAutor'])) {

    $idAutor = $jsonEntrada['idAutor'];
    $nomeAutor = $jsonEntrada['nomeAutor'];
    $sobreMimAutor = $jsonEntrada['sobreMimAutor'];
    
    $sql = "UPDATE autor SET nomeAutor='$nomeAutor', sobreMimAutor ='$sobreMimAutor' WHERE idAutor = $idAutor";
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