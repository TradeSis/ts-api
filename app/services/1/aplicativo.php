<?php
//Lucas 05042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$app = array();

if (isset($jsonEntrada["idUsuario"])) {
  $sql = "SELECT aplicativo.*, usuarioaplicativo.idUsuario FROM aplicativo
          LEFT JOIN usuarioaplicativo on aplicativo.nomeAplicativo = usuarioaplicativo.aplicativo";
  if (isset($jsonEntrada["idUsuario"])) {
    $sql = $sql . " where usuarioaplicativo.idUsuario = " . $jsonEntrada["idUsuario"];
  } 
} else
$sql = $sql = "SELECT aplicativo.* FROM aplicativo";
//echo "-SQL->".json_encode($sql)."\n";

$sql = $sql . " order by idAplicativo";
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($app, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idUsuario"]) && $rows==1) {
  $app = $app[0];
}
$jsonSaida = $app;
//echo "-SAIDA->".json_encode($aplicativo)."\n";


?>