<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$produtos = array();

$sql = "SELECT produtos.*, marcas.* FROM produtos 
        LEFT JOIN marcas on marcas.idMarca = produtos.idMarca ";

if (isset($jsonEntrada["idProduto"])) {
  $sql = $sql . " where produtos.idProduto = " . $jsonEntrada["idProduto"];
  $where = " and ";
}else {
  $where = " where ";
  if (isset($jsonEntrada["idMarca"])) {
    $sql = $sql . $where . " produtos.idMarca = " . $jsonEntrada["idMarca"];
    $where = " and ";
  }
}
$sql = $sql . $where . " produtos.ativoProduto = 1 LIMIT 9";

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($produtos, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idProduto"]) && $rows==1) {
  $produtos = $produtos[0];
}
$jsonSaida = $produtos;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>