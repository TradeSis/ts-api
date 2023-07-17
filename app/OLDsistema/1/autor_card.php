<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$autor = array();

$sql = "SELECT * FROM autor ";
if (isset($jsonEntrada["idAutor"])) {
  $sql = $sql . " where autor.idAutor = " . $jsonEntrada["idAutor"];
}
;
$sql = $sql . " LIMIT 3 ";
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($autor, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idAutor"]) && $rows==1) {
  $autor = $autor[0];
}
$jsonSaida = $autor;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>