<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$tema = array();

$sql = "SELECT * FROM temas ";
if (isset($jsonEntrada["idTema"])) {
  $sql = $sql . " where temas.idTema = " . $jsonEntrada["idTema"];
}
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($tema, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idTema"]) && $rows==1) {
  $tema = $tema[0];
}
$jsonSaida = $tema;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>