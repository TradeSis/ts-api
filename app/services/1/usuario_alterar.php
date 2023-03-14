<?php
// Lucas 03032023 - criação 
 //echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['idUsuario'])) {
    $idUsuario = $jsonEntrada['idUsuario'];
    $nomeUsuario = $jsonEntrada['nomeUsuario'];
    //$idCliente = $jsonEntrada['idCliente'];
    $email = $jsonEntrada['email'];
    $password = $jsonEntrada['password'];
    /* $sql = "UPDATE usuario(nomeUsuario, idCliente, email, password, statusUsuario) VALUES ('$nomeUsuario', $idCliente ,'$email',md5('$password'), 1)"; */

    $sql = "UPDATE `usuario` SET `nomeUsuario`='$nomeUsuario',`email`='$email',`password` = '$password',`statusUsuario`='1' WHERE idUsuario = $idUsuario";
   // echo "-ENTRADA->".$sql."\n"; 
    
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