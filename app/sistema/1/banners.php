<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$banners = array();

$sql = "SELECT * FROM banners ";
if (isset($jsonEntrada["idBanner"])) {
  $sql = $sql . " where banners.idBanner = " . $jsonEntrada["idBanner"];
}


$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($banners, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idBanner"]) && $rows==1) {
  $banners = $banners[0];
}
$jsonSaida = $banners;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>