<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$paginas = array();

$sql = "SELECT * FROM paginas ";

$sql = $sql . " where paginas.slug = " . "'". $jsonEntrada["slug"] . "'";
//echo "-SQL->".json_encode($sql)."\n";
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($paginas, $row);
  $rows = $rows + 1;
}

if ($rows==1) {
  $paginas = $paginas[0];
}
$jsonSaida = $paginas;

//echo "-SAIDA->".json_encode($jsonSaida)."\n";



?>