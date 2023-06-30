<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$catalogo = array();

$sql = "SELECT catalogo.*, marcas.* FROM catalogo 
        LEFT JOIN marcas on marcas.idMarca = catalogo.idMarca ";

if (isset($jsonEntrada["idProduto"])) {
  $sql = $sql . " where catalogo.idProduto = " . $jsonEntrada["idProduto"];

}else {
  $where = " where ";
  if (isset($jsonEntrada["idMarca"])) {
    $sql = $sql . $where . " catalogo.idMarca = " . $jsonEntrada["idMarca"];
    $where = " and ";
  }
}

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($catalogo, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idProduto"]) && $rows==1) {
  $catalogo = $catalogo[0];
}
$jsonSaida = $catalogo;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>