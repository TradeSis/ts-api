<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$secoespagina = array();

$sql = "SELECT secoespagina.*, secoes.*, paginas.*, secoes.arquivoFonte AS arquivoFonte2 FROM secoespagina
        INNER JOIN secoes on secoes.idSecao = secoespagina.idSecao
        INNER JOIN paginas on paginas.idPagina = secoespagina.idPagina ";
$where = " WHERE ";        
if (isset($jsonEntrada["idSecaoPagina"])) {
  $sql = $sql . " where secoespagina.idSecaoPagina = " . $jsonEntrada["idSecaoPagina"];
  $where = " AND ";
}
if (isset($jsonEntrada["idPagina"])) {
  $sql = $sql . $where . " secoespagina.idPagina = " . $jsonEntrada["idPagina"];
} 

$sql = $sql . " order by secoespagina.idPagina, secoespagina.ordem; ";


$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($secoespagina, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idSecaoPagina"]) && $rows==1) {
  $secoespagina = $secoespagina[0];
}
$jsonSaida = $secoespagina;

//echo "-SAIDA->".json_encode($jsonSaida)."\n";
