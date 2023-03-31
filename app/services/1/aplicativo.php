<?php

//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$aplicativo = array();

$sql = "SELECT * FROM aplicativo ";
if (isset($jsonEntrada["nomeAplicativo"])) {
  $sql = $sql . " where aplicativo.nomeAplicativo = " . "'" .$jsonEntrada["nomeAplicativo"] . "'";
}
//echo "-SQL->".json_encode($sql)."\n";
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($aplicativo, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["nomeAplicativo"]) && $rows==1) {
  $aplicativo = $aplicativo[0];
}
$jsonSaida = $aplicativo;
//echo "-SAIDA->".json_encode($aplicativo)."\n";


?>