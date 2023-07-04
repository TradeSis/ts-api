<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$catalogo = array();

$sql = "SELECT * FROM catalogo WHERE propagandaProduto = 1 AND ativoProduto = 1";

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($catalogo, $row);
  $rows = $rows + 1;
}

if ($rows==1) {
  $catalogo = $catalogo[0];
}
$jsonSaida = $catalogo;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>