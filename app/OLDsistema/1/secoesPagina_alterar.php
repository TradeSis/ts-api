<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idSecaoPagina'])) {

	$idSecaoPagina = $jsonEntrada['idSecaoPagina'];
	$idPagina = $jsonEntrada['idPagina'];
    $idSecao = $jsonEntrada['idSecao'];
	$ordem = $jsonEntrada['ordem'];
    $coluna = $jsonEntrada['coluna'];
    $parametros = $jsonEntrada['parametros'];
    $listas = $jsonEntrada['listas'];
    
    $sql = "UPDATE `secoespagina` SET `idPagina`='$idPagina', `idSecao`='$idSecao',`ordem`='$ordem',`coluna`='$coluna',`parametros`='$parametros',`listas`='$listas' WHERE idSecaoPagina = $idSecaoPagina";
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