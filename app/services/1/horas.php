<?php
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$horas = array();
$sql = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(tempo))) AS tempo, SEC_TO_TIME(SUM(TIME_TO_SEC(duracao))) AS duracao FROM tarefa";
if (isset($jsonEntrada["idDemanda"])) {
  $sql = $sql . " where tarefa.idDemanda = " . $jsonEntrada["idDemanda"]; 
}
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($horas, $row);
  $rows = $rows + 1;
}
if (isset($jsonEntrada["idDemanda"]) && $rows==1) {
  $horas = $horas[0];
}
$jsonSaida = $horas;


?>