<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
if (isset($jsonEntrada['nomeReceita'])) {

    $nomeReceita = $jsonEntrada['nomeReceita'];
    $conteudoReceita = $jsonEntrada['conteudoReceita'];
    $autorReceita = $jsonEntrada['autorReceita'];
    $imgReceita = $jsonEntrada['imgReceita'];
    
    $sql = "INSERT INTO receitas (`nomeReceita`, `conteudoReceita`, `autorReceita`, `imgReceita`) VALUES ('$nomeReceita','$conteudoReceita','$autorReceita ','$imgReceita')";
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