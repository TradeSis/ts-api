<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$categoria = array();

$sql = "SELECT * FROM categoria ";
if (isset($jsonEntrada["idCategoria"])) {
  $sql = $sql . " where categoria.idCategoria = " . $jsonEntrada["idCategoria"];
}
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($categoria, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idCategoria"]) && $rows==1) {
  $categoria = $categoria[0];
}
$jsonSaida = $categoria;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>