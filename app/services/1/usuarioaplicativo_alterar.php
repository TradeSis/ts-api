<?php
//Lucas 05042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idAplicativo'])) {
    $idUsuario = $jsonEntrada['idUsuario'];
    $aplicativo = $jsonEntrada['aplicativo'];
    $nivelMenu = $jsonEntrada['nivelMenu'];
    
    $sql = "UPDATE usuarioaplicativo SET aplicativo ='$aplicativo', nivelMenu = $nivelMenu WHERE idUsuario = $idUsuario and aplicativo = '$aplicativo'";

   //echo "-SQL->".json_encode($sql)."\n";

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