<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idPerfil'])) {

    $idPerfil = $jsonEntrada['idPerfil'];
	$nome = $jsonEntrada['nome'];
	$foto = $jsonEntrada['foto'];
	$endereco = $jsonEntrada['endereco'];
	$numero = $jsonEntrada['numero'];
	$bairro = $jsonEntrada['bairro'];
	$cep = $jsonEntrada['cep'];
	$cidade = $jsonEntrada['cidade'];
	$estado = $jsonEntrada['estado'];
	$email = $jsonEntrada['email'];
	$whatsapp = $jsonEntrada['whatsapp'];
	$twitter = $jsonEntrada['twitter'];
	$facebook = $jsonEntrada['facebook'];
	$instagram = $jsonEntrada['instagram'];
	
    
    
    $sql = "UPDATE `perfil` SET `nome`='$nome',`foto`='$foto',`endereco`='$endereco',`numero`='$numero',`bairro`='$bairro',`cep`='$cep',`cidade`='$cidade',`estado`='$estado',`email`='$email',`whatsapp`='$whatsapp',`twitter`='$twitter',`facebook`='$facebook',`instagram`='$instagram' WHERE idPerfil = $idPerfil";
   

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