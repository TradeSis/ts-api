<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$secoespagina = array();

$sql = "SELECT secoespagina.*,secoes.tituloSecao, paginas.tituloPagina FROM secoespagina
        LEFT JOIN secoes on secoespagina.idSecao = secoes.idSecao 
        LEFT JOIN paginas on secoespagina.idPagina = paginas.idPagina ";  
$where = " WHERE ";
if (isset($jsonEntrada["idSecaoPagina"])) {
  $sql = $sql . $where . " secoespagina.idSecaoPagina = " . $jsonEntrada["idSecaoPagina"];
  $where = " AND ";
}
if (isset($jsonEntrada["idPagina"])) {
  $sql = $sql . $where . " secoespagina.idPagina = " . $jsonEntrada["idPagina"];
  $where = " AND ";
} 
if (isset($jsonEntrada["idSecao"])) {
  $sql = $sql . $where . " secoespagina.idSecao = " . $jsonEntrada["idSecao"];
}

$sql = $sql . " order by secoespagina.idPagina, secoespagina.ordem; ";


/* echo $sql; */

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($secoespagina, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idPagina"]) && $rows==1) {
  $secoespagina = $secoespagina[0];
}
$jsonSaida = $secoespagina;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>