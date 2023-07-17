<?php
//Lucas 09032023 - linha 16, adicionado condição para receber mais um valor "nomeUsuario". 
//Lucas 08032023- 
//gabriel 06022023 16:52
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$usuario = array();

$sql = "SELECT usuario.*, cliente.nomeCliente FROM usuario
        LEFT JOIN cliente on  cliente.idCliente = usuario.idCliente ";
if (isset($jsonEntrada["idUsuario"])) {
  $idUsuario = $jsonEntrada["idUsuario"];
  $sql = $sql . " where usuario.idUsuario = '$idUsuario'";
} 

/* if($parametro !=""){

  $sql = "SELECT * FROM usuario ";
} */


$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($usuario, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idUsuario"]) && $rows==1) {
  $usuario = $usuario[0];
}


$jsonSaida = $usuario;
//echo "-SAIDA->".json_encode($jsonSaida)."\n";
/** VARIAVEL A MAO 
$retorno = '[{"idCliente":"3","nomeCliente":"Loja Aduana"},{"idCliente":"24","nomeCliente":"Lebes"}]';
$jsonSaida =  json_decode($retorno, TRUE);
**/


?>