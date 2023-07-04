<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";
$conexao = conectaMysql();
$eventos = array();

$sql = "SELECT * FROM eventos  ";


$sql = $sql . " where tipoEvento = 'cursos' ";
$sql = $sql . " ORDER BY dataEvento ASC LIMIT 6 ";
//echo $sql;
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($eventos, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idEvento"]) && $rows==1) {
  $eventos = $eventos[0];
}
$jsonSaida = $eventos;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>