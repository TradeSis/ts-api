<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$receitas = array();

$sql = "SELECT * FROM receitas ";
if (isset($jsonEntrada["idReceita"])) {
  $sql = $sql . " where receitas.idReceita = " . $jsonEntrada["idReceita"];
}
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($receitas, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idReceita"]) && $rows==1) {
  $receitas = $receitas[0];
}
$jsonSaida = $receitas;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>