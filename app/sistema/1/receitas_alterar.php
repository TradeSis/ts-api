<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
if (isset($jsonEntrada['idReceita'])) {

    $idReceita = $jsonEntrada['idReceita'];
    $nomeReceita = $jsonEntrada['nomeReceita'];
    $conteudoReceita = $jsonEntrada['conteudoReceita'];
    $autorReceita = $jsonEntrada['autorReceita'];
    $imgReceita = $jsonEntrada['imgReceita'];
    
    $sql = "UPDATE receitas SET nomeReceita='$nomeReceita', conteudoReceita ='$conteudoReceita', autorReceita ='$autorReceita', imgReceita ='$imgReceita' WHERE idReceita = $idReceita";
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