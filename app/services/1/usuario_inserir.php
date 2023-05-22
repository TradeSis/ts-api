<?php
//gabriel 06022023 16:52
/* echo "-ENTRADA->".json_encode($jsonEntrada)."\n"; */

//******** gera secret */
require_once __DIR__ .'/../../../../vendor/autoload.php';

use PragmaRX\Google2FA\Google2FA;
$google2fa = new Google2FA();

$conexao = conectaMysql();
if (isset($jsonEntrada['nomeUsuario'])) {
    $nomeUsuario = $jsonEntrada['nomeUsuario'];
    $idCliente = $jsonEntrada['idCliente'];
    $email = $jsonEntrada['email'];
    $cpfCnpj = $jsonEntrada['cpfCnpj'];
    $telefone = $jsonEntrada['telefone'];
    $password = $jsonEntrada['password'];

    $idCliente = $jsonEntrada['idCliente'];
    $statusUsuario = 0;
    $secret = $google2fa->generateSecretKey();

    $sql = "INSERT INTO `usuario`( `nomeUsuario`, `idCliente`, `email`, `cpfCnpj`, `telefone`, `password`, `statusUsuario`, `secret`) VALUES ('$nomeUsuario', $idCliente, '$email', '$cpfCnpj', '$telefone', '$password', $statusUsuario, '$secret')";

   /*  echo "-SQL->".json_encode($sql)."\n"; */

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