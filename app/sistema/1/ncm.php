<?php
$conexao = conectaMysql();
$ncm = array();

$sql = "SELECT * FROM ncm  ";
if (isset($jsonEntrada["Codigo"])) {
  $sql = $sql . " where ncm.Codigo = " . $jsonEntrada["Codigo"];
} else {
  $where = " where ";

  if (isset($jsonEntrada["Descricao"])) {
    $sql = $sql . $where . " ncm.Descricao like " . "'%" . $jsonEntrada["Descricao"] . "%'";
    $where = " and ";
  }

}


//echo "-SQL->".$sql."\n";

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($ncm, $row);
  $rows = $rows + 1;
}

$jsonSaida = $ncm;

//echo "-SAIDA->".json_encode($jsonSaida)."\n";
