<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$paginas = array();

$sql = "SELECT paginas.*, temas.* FROM paginas  
INNER JOIN temas on temas.idTema = paginas.idTema ";
if (isset($jsonEntrada["idPagina"])) {
  $sql = $sql . " where paginas.idPagina = " . $jsonEntrada["idPagina"];
  
}
/* $sql = $sql . " and temas.ativo = 1"; */
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($paginas, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idPagina"]) && $rows==1) {
  $paginas = $paginas[0];
}
$jsonSaida = $paginas;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>