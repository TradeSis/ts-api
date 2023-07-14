<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$marcas = array();

$sql = "SELECT * FROM marcas ";
if (isset($jsonEntrada["idMarca"])) {
  $sql = $sql . " where marcas.idMarca = " . $jsonEntrada["idMarca"];
}else {
  $where = " where ";
  if (isset($jsonEntrada["estado"])) {
    $sql = $sql . $where . " marcas.estado = " .  "'" . $jsonEntrada["estado"] . "'";
    $where = " and ";
  }
}

$sql = $sql . $where ." marcas.ativoMarca = 1 ";

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($marcas, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idMarca"]) && $rows==1) {
  $marcas = $marcas[0];
}
$jsonSaida = $marcas;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>