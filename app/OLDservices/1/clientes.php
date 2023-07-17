<?php
// helio 31012023 - ajustado a api para receber o jsonEntrada, e pegar parametro od idCliente
// helio 26012023 18:10 - Criacao primeira api - falta parametros para where
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$clientes = array();

$sql = "SELECT * FROM cliente ";
if (isset($jsonEntrada["idCliente"])) {
  $sql = $sql . " where cliente.idCliente = " . $jsonEntrada["idCliente"];
}
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($clientes, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idCliente"]) && $rows==1) {
  $clientes = $clientes[0];
}
$jsonSaida = $clientes;

/** VARIAVEL A MAO 
$retorno = '[{"idCliente":"3","nomeCliente":"Loja Aduana"},{"idCliente":"24","nomeCliente":"Lebes"}]';
$jsonSaida =  json_decode($retorno, TRUE);
**/


?>