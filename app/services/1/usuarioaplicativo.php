<?php
//Lucas 05042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

$conexao = conectaMysql();
$app = array();

$sql = "SELECT usuarioaplicativo.* FROM usuarioaplicativo";
$where = " WHERE ";
if (isset($jsonEntrada["idUsuario"])) {
  $sql = $sql . $where . " usuarioaplicativo.idUsuario = " . $jsonEntrada["idUsuario"];
  $where = " AND ";
} 
if (isset($jsonEntrada["aplicativo"])) {
  $sql = $sql . $where . " usuarioaplicativo.aplicativo = '" . $jsonEntrada["aplicativo"] . "'";
}
//echo "-SQL->" . $sql . "\n";

$sql = $sql . " ORDER BY idUsuario";
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($app, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idUsuario"]) && $rows == 1) {
  $app = $app[0];
}
$jsonSaida = $app;
//echo "-SAIDA->".json_encode($usuarioaplicativo)."\n";
?>
