<?php
//gabriel 06022023 16:52
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$usuario = array();

$sql = "SELECT usuario.* FROM usuario where idCliente IS NULL";
if (isset($jsonEntrada["idUsuario"])) {
    $sql = $sql . " and usuario.idUsuario = " . $jsonEntrada["idUsuario"]; 
  }
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

/** VARIAVEL A MAO 
$retorno = '[{"idCliente":"3","nomeCliente":"Loja Aduana"},{"idCliente":"24","nomeCliente":"Lebes"}]';
$jsonSaida =  json_decode($retorno, TRUE);
**/
