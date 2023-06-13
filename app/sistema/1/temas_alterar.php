<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idTema'])) {

    
    $idTema = $jsonEntrada['idTema'];
	$nomeTema = $jsonEntrada['nomeTema'];
	$css = $jsonEntrada['css'];
    $ativo = $jsonEntrada['ativo'];

    if($ativo == '1'){
        $sql = "UPDATE `temas` SET `ativo`='0'";
        $atualizar = mysqli_query($conexao, $sql);
    }
    
    
    $sql = "UPDATE `temas` SET `nomeTema`='$nomeTema',`css`='$css',`ativo`='$ativo' WHERE idTema = $idTema";
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