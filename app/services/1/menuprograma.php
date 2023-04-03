<?php

//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$menuprograma = array();

$sql = "SELECT menuprograma.*, menu.*, aplicativo.* FROM menuprograma
        INNER JOIN menu on menu.IDMenu = menuprograma.IDMenu
        INNER JOIN aplicativo on aplicativo.idAplicativo = menuprograma.idAplicativo";
if (isset($jsonEntrada["progrNome"])) {
  $sql = $sql . " where menuprograma.progrNome = " . "'". $jsonEntrada["progrNome"]. "'";
}
//echo "-SQL->".json_encode($sql)."\n";
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($menuprograma, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["progrNome"]) && $rows==1) {
  $menuprograma = $menuprograma[0];
}
$jsonSaida = $menuprograma;
//echo "-SAIDA->".json_encode($aplicativo)."\n";


?>