<?php
//Lucas 05042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$app = array();

$sql = "SELECT * FROM aplicativo ";
if (isset($jsonEntrada["idAplicativo"])) {
  $sql = $sql . " where aplicativo. idAplicativo = " . $jsonEntrada["idAplicativo"];
}
//echo "-SQL->".json_encode($sql)."\n";
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($app, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idAplicativo"]) && $rows==1) {
  $app = $app[0];
}
$jsonSaida = $app;
//echo "-SAIDA->".json_encode($aplicativo)."\n";


?>