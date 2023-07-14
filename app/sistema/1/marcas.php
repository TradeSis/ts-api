<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$marcas = array();

$sql = "SELECT * FROM marcas ";
if (isset($jsonEntrada["idMarca"])) {
  $sql = $sql . " where marcas.idMarca = " . $jsonEntrada["idMarca"];
} 
  $where = " where ";
  if (isset($jsonEntrada["estado"])) {
    $sql = $sql . $where . " marcas.estado = " .  "'" . $jsonEntrada["estado"] . "' and ativoMarca = 1";
    $where = " and ";
  } elseif (isset($jsonEntrada["lojasEspecializadas"]) ) {
    $sql = $sql . $where . " marcas.ativoMarca = 1 and marcas.lojasEspecializadas = " . $jsonEntrada["lojasEspecializadas"];
    $where = " and ";
  } elseif (isset($jsonEntrada["ativoMarca"])) { //parceiras
      $sql = $sql . $where . " marcas.ativoMarca = 1";
      $where = " and ";
  }


//echo $sql;

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($marcas, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idMarca"]) && $rows == 1) {
  $marcas = $marcas[0];
}
$jsonSaida = $marcas;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";
