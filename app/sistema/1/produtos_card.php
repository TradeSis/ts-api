<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$produtos = array();

$sql = "SELECT * FROM produtos WHERE destaque = 1 Limit 3 ";

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($produtos, $row);
  $rows = $rows + 1;
}

if ($rows==1) {
  $produtos = $produtos[0];
}
$jsonSaida = $produtos;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>