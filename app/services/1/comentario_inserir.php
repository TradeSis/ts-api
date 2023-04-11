<?php
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idDemanda'])) {
    $idDemanda = $jsonEntrada['idDemanda'];
    $comentario = $jsonEntrada['comentario'];
    $idUsuario = $jsonEntrada['idUsuario'];
    //$idAnexo = $jsonEntrada['idAnexo'];
    $pathAnexo = $jsonEntrada['pathAnexo'];
    $nomeAnexo = $jsonEntrada['nomeAnexo'];
    $sql = "INSERT INTO comentario(idDemanda, comentario, idUsuario, dataComentario, nomeAnexo, pathAnexo) VALUES ($idDemanda,'$comentario',$idUsuario,CURRENT_TIMESTAMP(),'$nomeAnexo', '$pathAnexo')";

  //  echo "-SQL->".json_encode($sql)."\n";
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
