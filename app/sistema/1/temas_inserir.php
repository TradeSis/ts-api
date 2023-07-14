<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['nomeTema'])) {

	$nomeTema = $jsonEntrada['nomeTema'];
	$css = $jsonEntrada['css'];
    $ativo = $jsonEntrada['ativo'];
    $menu = $jsonEntrada['menu'];
    $perfil = $jsonEntrada['perfil'];

    if($ativo == '1'){
        $sql = "UPDATE `temas` SET `ativo`='0'";
        $atualizar = mysqli_query($conexao, $sql);
    } 
    
    $sql = "INSERT INTO `temas`(`nomeTema`, `css`, `ativo`, `menu`, `perfil`) VALUES ('$nomeTema','$css','$ativo','$menu','$perfil')";
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