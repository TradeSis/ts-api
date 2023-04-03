<?php

//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$menu = array();

$sql = "SELECT * FROM menu ";
if (isset($jsonEntrada["IDMenu"])) {
  $sql = $sql . " where menu.IDMenu = " .$jsonEntrada["IDMenu"];
}
//echo "-SQL->".json_encode($sql)."\n";
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($menu, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["IDMenu"]) && $rows==1) {
  $menu = $menu[0];
}
$jsonSaida = $menu;
//echo "-SAIDA->".json_encode($menu)."\n";


?>