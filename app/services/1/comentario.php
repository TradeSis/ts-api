<?php
//gabriel 08022023 10:48
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$demanda = array();
$sql = "SELECT comentario.*, usuario.nomeUsuario, demanda.idDemanda FROM comentario
        INNER JOIN usuario on comentario.idUsuario = usuario.idUsuario 
        INNER JOIN demanda on comentario.idDemanda = demanda.idDemanda";
if (isset($jsonEntrada["idComentario"])) {
  $sql = $sql . " where comentario.idComentario = " . $jsonEntrada["idComentario"]; 
} else {
  if (isset($jsonEntrada["idDemanda"])) {
    $sql = $sql . " where comentario.idDemanda = " . $jsonEntrada["idDemanda"];
  }
}
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($demanda, $row);
  $rows = $rows + 1;
}
if (isset($jsonEntrada["idComentario"]) && $rows==1) {
  $demanda = $demanda[0];
}
$jsonSaida = $demanda;
