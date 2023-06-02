<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idPagina'])) {

	$idPagina = $jsonEntrada['idPagina'];
	$idSecao = $jsonEntrada['idSecao'];
	$ordem = $jsonEntrada['ordem'];
    $parametros = $jsonEntrada['parametros'];
    
    $sql = "INSERT INTO `secoespagina`(`idPagina`,`idSecao`, `ordem`, `parametros`) VALUES ('$idPagina','$idSecao','$ordem','$parametros')";
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