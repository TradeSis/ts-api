<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$secoesPagina = array();

$sql = "SELECT secoesPagina.*, secoes.*, paginas.* FROM secoesPagina
        INNER JOIN secoes on secoes.idSecao = secoesPagina.idSecao
        INNER JOIN paginas on paginas.idPagina = secoesPagina.idSecao ";
        
if (isset($jsonEntrada["idSecaoPagina"])) {
  $sql = $sql . " where secoesPagina.idSecaoPagina = " . $jsonEntrada["idSecaoPagina"];
}

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($secoesPagina, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idSecaoPagina"]) && $rows==1) {
  $secoesPagina = $secoesPagina[0];
}
$jsonSaida = $secoesPagina;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>