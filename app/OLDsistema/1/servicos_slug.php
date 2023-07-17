<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$servicos = array();

$sql = "SELECT * FROM servicos ";

$sql = $sql . " where servicos.slugServicos = '" . $jsonEntrada["slugServicos"] . "'";

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($servicos, $row);
  $rows = $rows + 1;
}

if ($rows==1) {
  $servicos = $servicos[0];
}
$jsonSaida = $servicos;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>