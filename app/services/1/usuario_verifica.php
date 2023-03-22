<?php
//gabriel 220323 11:10 envio de idcliente
//Lucas 08032023
//echo "-ENTRADA->" . json_encode($jsonEntrada) . "\n";


/* if (isset($jsonEntrada["idUsuario"])) {
    $idUsuario = $jsonEntrada["idUsuario"];
    $sql = $sql . " where usuario.idUsuario = '$idUsuario'";
  }  */

if (!isset($jsonEntrada["usuario"])) {
    $jsonSaida = array(
        "status" => 400,
        "retorno" => "Faltou parâmetro usuario"
    );
} else {


    $usuario = $jsonEntrada["usuario"];


    $conexao = conectaMysql();
    $usuarios = array();
   


    $sql = "SELECT * FROM usuario WHERE email = '$usuario' or nomeUsuario = '$usuario'";


    $rows = 0;
    $buscar = mysqli_query($conexao, $sql);
    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
        array_push($usuarios, $row);
        $rows = $rows + 1;
    }


    if (isset($jsonEntrada["usuario"]) && $rows == 1) {
        $usuarios = $usuarios[0];
        $jsonSaida = array(
            "idUsuario" => $usuarios["idUsuario"],
            "idCliente" => $usuarios["idCliente"],
            "nomeUsuario" => $usuarios["nomeUsuario"],
            "password" => $usuarios["password"],
            "statusUsuario" => $usuarios["statusUsuario"],
            "status" => 200,
            "retorno" => ""
        );
   
    } else {
       /*  $jsonSaida = array(
            "nomeUsuario" => null,
            "password" => null,
            "statusUsuario" => null,
            "status" => 400,
            "retorno" => "Usuario Nao Encontrado",
            
        ); */


    }
 
}


?>
