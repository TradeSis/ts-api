<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$perfil = array();

$sql = "SELECT * FROM perfil ";
if (isset($jsonEntrada["idPerfil"])) {
  $sql = $sql . " where perfil.idPerfil = " . $jsonEntrada["idPerfil"];
}
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($perfil, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idPerfil"]) && $rows==1) {
  $perfil = $perfil[0];
}
$jsonSaida = $perfil;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>