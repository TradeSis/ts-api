<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$secoespagina = array();

$sql = "SELECT secoespagina.*, secoes.* FROM secoespagina
INNER JOIN secoes on secoes.idSecao = secoespagina.idSecao ";

$sql = $sql . " where secoespagina.idPagina = " . $jsonEntrada["idPagina"];
$sql = $sql ." order by secoespagina.ordem ";

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($secoespagina, $row);
  $rows = $rows + 1;
}

if ($rows==1) {
  $secoespagina = $secoespagina[0];
}

$jsonSaida = $secoespagina;


//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>