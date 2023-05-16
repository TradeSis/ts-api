<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$secoesPagina = array();

$sql = "SELECT secoesPagina.*, secoes.* FROM secoesPagina
INNER JOIN secoes on secoes.idSecao = secoesPagina.idSecao ";

$sql = $sql . " where secoesPagina.idPagina = " . $jsonEntrada["idPagina"];
$sql = $sql ." order by secoesPagina.ordem ";

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($secoesPagina, $row);
  $rows = $rows + 1;
}

if ($rows==1) {
  $secoesPagina = $secoesPagina[0];
}

$jsonSaida = $secoesPagina;


//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>