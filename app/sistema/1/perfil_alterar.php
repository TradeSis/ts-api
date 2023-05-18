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
	$telefone = $jsonEntrada['telefone'];
	$whatsapp = $jsonEntrada['whatsapp'];
	$logo = $jsonEntrada['logo'];
	$twitter = $jsonEntrada['twitter'];
	$facebook = $jsonEntrada['facebook'];
	$instagram = $jsonEntrada['instagram'];

    if($foto !== null) {
        preg_match("/\.(png|jpg|jpeg){1}$/i", $foto["name"],$ext);
    
        if($ext == true) {
            $pasta = "../img/";
            $nome_foto = md5(uniqid(time())) . "." . $ext[1];
            
            move_uploaded_file($foto['tmp_name'], $pasta.$nome_foto);
    
        }
    }else{
        $nome_foto = "sem_foto";
    }

    if($logo !== null) {
        preg_match("/\.(png|jpg|jpeg){1}$/i", $logo["name"],$ext);
    
        if($ext == true) {
            $pasta = "../img/";
            $nome_arquivo = md5(uniqid(time())) . "." . $ext[1];
            
            move_uploaded_file($logo['tmp_name'], $pasta.$nome_arquivo);
    
        }
    }else{
        $nome_arquivo = "sem_logo";
    }		
    

    
    $sql = "UPDATE `perfil` SET `nome`='$nome',`foto`='$nome_foto',`endereco`='$endereco',`numero`='$numero',`bairro`='$bairro',`cep`='$cep',`cidade`='$cidade',`estado`='$estado',`email`='$email',`telefone`='$telefone',`whatsapp`='$whatsapp',`logo`='$nome_arquivo',`twitter`='$twitter',`facebook`='$facebook',`instagram`='$instagram' WHERE idPerfil = $idPerfil";
   

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